<div>
  <style>
    /* Pembungkus utama */
    div:has(table) {
      background-color: #5b9e69;
      width: 580px;
      margin: 40px auto;
      padding: 30px 40px;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    /* Judul Create Product */
    h2 {
      color: #ffffff;
      text-align: center;
      font-family: 'Times New Roman', serif;
      font-size: 38px;
      font-weight: normal;
      margin-top: 0;
      margin-bottom: 25px;
    }

    /* Tabel Form */
    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
    }

    /* Kolom & Label */
    table td {
      border: none;
      padding: 0;
    }

    .label {
      color: #ffffff;
      font-size: 20px;
      font-weight: 500;
      width: 35%;
    }

    /* Input & Select */
    input, select {
      width: 100%;
      box-sizing: border-box;
      border: 1px solid #777;
      background-color: #ffffff;
      padding: 6px 8px;
      font-size: 15px;
      outline: none;
      border-radius: 2px;
    }

    /* Input yang dibuat pendek sesuai contoh proyektor */
    #hargaBeli, #hargaJual, #supplier {
      width: 55%;
    }

    /* Tombol */
    .action-group {
      display: flex;
      justify-content: flex-end;
      gap: 8px;
      margin-top: 15px;
    }

    .btn {
      background-color: #e9ecef;
      color: #333333;
      border: 1px solid #999999;
      padding: 5px 18px;
      font-size: 14px;
      cursor: pointer;
      border-radius: 2px;
      text-transform: capitalize;
    }

    .btn:hover {
      background-color: #d6d8db;
    }
  </style>

  <h2>Create Product</h2>

  <form action="{{ url('/store-product') }}" method="POST">
  @csrf
  <table>
    <tr>
      <td class="label">nama product</td>
      <td><input type="text" name="product_name" required></td>
    </tr>
    <tr>
      <td class="label">harga beli</td>
      <td><input type="number" name="buy_price" value="0" required></td>
    </tr>
    <tr>
      <td class="label">harga jual</td>
      <td><input type="number" name="sell_price" value="0" required></td>
    </tr>
    <tr>
      <td class="label">supplier</td>
      <td>
        <select name="supplier_name" required>
          <option value="">---Pilih supplier---</option>
          @foreach($supplier as $sup)
            <option value="{{ $sup->nama_supplier ?? $sup->supplier_name }}">
              {{ $sup->nama_supplier ?? $sup->supplier_name }}
            </option>
          @endforeach
        </select>
      </td>
    </tr>
  </table>

  <div class="action-group">
    <button type="submit" class="btn">create</button>
    <a href="{{ url('/product') }}" class="btn">batal</a>
  </div>
</form>
</div>