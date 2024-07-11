<?php

namespace App\Http\Controllers;

use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrderitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orderitem::all();
        if (!$data) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'order not found',
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success retrieved data',
                    'data' => [
                        "attributess" => $data
                    ]
                ]
            );
        }
    }

    public function store(Request $request)
    {
    
    $validator = Validator::make($request->all(), [
        'order_id' => 'required|exists:orders,id', 
        'product_id' => 'required|integer|exists:products,id', 
        'quantity' => 'required|integer|min:1', 
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

  
    $data = $request->only(['order_id', 'product_id', 'quantity']);

    try {
        $orderItem = OrderItem::create($data);

        Log::info('Order item created successfully', ['order_item' => $orderItem]);

        return response()->json([
            'success' => true,
            'message' => 'Order item successfully created',
            'data' => $orderItem
        ], 201);

    } catch (\Exception $e) {
        Log::error('Failed to create order item', ['error' => $e->getMessage()]);

        return response()->json([
            'success' => false,
            'message' => 'Failed to create order item',
        ], 500);
    }
}

public function show($id)
{
    $data = OrderItem::find($id);

    if (!$data) {
        return response()->json([
            'success' => false,
            'message' => 'Order item not found',
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Success retrieved data',
        'data' => [
            'attributes' => $data
        ]
    ], 200);
}
    

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'nullable|integer|exists:products,id', 
            'quantity' => 'nullable|integer|min:1', 
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $orderItem = OrderItem::find($id);
    
        if (!$orderItem) {
            return response()->json([
                'success' => false,
                'message' => 'Order item not found',
            ], 404);
        }
    
        $orderItem->order_id = $request->input('order_id');
        $orderItem->product_id = $request->input('product_id');
        $orderItem->quantity = $request->input('quantity');
    
        try {
            $orderItem->save();
    
            Log::info('Order item updated successfully', ['order_item' => $orderItem]);
    
            return response()->json([
                'success' => true,
                'message' => 'Order item successfully updated',
                'data' => $orderItem
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Failed to update order item', ['error' => $e->getMessage()]);
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to update order item',
            ], 500);
        }
    }
    
    
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
    
    
    public function showidjoin($id){
        $data = Orderitem::with(['order' => function($query) use ($id) {
            $query->where('id', $id);
        }])->where('order_id', $id)->get();
        
        if ($data->isEmpty()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'orders not found',
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
    
    public function destroy($id)
    {
        $orderItem = OrderItem::find($id);
    
        if (!$orderItem) {
            return response()->json([
                'success' => false,
                'message' => 'Order item not found',
            ], 404);
        }
    
        try {
            $orderItem->delete();
            Log::info('Order item deleted successfully', ['order_item_id' => $id]);
    
            return response()->json([
                'success' => true,
                'message' => 'Order item successfully deleted',
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Failed to delete order item', ['error' => $e->getMessage()]);
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete order item',
            ], 500);
        }
    }
    
    
}
