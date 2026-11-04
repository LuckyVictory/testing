<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Product</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #648a64; /* Hijau sage */
      font-family: Arial, Helvetica, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .form-container {
      width: 100%;
      max-width: 580px;
    }

    /* Judul Halaman */
    h1 {
      color: #ffffff;
      text-align: center;
      font-family: "Georgia", serif;
      font-size: 38px;
      font-weight: normal;
      margin-bottom: 35px;
    }

    /* Baris label & data */
    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 16px;
    }

    .form-group label {
      width: 160px;
      color: #ffffff;
      font-size: 19px;
    }

    /* Tampilan Kotak Data (Read-only) */
    .form-display {
      height: 32px;
      font-size: 15px;
      padding: 4px 10px;
      border: 1px solid #777;
      background-color: #f1f3f1;
      color: #222222;
      border-radius: 2px;
      display: flex;
      align-items: center;
    }

    .input-full {
      flex: 1;
    }

    .input-short {
      width: 180px;
    }

    /* Tombol Aksi */
    .button-container {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
      margin-top: 30px;
    }

    .btn {
      min-width: 85px;
      padding: 6px 16px;
      font-size: 14px;
      color: #222222;
      background-color: #ececec;
      border: 1px solid #999999;
      border-radius: 2px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      display: inline-block;
    }

    .btn:hover {
      background-color: #dfdfdf;
    }

    .btn:active {
      background-color: #cecece;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Detail Product</h1>

    <!-- Barcode -->
    <div class="form-group">
      <label>Barcode</label>
      <div class="form-display input-full">{{ $product->barcode }}</div>
    </div>

    <!-- Nama Product -->
    <div class="form-group">
      <label>nama product</label>
      <div class="form-display input-full">{{ $product->nama_product }}</div>
    </div>

    <!-- Harga Beli -->
    <div class="form-group">
      <label>harga beli</label>
      <div class="form-display input-short">
        Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
      </div>
    </div>

    <!-- Harga Jual -->
    <div class="form-group">
      <label>harga jual</label>
      <div class="form-display input-short">
        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
      </div>
    </div>

    <!-- Supplier -->
    <div class="form-group">
      <label>supplier</label>
      <div class="form-display input-short">
        {{ $product->supplier }}
      </div>
    </div>

    <!-- Navigasi ke Edit dan Kembali ke Index -->
    <div class="button-container">
      <a href="{{ url('/edit-product/' . $product->id) }}" class="btn">Edit</a>
      <a href="{{ url('/product') }}" class="btn">Kembali</a>
    </div>
  </div>

</body>
</html>