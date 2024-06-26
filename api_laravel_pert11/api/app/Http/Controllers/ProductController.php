<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
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
        $product = DB::connection('mysql')->table('products')->get();
        return response()->json($product, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create(){
        
     }

     public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|string',
            'qty' => 'requiered',
        ]);

        DB::connection('mysql')->table('products')->insert([
            'name' => $request->input('name'),
            'price' =>$request->input('price'),
            'qty' => $request->input('qty'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Product created successfully'], 201);
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product found',
            'product' => $product
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $product = DB::connection('mysql')->table('products')->where('id', $id)->first();

    //     if (is_null($product)) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Product not found',
    //         ], 404);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'product' => $product
    //     ], 200);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'requiered',
            'qty' => 'requiered'
        ]);
    
        $data = DB::connection('mysql')->table('products')->where('id', $id)->first();
        $responseFalse = [
            'success' => True,
            'message' => 'Product Founded',
        ];
    
        if(is_null($data)){
            return response()->json($responseFalse, 404);
        } 
    
        $updateData = [
            'name'=>$request->input('name', $data->name),
            'updated_at'=>Carbon::now()
        ];
    
        DB::connection('mysql')->table('products')->where('id', $id)->update($updateData);
        $dataUpdate = DB::connection('mysql')->table('products')->where('id', $id)->first();
        $responseTrue = [
            'success' => True,
            'message' => 'Product Updated',
            'data' => $dataUpdate
        ];
            return response()->json($responseTrue, 201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::connection('mysql')->table('products')->where('id', $id)->first();
        if (is_null($product)) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found',
            ], 404);
        }
    
        DB::connection('mysql')->table('products')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product Deleted',
        ], 200);
    }
}
