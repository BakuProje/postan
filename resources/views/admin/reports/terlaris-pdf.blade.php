<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Produk Terlaris - POSTAN</title>
    @vite(['resources/css/app.css'])
</head>

<body class="pdf-report-body" onload="window.print()">
    <div class="no-print" style="margin-bottom: 15px;">
        <button onclick="window.print()"
            style="padding: 8px 16px; background: #0284c7; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">Cetak
            / Simpan sebagai PDF</button>
    </div>

    <div class="pdf-header">
        <h1>Laporan Produk Terlaris</h1>
        <p>Aplikasi Kasir POSTAN &bull; Tanggal Cetak: {{ date('d F Y H:i') }}</p>
    </div>

    <table class="pdf-table">
        <thead>
            <tr>
                <th class="text-center" style="width: 30px;">#</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th class="text-right">Terjual (Item)</th>
                <th class="text-right">Total Pendapatan</th>
                <th class="text-right">Kontribusi (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $row['name'] }}</strong></td>
                    <td>{{ $row['category'] }}</td>
                    <td class="text-right">{{ number_format($row['sold_qty'], 0, ',', '.') }} pcs</td>
                    <td class="text-right">Rp {{ number_format($row['total_revenue'], 0, ',', '.') }}</td>
                    <td class="text-right">{{ $row['percentage'] }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pdf-summary-box">
        <table>
            <tr>
                <td><strong>Total Terjual:</strong></td>
                <td class="text-right"><strong>{{ number_format($totalItemsSoldAll, 0, ',', '.') }} Item</strong></td>
            </tr>
            <tr>
                <td><strong>Total Pendapatan:</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($totalRevenueAll, 0, ',', '.') }}</strong></td>
            </tr>
        </table>
    </div>

    <div style="clear: both;"></div>

    <div class="pdf-footer">
        <p>Laporan ini dicetak secara otomatis dari Sistem Kasir POSTAN.</p>
    </div>
</body>

</html>
