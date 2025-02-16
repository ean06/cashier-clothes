<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
        }
        .invoice-header h1 {
            margin: 0;
        }
        .invoice-details, .invoice-items {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details td, .invoice-items td, .invoice-items th {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .invoice-details td {
            font-weight: bold;
        }
        .invoice-items th {
            background-color: #f2f2f2;
        }
        .total-row td {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <h1>Invoice</h1>
        <p>Nomor Invoice: {{ $invoice->invoice_number }}</p>
        <p>Tanggal: {{ $invoice->created_at->format('d M Y') }}</p>
    </div>

    <table class="invoice-details">
        <tr>
            <td>Nama Pelanggan:</td>
            <td>{{ $invoice->customer_name }}</td>
        </tr>
        <tr>
            <td>Alamat:</td>
            <td>{{ $invoice->customer_address }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $invoice->customer_email }}</td>
        </tr>
    </table>

    <h2>Detail Pembelian</h2>
    <table class="invoice-items">
        <thead>
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->product_name }}</td>
                <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="invoice-details" style="margin-top: 20px;">
        <tr class="total-row">
            <td>Total Pembelian</td>
            <td>Rp. {{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
        </tr>
        @if ($invoice->discount)
        <tr class="total-row">
            <td>Diskon ({{ $invoice->discount->code }})</td>
            <td>Rp. {{ number_format($invoice->discount->discount_value, 0, ',', '.') }}</td>
        </tr>
        @endif
        <tr class="total-row">
            <td><strong>Total Akhir</strong></td>
            <td><strong>Rp. {{ number_format($invoice->final_amount, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

</body>
</html>
