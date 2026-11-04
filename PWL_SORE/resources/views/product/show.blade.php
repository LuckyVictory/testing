<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Product</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #648a64; /* Latar belakang hijau sage */
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

    /* Judul Form */
    h1 {
      color: #ffffff;
      text-align: center;
      font-family: "Georgia", serif;
      font-size: 38px;
      font-weight: normal;
      margin-bottom: 35px;
    }

    /* Pengaturan baris label & input */
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

    /* Gaya field Read-only / Disabled */
    .form-control-static {
      height: 32px;
      font-size: 15px;
      padding: 4px 8px;
      border: 1px solid #777;
      background-color: #e9ecef;
      color: #333333;
      border-radius: 2px;
      display: flex;
      align-items: center;
    }

    /* Field panjang (Barcode & Nama) */
    .input-full {
      flex: 1;
    }

    /* Field pendek (Harga & Supplier) */
    .input-short {
      width: 170px;
    }

    /* Bagian tombol aksi */
    .button-container {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
      margin-top: 25px;
    }

    .btn {
      min-width: 85px;
      padding: 6px 14px;
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
      <div class="form-control-static input-full">{{ $product->barcode }}</div>
    </div>

    <!-- Nama Product -->
    <div class="form-group">
      <label>nama product</label>
      <div class="form-control-static input-full">{{ $product->nama_product }}</div>
    </div>

    <!-- Harga Beli -->
    <div class="form-group">
      <label>harga beli</label>
      <div class="form-control-static input-short">
        Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
      </div>
    </div>

    <!-- Harga Jual -->
    <div class="form-group">
      <label>harga jual</label>
      <div class="form-control-static input-short">
        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
      </div>
    </div>

    <!-- Supplier -->
    <div class="form-group">
      <label>supplier</label>
      <div class="form-control-static input-short">
        {{ $product->supplier->nama_supplier ?? '-' }}
      </div>
    </div>

    <!-- Tombol Navigasi -->

  </div>

</body>
</html>