<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko-ABC</title>
</head>

<body>
    <a href="{{ route('products.create') }}">Tambah Produk</a>
    <table>
        <tr>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Stock</th>
            <th>Aksi</th>
            <th>Expiry Date</th>
        </tr>
        @foreach($products as $p)
            <tr>
                <td>{{ $p->product_code }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->stock }}</td>
                <td>{{ $p->expired_date ? date('Y-m-d', strtotime($p->expired_date)) : '' }}</td>
                <td>
                    <a href="{{ route('products.edit', $p->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')>
                                    @csrf
                                    @method('DELETE') <button type=" submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>