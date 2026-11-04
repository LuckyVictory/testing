<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Produk</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background-color: #648a64;
      font-family: Arial, Helvetica, sans-serif;
      min-height: 100vh;
      padding: 40px 20px;
      display: flex;
      justify-content: center;
    }
    .container { width: 100%; max-width: 950px; }
    h1 {
      color: #ffffff;
      text-align: center;
      font-family: "Georgia", serif;
      font-size: 38px;
      font-weight: normal;
      margin-bottom: 25px;
    }
    .top-bar {
      display: flex;
      justify-content: flex-start;
      margin-bottom: 16px;
    }
    .btn {
      padding: 6px 14px;
      font-size: 13px;
      color: #222222;
      background-color: #ececec;
      border: 1px solid #999999;
      border-radius: 2px;
      text-decoration: none;
      cursor: pointer;
      display: inline-block;
    }
    .btn:hover { background-color: #dfdfdf; }
    .btn-show { color: #0b5ed7; }
    .btn-edit { color: #795548; }
    .btn-delete { color: #b30000; }
    .btn-delete:hover { background-color: #ffdada; }
    
    .table-wrapper {
      background-color: #ffffff;
      border-radius: 2px;
      overflow-x: auto;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }
    table { width: 100%; border-collapse: collapse; font-size: 14px; }
    thead th {
      background-color: #4f6f4f;
      color: #ffffff;
      padding: 12px 14px;
      font-weight: normal;
      text-align: left;
    }
    tbody td {
      padding: 10px 14px;
      border-bottom: 1px solid #e0e0e0;
      color: #333333;
    }
    tbody tr:hover { background-color: #f7f9f7; }
    .action-group { display: flex; gap: 6px; justify-content: center; }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
  </style>
</head>
<body>

  <div class="container">
    <h1>Product List</h1>

    <div class="top-bar">
      <a href="{{ url('/create-product') }}" class="btn">+ Create Product</a>
    </div>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">No</th>
            <th>Nama Product</th>
            <th class="text-right">Harga Beli</th>
            <th class="text-right">Harga Jual</th>
            <th>Supplier</th>
            <th class="text-center" style="width: 190px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $index => $item)
            <tr>
              <td class="text-center">{{ $index + 1 }}</td>
              {{-- Ambil nama kolom sesuai database --}}
              <td>{{ $item->product_name }}</td>
              <td class="text-right">Rp {{ number_format($item->buy_price, 0, ',', '.') }}</td>
              <td class="text-right">Rp {{ number_format($item->sell_price, 0, ',', '.') }}</td>
              <td>{{ $item->supplier_name }}</td>
              
              <td class="text-center">
                <div class="action-group">
                  <a href="{{ url('/show-product/' . $item->id) }}" class="btn btn-show">Show</a>
                  <a href="{{ url('/edit-product/' . $item->id) }}" class="btn btn-edit">Edit</a>
                  <form action="{{ url('/product/' . $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center" style="padding: 20px; color: #777;">
                Belum ada data produk. Silakan klik <strong>+ Create Product</strong>.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>