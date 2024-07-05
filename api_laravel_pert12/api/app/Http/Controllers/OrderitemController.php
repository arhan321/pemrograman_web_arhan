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
    public function index()
    {
        $data = Orderitem::all();
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
                    'message' => 'success retrieved data',
                    'data' => [
                        "attributess" => $data
                    ]
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function show(Orderitem $orderitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderitem $orderitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderitem $orderitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderitem  $orderitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderitem $orderitem)
    {
        //
    }
}
