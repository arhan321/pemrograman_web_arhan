<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductJsonController extends Controller
{
    public function index()
    {
        $product = DB::connection('mysql')->table('products')->get();
        return response()->json($product, 200);
    }
    
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string|max:255',
            'deleted_at' => 'nullable|date'
        ]);

        // Simpan data ke database
        $inserted = DB::connection('mysql')->table('products')->insert([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'category' => $validatedData['category'],
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => $validatedData['deleted_at'] ?? null,
        ]);

        // Periksa apakah data berhasil disimpan
        if ($inserted) {
            return response()->json(['success' => true, 'message' => 'Product created successfully'], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create product'], 500);
        }
    }
}
