<?php

namespace App\Http\Controllers;

use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = Orderitem::all();
    //     if (!$data) {
    //         return response()->json(
    //             [
    //                 'success' => false,
    //                 'message' => 'products not found',
    //             ]
    //         );
    //     } else {
    //         return response()->json(
    //             [
    //                 'success' => true,
    //                 'message' => 'success retrieved data',
    //                 'data' => [
    //                     "attributess" => $data
    //                 ]
    //             ]
    //         );
    //     }
    // }

    public function showdatajoin(){
        $data = Orderitem::with(['order' => function($query) {
            $query->select();
        }])->get();
    
        if ($data->isEmpty()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'products not found',
                ]
            );
        } else {
            Log::info('showing all data order item');
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success retrieved data',
                    'data' => [
                        "attributes" => $data
                    ]
                ]
            );
        }
    }
    
    
    public function show($id){
        $data = Orderitem::with(['order' => function($query) use ($id) {
            $query->where('id', $id);
        }])->where('order_id', $id)->get();
    
        if ($data->isEmpty()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'products not found',
                ]
            );
        } else {
            Log::info('showing all data order item');
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success retrieved data',
                    'data' => [
                        "attributes" => $data
                    ]
                ]
            );
        }
    }
    

    
    
}
