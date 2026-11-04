<?php

use Illuminate\Support\Facades\Route;
use App\Models\transaction;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return transaction::with('supplier')->get();
});

route::get('/transaction', [TransactionController::class, 'index']);
route::get('/create-transaction', [TransactionController::class, 'create']);
route::post('/store-transaction', [TransactionController::class, 'store']);
route::get('/transaction/{id}', [TransactionController::class, 'show']);
route::get('/edit-transaction/{id}', [TransactionController::class, 'edit']);
route::put('transaction/{id}', [TransactionController::class, 'update']);
route::delete('transaction/{id}', [TransactionController::class, 'destroy']);

route::get('/supplier', [SupplierController::class, 'index']);
route::get('/create-supplier', [SupplierController::class, 'create']);
route::post('/store-supplier', [SupplierController::class, 'store']);
route::get('/supplier/{id}', [SupplierController::class, 'show']);
route::get('/supplier/{id}', [SupplierController::class, 'edit']);
route::put('supplier/{id}', [SupplierController::class, 'update']);
route::delete('supplier/{id}', [SupplierController::class, 'destroy']);

route::get('/product', [ProductController::class, 'index']);
route::get('/create-product', [ProductController::class, 'create']);
route::post('/store-product', [ProductController::class, 'store']);
route::get('/show-product/{id}', [ProductController::class, 'show']);
route::get('/edit-product/{id}', [ProductController::class, 'edit']);
route::put('/product/{id}', [ProductController::class, 'update']);
route::delete('product/{id}', [ProductController::class, 'destroy']);