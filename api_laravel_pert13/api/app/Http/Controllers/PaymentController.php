<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\CoreApi;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|integer',
            'gross_amount' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $uniqueOrderId = $request->input('order_id') . '-' . Str::uuid();

        $transaction_details = [
            'order_id' => $uniqueOrderId,
            'gross_amount' => $request->input('gross_amount'),
        ];

        $params = [
            'payment_type' => 'bank_transfer',
            'transaction_details' => $transaction_details,
            'customer_details' => [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ],
            'bank_transfer' => [
                'bank' => 'bca'
            ],
        ];

        try {
            $response = CoreApi::charge($params);
            $va_number = $response->va_numbers[0]->va_number;

            $payment = Payment::create([
                'order_id' => $uniqueOrderId,
                'transaction_id' => $response->transaction_id,
                'payment_type' => 'online',
                'gross_amount' => $request->input('gross_amount'),
                'transaction_time' => Carbon::now(),
                'transaction_status' => $response->transaction_status,
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $payment,
                'va_number' => $va_number,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }
        return response()->json($payment);
    }

    public function edit(Request $request, $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $this->validate($request, [
            'order_id' => 'required|integer',
            'gross_amount' => 'required|string',
            'transaction_status' => 'required|string',
        ]);

        $payment->order_id = $request->input('order_id');
        $payment->gross_amount = $request->input('gross_amount');
        $payment->transaction_status = $request->input('transaction_status');
        $payment->save();

        return response()->json($payment);
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
