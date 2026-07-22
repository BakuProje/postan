<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Produk Terlaris - POSTAN</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { 
            font-family: 'Inter', -apple-system, sans-serif; 
            font-size: 11px; 
            color: #1e293b; 
            padding: 24px; 
            background: #ffffff;
            margin: 0;
        }
        .report-header {
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 16px;
            margin-bottom: 20px;
            display: table;
            width: 100%;
        }
        .header-left {
            display: table-cell;
            vertical-align: middle;
            width: 60%;
        }
        .header-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 40%;
        }
        .brand-name {
            font-size: 20px;
            font-weight: 800;
            color: #0ea5e9;
            letter-spacing: -0.025em;
        }
        .brand-subtitle {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
            font-weight: 500;
        }
        .report-title {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }
        .report-date {
            font-size: 10px;
            color: #64748b;
            margin-top: 4px;
            font-weight: 500;
        }
        .summary-grid {
            display: table;
            width: 100%;
            margin-bottom: 24px;
            border-spacing: 12px 0px;
            margin-left: -12px;
            margin-right: -12px;
        }
        .summary-card {
            display: table-cell;
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-left: 4px solid #0ea5e9;
            padding: 12px 16px;
            border-radius: 12px;
            vertical-align: middle;
            width: 50%;
        }
        .summary-card.sales { border-left-color: #0ea5e9; }
        .summary-card.qty { border-left-color: #10b981; }
        
        .card-label {
            font-size: 9px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .card-value {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 4px;
        }
        .section-title {
            font-size: 12px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }
        table.data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 8px;
        }
        table.data-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 10px 12px;
            border-top: 1px solid #e2e8f0;
            border-bottom: 2px solid #e2e8f0;
            text-align: left;
        }
        table.data-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 10px;
            vertical-align: middle;
        }
        table.data-table tr:hover td {
            background: #f8fafc;
        }
        table.data-table tr:last-child td {
            border-bottom: none;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 8px;
            font-weight: 700;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }
        .badge-percentage {
            background: #f0f9ff;
            color: #0284c7;
            border: 1px solid #e0f2fe;
        }
        .badge-qty {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #d1fae5;
        }
        .print-btn-container {
            margin-bottom: 20px;
            text-align: right;
        }
        .print-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 4px 6px -1px rgba(14, 165, 233, 0.2);
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .print-btn:hover {
            box-shadow: 0 6px 8px -1px rgba(14, 165, 233, 0.3);
        }
        .report-footer {
            margin-top: 40px;
            border-top: 1px solid #e2e8f0;
            padding-top: 12px;
            text-align: center;
            font-size: 9px;
            color: #94a3b8;
            font-weight: 500;
        }
        @media print {
            .no-print { display: none !important; }
            body { padding: 0; }
        }
    </style>
</head>

<body onload="window.print()">
    @php
        $outletName = $outlet ? $outlet->name : 'POSTAN POS';
        $outletAddress = $outlet ? $outlet->address : 'Sistem POS Karyawan Kasir';
    @endphp

    <div class="print-btn-container no-print">
        <button onclick="window.print()" class="print-btn">Cetak / Simpan PDF</button>
    </div>

    <div class="report-header">
        <div class="header-left">
            <div class="brand-name">{{ strtoupper($outletName) }}</div>
            <div class="brand-subtitle">{{ $outletAddress }}</div>
        </div>
        <div class="header-right">
            <div class="report-title">LAPORAN PRODUK TERLARIS</div>
            <div class="report-date">Tanggal Cetak: {{ date('d M Y, H:i') }}</div>
        </div>
    </div>

    <div class="summary-grid">
        <div class="summary-card sales">
            <div class="card-label">Total Produk Terlaris</div>
            <div class="card-value">{{ count($products) }} Produk</div>
        </div>
        <div class="summary-card qty">
            <div class="card-label">Total Terjual</div>
            <div class="card-value">{{ number_format($totalItemsSoldAll, 0, ',', '.') }} pcs</div>
        </div>
    </div>

    <div class="section-title">Daftar Produk Terlaris</div>
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 40px; text-align: center;">#</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th style="text-align: right;">Harga Satuan</th>
                <th style="text-align: right;">Jumlah Terjual</th>
                <th style="text-align: right;">Total Pendapatan</th>
                <th style="text-align: right;">Kontribusi (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $row)
                <tr>
                    <td style="text-align: center; color: #94a3b8;">{{ $index + 1 }}</td>
                    <td><strong>{{ $row['name'] }}</strong></td>
                    <td>{{ $row['category'] }}</td>
                    <td style="text-align: right;">Rp {{ number_format($row['price'], 0, ',', '.') }}</td>
                    <td style="text-align: right;"><span class="badge badge-qty">{{ number_format($row['sold_qty'], 0, ',', '.') }} pcs</span></td>
                    <td style="text-align: right;"><strong>Rp {{ number_format($row['total_revenue'], 0, ',', '.') }}</strong></td>
                    <td style="text-align: right;"><span class="badge badge-percentage">{{ $row['percentage'] }}%</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="report-footer">
        Laporan ini digenerate secara otomatis oleh Postan POS pada {{ date('d M Y, H:i') }}
    </div>
</body>

</html>
