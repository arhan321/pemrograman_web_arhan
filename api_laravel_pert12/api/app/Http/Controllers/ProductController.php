<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        if (!$data) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'products not found',
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'products retrieved data',
                    'data' => $data,
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required',
        ]);
    
        DB::connection('mysql')->table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    
        return response()->json(['success' => true, 'message' => 'product created successfully added'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::connection('mysql')->table('products')->where('id', $id)->first();
    
        if (is_null($product)) {
            return response()->json([
                'success' => false,
                'message' => 'product not found',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'product found',
            'product' => $product
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'nullable',
        ]);
    
        $products = DB::connection('mysql')->table('products')->where('id', $id)->first();
        
        if (is_null($products)) {
            return response()->json([
                'success' => false,
                'message' => 'products not found',
            ], 404);
        }
    
        $updateData = [
            'name' => $request->input('name', $products->name),
            'price' => $request->input('price', $products->price),
            'updated_at' => Carbon::now()
        ];
    
        DB::connection('mysql')->table('products')->where('id', $id)->update($updateData);
        $updateproducts = DB::connection('mysql')->table('products')->where('id', $id)->first();
    
        return response()->json([
            'success' => true,
            'message' => 'products updated successfully',
            'data' => $updateproducts
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = DB::connection('mysql')->table('products')->where('id', $id)->first();
        if (is_null($products)) {
            return response()->json([
                'success' => false,
                'message' => 'products Not Found',
            ], 404);
        }
    
        DB::connection('mysql')->table('products')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'products Deleted',
        ], 200);
    }
}
