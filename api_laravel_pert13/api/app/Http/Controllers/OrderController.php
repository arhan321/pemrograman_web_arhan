<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
 
    public function index()
    {
        $data = Order::with('orderitem')->get();
        if(!$data) {
            return response()->json([
                "message" => "Data Not Found"
            ]);
        }

        Log::info('Showing all orders');

        return response()->json([
            "message" => "Success retrieve data",
            "status" => true,
            "data" => $data
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id'
        ]);

        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        $order->status = "created";
        $order->save();

        $order_detail = $request->input('order_detail');

        foreach ($order_detail as $detail) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $detail['product_id'];
            $order_item->quantity = $detail['quantity'];
            $order->orderitem()->save($order_item);
        }

        Log::info('Adding order');

        return response()->json([
            "message" => "Success Added",
            "status" => true,
            "data" => $order
        ]);
    }


    public function show($id)
    {
        $data = Order::with('orderitem')->find($id);
        if(!$data) {
            return response()->json([
                "message" => "Parameter Not Found"
            ]);
        }

        Log::info('Showing order by id');

        return response()->json([
            "message" => "Success retrieve data",
            "status" => true,
            "data" => $data
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:customers,id'
        ]);
        
        $order = Order::find($id);
        if ($order) {
            $order->user_id = $request->input('user_id');
            $order->status = "created";
            $order->save();

            $order_detail = $request->input('order_detail');

            foreach ($order_detail as $detail) {
                $order_item = OrderItem::where('order_id', $id)->first();
                $order_item->product_id = $detail['product_id'];
                $order_item->quantity = $detail['quantity'];
                $order->orderitem()->save($order_item);
            }

            Log::info('Updating order by id');

            return response()->json([
                "message" => "Success Updated",
                "status" => true,
                "data" => $order
            ]);        
        } else {
            return response()->json([
                "message" => "Parameter Not Found"
            ]);
        }
    }

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:customers,id'
        ]);
        
        $order->user_id = $request->input('user_id');
        $order->status = "updated";
        $order->save();

        $order_detail = $request->input('order_detail');

        foreach ($order_detail as $detail) {
            $order_item = OrderItem::where('order_id', $order->id)->first();
            $order_item->product_id = $detail['product_id'];
            $order_item->quantity = $detail['quantity'];
            $order->orderitem()->save($order_item);
        }

        Log::info('Updating order');

        return response()->json([
            "message" => "Success Updated",
            "status" => true,
            "data" => $order
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if($order) {
            $order->delete();
            OrderItem::where('order_id', $id)->delete();

            Log::info('Deleting order by id');

            return response()->json([
                "message" => "Success Deleted",
                "status" => true,
                "data" => $order
            ]);   
        } else {
            return response()->json([
                "message" => "Parameter Not Found"
            ]);
        }
    }
}
