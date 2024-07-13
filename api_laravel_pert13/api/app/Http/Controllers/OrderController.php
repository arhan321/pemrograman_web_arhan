<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::with(array('Orderitem' => function($query){
            $query->select();
        }))->get();
        if (!$data) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Customers not found',
                ]
            );
        }else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Successfully retrieved data',
                    'data' => $data,
                ]
            );
        }
    }


    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|integer',
            'status' => 'required|string',
            'order_detail' => 'required|array',
            'order_detail.*.product_id' => 'required|integer',
            'order_detail.*.quantity' => 'required|integer',
        ]);

        $order = Order::create([
            'customer_id' => $request->input('customer_id'),
            'status' => $request->input('status'),
        ]);

        foreach ($request->input('order_detail') as $detail) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $detail['product_id'],
                'quantity' => $detail['quantity'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order,
        ], 201);
    }

    public function update()
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'customer_id' => 'required|integer',
            'status' => 'required|string',
            'order_detail' => 'required|array',
            'order_detail.*.product_id' => 'required|integer',
            'order_detail.*.quantity' => 'required|integer',
        ]);

        $order = Order::find($id);

        if (is_null($order)) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }

        $order->update([
            'customer_id' => $request->input('customer_id'),
            'status' => $request->input('status'),
        ]);

        foreach ($request->input('order_detail') as $detail) {
            $orderItem = OrderItem::where('order_id', $id)
                ->where('product_id', $detail['product_id'])
                ->first();

            if ($orderItem) {
                $orderItem->update([
                    'quantity' => $detail['quantity'],
                ]);
            } else {
                OrderItem::create([
                    'order_id' => $id,
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity'],
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully',
            'data' => $order,
        ], 200);
    }
    
    public function show($id)
    {
        $order = Order::with('orderitem')->find($id);

        if (is_null($order)) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved data',
            'data' => $order,
        ], 200);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (is_null($order)) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }

        $order->delete();
        OrderItem::where('order_id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully',
        ], 200);
    }
}