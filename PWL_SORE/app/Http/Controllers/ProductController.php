<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    // Mengambil semua data produk dari yang paling baru
    $products = \App\Models\Product::latest()->get();

    // Mengirim variabel $products ke resources/views/product/index.blade.php
    return view('product.index', compact('products'));
}

    public function create()
    {
        $supplier = \App\Models\Supplier::all(); // atau supplier::all();
        return view('product.create', compact('supplier'));
    }

public function store(Request $request)
{
    // Simpan sesuai nama kolom di database
    Product::create([
        'supplier_name' => $request->supplier_name,
        'product_name'  => $request->product_name,
        'buy_price'     => $request->buy_price,
        'sell_price'    => $request->sell_price,
    ]);

    return redirect('/product')->with('success', 'Produk berhasil ditambahkan.');
}

    public function show(string|int $id)
{
    // Mengambil data produk berdasarkan ID
    $product = Product::findOrFail($id);

    return view('product.show', compact('product'));
}

    public function edit(string|int $id)
    {
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all();

        return view('product.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, string|int $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'barcode'      => 'required',
            'nama_product' => 'required|string|max:255',
            'harga_beli'   => 'required|numeric',
            'harga_jual'   => 'required|numeric',
            'supplier'     => 'required',
        ]);

        $product->update($validated);

        return redirect('/product')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(string|int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus.');
    }
}