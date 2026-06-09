<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO-ABC</title>
</head>

<body>
    <h2>Tambah Produk Baru</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label>Kode Produk:</label><br>
            <input type="text" name="product_code" value="{{ old('product_code') }}" required>

            @error('product_code')
                <div style="color: red; font-size: 13px;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Kategori:</label><br>
            <input type="text" name="category" value="{{ old('category')}}" required>
            @error('category') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Stock:</label><br>
            <input type="number" name="stock" min="0" value="{{ old('stock') }}" required>
            @error('stock') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Harga Jual:</label><br>
            <input type="number" name="price" min="1" value="{{ old('price') }}" required>
            @error('price') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Tanggal Kedaluwarsa:</label><br>
            <input type="date" name="expired_date" value="{{ old('expired_date') }}" required>
            @error('expired_date') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Simpan Produk</button>
        <a href="{{ route('products.index') }}">Batal/Kembali</a>
    </form>
</body>

</html>