<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return transaction::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return transaction::view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return transaction::create();
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        return transaction::find();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        return transaction::view();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        return transaction::update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        return transaction::delete();
    }
}
