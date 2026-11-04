<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
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

    /* Judul Form */
    h1 {
      color: #ffffff;
      text-align: center;
      font-family: "Georgia", serif;
      font-size: 38px;
      font-weight: normal;
      margin-bottom: 30px;
    }

    /* Tampilan Pesan Error Validasi */
    .alert-error {
      background-color: #f8d7da;
      color: #842029;
      border: 1px solid #f5c2c7;
      padding: 10px 15px;
      border-radius: 2px;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .alert-error ul {
      margin-left: 18px;
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

    /* Input text & select */
    input[type="text"],
    input[type="number"],
    select {
      height: 32px;
      font-size: 15px;
      padding: 2px 8px;
      border: 1px solid #777;
      background-color: #ffffff;
      outline: none;
      border-radius: 2px;
    }

    /* Input panjang (Barcode & Nama) */
    .input-full {
      flex: 1;
    }

    /* Input pendek (Harga & Supplier) */
    .input-short {
      width: 180px;
    }

    /* Bagian tombol Save & Cancel */
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
    <h1>Edit Product</h1>

    {{-- Tampilkan error validasi jika ada input yang salah --}}
    @if ($errors->any())
      <div class="alert-error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form mengirim request method PUT ke rute /product/{id} --}}
    <form action="{{ url('/product/' . $product->id) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- Barcode -->
      <div class="form-group">
        <label for="barcode">Barcode</label>
        <input type="text" id="barcode" name="barcode" class="input-full" value="{{ old('barcode', $product->barcode) }}" required>
      </div>

      <!-- Nama Product -->
      <div class="form-group">
        <label for="nama_product">nama product</label>
        <input type="text" id="nama_product" name="nama_product" class="input-full" value="{{ old('nama_product', $product->nama_product) }}" required>
      </div>

      <!-- Harga Beli -->
      <div class="form-group">
        <label for="harga_beli">harga beli</label>
        <input type="number" id="harga_beli" name="harga_beli" class="input-short" value="{{ old('harga_beli', $product->harga_beli) }}" required>
      </div>

      <!-- Harga Jual -->
      <div class="form-group">
        <label for="harga_jual">harga jual</label>
        <input type="number" id="harga_jual" name="harga_jual" class="input-short" value="{{ old('harga_jual', $product->harga_jual) }}" required>
      </div>

      <!-- Supplier -->
      <div class="form-group">
        <label for="supplier">supplier</label>
        <select id="supplier" name="supplier" class="input-short" required>
          <option value="">---Pilih supplier---</option>
          @foreach ($suppliers as $item)
            <option value="{{ $item->nama_supplier }}" {{ old('supplier', $product->supplier) == $item->nama_supplier ? 'selected' : '' }}>
              {{ $item->nama_supplier }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Tombol Aksi -->
      <div class="button-container">
        <button type="submit" class="btn">Save</button>
        <a href="{{ url('/product') }}" class="btn">Cancel</a>
      </div>
    </form>
  </div>

</body>
</html>