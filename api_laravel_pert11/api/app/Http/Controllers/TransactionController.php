<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = DB::connection('mysql')->table('transactions')->get();
        return response()->json($transaction, 200);
    }
    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'total_transaksi' => 'required|numeric',
        ]);
    
        $product = DB::connection('mysql')->table('products')->where('id', $request->input('product_id'))->first();
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }
    
        $transactionData = [
            'product_id' => $request->input('product_id'),
            'total_transaksi' => $request->input('total_transaksi'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    
        $storeID = DB::connection('mysql')->table('transactions')->insertGetId($transactionData);
        return response()->json(['success' => true, 'message' => 'Transaction created successfully', 'transaction_id' => $storeID], 201);
    }


    public function show($id)
    {
        $transactions = DB::connection('mysql')->table('transaction')->where('id', $id)->first();

        if (is_null($transactions)) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product found',
            'product' => $transactions
        ], 200);
    }

   
    public function edit(Transaction $transaction)
    {
        //
    }

    
     public function update(Request $request, $id)
     {
         $this->validate($request, [
             'product_id' => 'required',
             'total_transaksi' => 'required|numeric', 
         ]);
     
         $data = DB::connection('mysql')->table('transactions')->where('id', $id)->first();
         if (is_null($data)) {
             return response()->json([
                 'success' => false,
                 'message' => 'Transaction not found', 
             ], 404);
         }
     
         $updateData = [
             'product_id' => $request->input('product_id', $data->product_id),
             'total_transaksi' => $request->input('total_transaksi', $data->total_transaksi),
             'updated_at' => Carbon::now()
         ];
     
         DB::connection('mysql')->table('transactions')->where('id', $id)->update($updateData);
         $dataUpdate = DB::connection('mysql')->table('transactions')->where('id', $id)->first();
         $responseTrue = [
             'success' => true,
             'message' => 'Transaction updated successfully',
             'data' => $dataUpdate
         ];
         return response()->json($responseTrue, 200); 
     }

    public function destroy($id) 
    {
        $transaction = DB::connection('mysql')->table('transactions')->where('id', $id)->first();
        if (is_null($transaction)) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found',
            ], 404);
        }
    
        DB::connection('mysql')->table('transactions')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product Deleted',
        ], 200);
    }
}
