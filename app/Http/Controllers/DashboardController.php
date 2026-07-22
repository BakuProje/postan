<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $omset = Transaction::sum('total_price');

        $penjualan = Transaction::count();

        $performaKasir = User::withCount('transactions')
            ->get()
            ->map(function($user) {
                $user->total_sales = Transaction::where('user_id', $user->id)->sum('total_price');
                return $user;
            })
            ->filter(function($user) {
                return $user->transactions_count > 0;
            })
            ->sortByDesc('total_sales');

        $productsStock = Product::with('category')->orderBy('stock', 'asc')->get();

        $recentTransactions = Transaction::with('user')->latest()->take(5)->get();
        $chartLabels = [];
        $chartSales = [];
        $dayNames = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i);
            $dayName = $dayNames[$date->format('l')];
            $chartLabels[] = $dayName . ' (' . $date->format('d/m') . ')';
            $chartSales[] = Transaction::whereDate('created_at', $date)->sum('total_price') ?: 0;
        }

        $outlet = Outlet::first();

        $kasirAktif = User::where('role', 'kasir')->count();
        $todaySales = Transaction::whereDate('created_at', today())->sum('total_price') ?: 0;
        $yesterdaySales = Transaction::whereDate('created_at', today()->subDay())->sum('total_price') ?: 0;
        if ($yesterdaySales > 0) {
            $growth = (($todaySales - $yesterdaySales) / $yesterdaySales) * 100;
        } else {
            $growth = $todaySales > 0 ? 100.0 : 0.0;
        }

        $produkTerjual = \App\Models\TransactionItem::sum('quantity') ?: 0;

        return view('admin.dashboard.index', compact(
            'omset',
            'penjualan',
            'performaKasir',
            'productsStock',
            'recentTransactions',
            'chartLabels',
            'chartSales',
            'outlet',
            'kasirAktif',
            'growth',
            'produkTerjual'
        ));
    }

    public function storeExpense(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date',
        ]);

        \App\Models\Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengeluaran berhasil dicatat.');
    }

    private function getTerlarisData()
    {
        $dbProducts = Product::with('category')->get();
        $products = [];
        $totalItemsSoldAll = 0;
        $totalRevenueAll = 0;

        foreach ($dbProducts as $product) {
            $qty = \App\Models\TransactionItem::where('product_id', $product->id)->sum('quantity');
            $revenue = \App\Models\TransactionItem::where('product_id', $product->id)->sum('subtotal');
            if ($revenue == 0 && $qty > 0) {
                $revenue = $qty * $product->price;
            }

            $totalItemsSoldAll += $qty;
            $totalRevenueAll += $revenue;

            $products[] = [
                'id' => $product->id,
                'name' => $product->name,
                'barcode' => $product->barcode ?? null,
                'category' => $product->category ? $product->category->name : 'Umum',
                'photo' => $product->photo ?? null,
                'price' => $product->price,
                'stock' => $product->stock,
                'sold_qty' => (int) $qty,
                'total_revenue' => (int) $revenue,
            ];
        }

        usort($products, fn($a, $b) => $b['sold_qty'] <=> $a['sold_qty']);

        foreach ($products as &$item) {
            $item['percentage'] = $totalItemsSoldAll > 0 ? round(($item['sold_qty'] / $totalItemsSoldAll) * 100, 2) : 0;
        }
        unset($item);

        return [$products, $totalItemsSoldAll, $totalRevenueAll];
    }

    public function terlaris()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $categories = \App\Models\Category::all();
        [$products, $totalItemsSoldAll, $totalRevenueAll] = $this->getTerlarisData();

        $top5Products = array_slice($products, 0, 5);
        $top5SumPercent = array_sum(array_column($top5Products, 'percentage'));
        $othersPercentage = max(0, round(100 - $top5SumPercent, 2));

        $totalTerlarisCount = count($products);
        $avgPrice = $totalItemsSoldAll > 0 ? round($totalRevenueAll / $totalItemsSoldAll) : 0;

        return view('admin.reports.terlaris', compact(
            'categories',
            'products',
            'top5Products',
            'othersPercentage',
            'totalTerlarisCount',
            'totalItemsSoldAll',
            'totalRevenueAll',
            'avgPrice'
        ));
    }

    public function exportTerlarisExcel()
    {
        [$products, $totalItemsSoldAll, $totalRevenueAll] = $this->getTerlarisData();
        $filename = 'Laporan_Produk_Terlaris_' . date('dmY_His') . '.xlsx';

        $headers = [
            "Content-Type" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "Content-Disposition" => "attachment; filename=\"$filename\"",
            "Cache-Control" => "max-age=0",
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Produk Terlaris');
        $sheet->setShowGridlines(true);

        $titleStyle = [
            'font' => [
                'name' => 'Inter',
                'size' => 16,
                'bold' => true,
                'color' => ['rgb' => '0F172A'],
            ]
        ];

        $metaStyle = [
            'font' => [
                'name' => 'Inter',
                'size' => 10,
                'italic' => true,
                'color' => ['rgb' => '475569'],
            ]
        ];

        $sectionHeaderStyle = [
            'font' => [
                'name' => 'Inter',
                'size' => 11,
                'bold' => true,
                'color' => ['rgb' => '1E293B'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F1F5F9'],
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'CBD5E1'],
                ],
            ]
        ];

        $tableHeaderStyle = [
            'font' => [
                'name' => 'Inter',
                'size' => 10,
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1E293B'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ];

        $rowStyleEven = [
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F8FAFC'],
            ]
        ];

        $borderBottomStyle = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'E2E8F0'],
                ],
            ]
        ];

        $sheet->mergeCells('A1:G1');
        $sheet->setCellValue('A1', 'LAPORAN PRODUK TERLARIS - POSTAN POS');
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'name' => 'Inter',
                'size' => 14,
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0F172A'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ]);
        $sheet->getRowDimension(1)->setRowHeight(36);

        $sheet->setCellValue('A2', 'Tanggal Ekspor: ' . date('d M Y, H:i'));
        $sheet->getStyle('A2')->applyFromArray($metaStyle);

        $currentRow = 4;

        $sheet->mergeCells('A' . $currentRow . ':B' . $currentRow);
        $sheet->setCellValue('A' . $currentRow, ' RINGKASAN DATA');
        $sheet->getStyle('A' . $currentRow . ':B' . $currentRow)->applyFromArray($sectionHeaderStyle);
        $currentRow++;

        $sheet->setCellValue('A' . $currentRow, 'Total Produk Terlaris');
        $sheet->setCellValue('B' . $currentRow, count($products) . ' Produk');
        $sheet->getStyle('A' . $currentRow . ':B' . $currentRow)->getFont()->setBold(true);
        $currentRow++;

        $sheet->setCellValue('A' . $currentRow, 'Total Terjual');
        $sheet->setCellValue('B' . $currentRow, $totalItemsSoldAll . ' pcs');
        $sheet->getStyle('A' . $currentRow . ':B' . $currentRow)->getFont()->setBold(true);
        
        $sheet->getStyle('A4:B' . $currentRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'E2E8F0'],
                ],
            ],
        ]);

        $currentRow += 2; 

        $sheet->mergeCells('A' . $currentRow . ':G' . $currentRow);
        $sheet->setCellValue('A' . $currentRow, ' DETAIL DATA PRODUK');
        $sheet->getStyle('A' . $currentRow . ':G' . $currentRow)->applyFromArray($sectionHeaderStyle);
        $currentRow++;

        $columns = ['Peringkat', 'Nama Produk', 'Kategori', 'Harga Satuan', 'Jumlah Terjual', 'Total Pendapatan', 'Kontribusi'];

        // Map columns headers to letter codes
        $colLetter = 'A';
        foreach ($columns as $colTitle) {
            $sheet->setCellValue($colLetter . $currentRow, $colTitle);
            $sheet->getStyle($colLetter . $currentRow)->applyFromArray($tableHeaderStyle);
            $colLetter++;
        }
        $sheet->getRowDimension($currentRow)->setRowHeight(26);
        $currentRow++;

        $startDataRow = $currentRow;

        foreach ($products as $index => $row) {
            $rankNum = $index + 1;
            $prodPrice = (float) $row['price'];
            $prodSold = (int) $row['sold_qty'];
            $prodRevenue = (float) $row['total_revenue'];
            $prodPercent = $row['percentage'] . '%';

            $col = 'A';
            
            $sheet->setCellValue($col . $currentRow, $rankNum);
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $col++;
            
            $sheet->setCellValue($col . $currentRow, $row['name']);
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $col++;
            
            $sheet->setCellValue($col . $currentRow, $row['category']);
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $col++;
            
            // Format Harga Satuan
            $sheet->setCellValue($col . $currentRow, $prodPrice);
            $sheet->getStyle($col . $currentRow)->getNumberFormat()->setFormatCode('"Rp"#,##0');
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $col++;

            // Format Jumlah Terjual
            $sheet->setCellValue($col . $currentRow, $prodSold);
            $sheet->getStyle($col . $currentRow)->getNumberFormat()->setFormatCode('#,##0');
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $col++;

            // Format Total Pendapatan
            $sheet->setCellValue($col . $currentRow, $prodRevenue);
            $sheet->getStyle($col . $currentRow)->getNumberFormat()->setFormatCode('"Rp"#,##0');
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $col++;

            // Format Kontribusi
            $sheet->setCellValue($col . $currentRow, $prodPercent);
            $sheet->getStyle($col . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $col++;

            // Apply Zebra striping
            if ($rankNum % 2 == 0) {
                $sheet->getStyle('A' . $currentRow . ':G' . $currentRow)->applyFromArray($rowStyleEven);
            }
            
            $sheet->getRowDimension($currentRow)->setRowHeight(20);
            $currentRow++;
        }

        $endDataRow = $currentRow - 1;
        $sheet->getStyle('A' . ($startDataRow - 1) . ':G' . $endDataRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'CBD5E1'],
                ],
            ],
        ]);

        for ($col = 'A'; $col <= 'G'; $col++) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $callback = function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportTerlarisPdf()
    {
        [$products, $totalItemsSoldAll, $totalRevenueAll] = $this->getTerlarisData();
        $outlet = Outlet::first();
        return view('admin.reports.terlaris-pdf', compact('products', 'totalItemsSoldAll', 'totalRevenueAll', 'outlet'));
    }
}
