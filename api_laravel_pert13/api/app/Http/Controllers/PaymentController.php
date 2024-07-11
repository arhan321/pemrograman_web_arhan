<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Symfony\Contracts\Service\Attribute\Required;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
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
        DB::beginTransaction();
        try{
            $validated->validator::make 
            ($request,[
                'data.attributes.order_id' => 'Required,exists:order_id',
                'data.atrributes.payment_type'=>'Requiered'
            ]);
            if($validated->fails()){
                return response()->json([
                    'error'=>$validated->messages(),
                    "code" =>400,
                ]);
            }
        // $this->validate($request, [
        //     'data.attributes.order.id' =>
        //     'requiered|exists:orders,id',
        //     'data.attributes. payment_type' =>'requiered'
        // ]);
        $order_id = $request->input('data.attributes.order_id');

        // $CheckOrderPayment = Payment::where 

        $order = Order::where('id',$order_id)->first(); 
        if ($CheckOrderPayment){
            return response()->json();
        }
        
        $payment_type = $request->input('data.attributes.payment.order_id');
        
        $orderitem = $order->orderItem()->get();
        $grosstotal = 0;
        foreach ($orderitem as $key =>$item){
            $grosstotal += $item->product()->first();
        }

        $payment = [
        'order_id'=>$order_id,
        'transaction_id'=>str::uuid(),
        'gross_amount'=>$grosstotal,
        'transaction_time'=>new Date(),
        'transaction_status'=>'Succees'
        ];

        payment::create($payment);
        return response()->json([

        ])->status(201);
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'error' => $th->getMessage(),
                'code' => 500,
            ]);
        }
    }

//     public function store(Request $request)
// {
//     DB::beginTransaction();
//     try {
//         // Validate the request data
//         $validated = $request->validate([
//             'data.attributes.order_id' => 'required|exists:orders,id',
//             'data.attributes.payment_type' => 'required'
//         ]);

//         // Get the order_id from the request
//         $order_id = $request->input('data.attributes.order_id');

//         // Check if the order exists
//         $order = Order::where('id', $order_id)->first();

//         // Check if a payment for this order already exists
//         $checkOrderPayment = Payment::where('order_id', $order_id)->exists();
//         if ($checkOrderPayment) {
//             return response()->json([
//                 'error' => 'Payment for this order already exists.',
//                 'code' => 400,
//             ]);
//         }

//         // Calculate the gross total from order items
//         $orderItems = $order->orderItems()->get(); // Assuming the relationship method is named orderItems
//         $grossTotal = 0;
//         foreach ($orderItems as $item) {
//             $grossTotal += $item->product()->first()->price; // Assuming the product has a price attribute
//         }

//         // Prepare the payment data
//         $payment = [
//             'order_id' => $order_id,
//             'transaction_id' => Str::uuid(),
//             'gross_amount' => $grossTotal,
//             'transaction_time' => now(), // Use now() for the current date and time
//             'transaction_status' => 'Success'
//         ];

//         // Create the payment
//         Payment::create($payment);

//         // Commit the transaction
//         DB::commit();

//         // Return the success response
//         return response()->json([
//             'message' => 'Payment created successfully.',
//             'payment' => $payment,
//         ], 201);
//     } catch (\Throwable $th) {
//         // Rollback the transaction on error
//         DB::rollBack();

//         // Return the error response
//         return response()->json([
//             'error' => $th->getMessage(),
//             'code' => 500,
//         ]);
//     }
// }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
