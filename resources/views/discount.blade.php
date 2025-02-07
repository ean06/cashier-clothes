<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Diskon</title>
</head>
<body>
    <h1>Daftar Diskon</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Diskon</th>
                <th>Deskripsi</th>
                <th>Nilai Diskon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount)
            <tr>
                <td>{{ $discount->id }}</td>
                <td>{{ $discount->code }}</td>
                <td>{{ $discount->description }}</td>
                <td>{{ $discount->discount_value }}</td>
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
