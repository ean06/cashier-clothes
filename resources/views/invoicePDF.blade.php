<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info table {
            width: 100%;
            border-collapse: collapse;
        }
        .info table, .info th, .info td {
            border: 1px solid #ddd;
        }
        .info th, .info td {
            padding: 8px;
            text-align: left;
        }
        .info th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>STRUK PEMBAYARAN</h1>
        <p>Nomor Transaksi: {{ $invoice->transaction_number }}</p>
        <p>Tanggal: {{ \Carbon\Carbon::parse($invoice->date)->format('d M Y') }}</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <th>Nama Pelanggan</th>
                <td>{{ $invoice->customer_name }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $invoice->customer_address }}</td>
            </tr>
            <tr>
                <th>Item Pembelian</th>
                <td>{{ $invoice->item_description }}</td>
            </tr>
            <tr>
                <th>Jumlah Dibayar</th>
                <td>Rp {{ number_format($invoice->amount_paid, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td>{{ $invoice->payment_status }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Terima kasih atas pembayaran Anda.</p>
        <p>Jika ada pertanyaan, hubungi kami di [email/nomor telepon].</p>
    </div>
</div>

</body>
</html>
