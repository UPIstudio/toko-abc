<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO-ABC</title>
</head>

<body>
    <h2>Tambah Produk Baru</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Kode Produk:</label><br>
            <input type="text" name="product_code" value="{{ $product->product_code }}" required>
        </p>

        <p>
            <label>Nama Produk:</label><br>
            <input type=" text" name="name" value="{{ $product->name }}" required>
        </p>

        <p>
            <label>Kategori:</label><br>
            <input type="text" name="category" value="{{ $product->category }}" required>
        </p>

        <p>
            <label>Stock:</label><br>
            <input type="number" name="stock" value="{{ $product->stock }}" min="0" required>
        </p>

        <p>
            <label>Harga Jual:</label><br>
            <input type="number" name="price" value="{{ $product->price }}" min="1" required>
        </p>

        <p>
            <label>Tanggal Kedaluwarsa:</label><br>
            <input type="date" name="expired_date"
                value="{{ $product->expired_date ? date('Y-m-d', strtotime($product->expired_date)) : '' }}" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('products.index') }}">Batal/Kembali</a>
    </form>
</body>

</html>