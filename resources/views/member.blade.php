<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Voucher</title>
</head>
<body>
    <h1>Daftar Voucher</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Voucher</th>
                <th>Deskripsi</th>
                <th>Nilai Diskon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $voucher)
            <tr>
                <td>{{ $voucher->id }}</td>
                <td>{{ $voucher->code }}</td>
                <td>{{ $voucher->description }}</td>
                <td>{{ $voucher->discount_value }}</td>
                <td>
                    <!-- Anda bisa menambahkan aksi seperti edit, delete -->
                    <a href="#">Edit</a> |
                    <a href="#">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
