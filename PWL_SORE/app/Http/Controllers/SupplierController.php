<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return supplier::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return supplier::view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return supplier::create();
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        return supplier::find();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier $supplier)
    {
        return supplier::view();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supplier $supplier)
    {
        return supplier::update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supplier $supplier)
    {
        return supplier::delete();
    }
}
