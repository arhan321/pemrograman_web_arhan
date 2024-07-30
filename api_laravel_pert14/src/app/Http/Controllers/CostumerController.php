<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CostumerController extends Controller
{

    public function index()
    {
        $data = Costumer::get();
        if(!$data) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Customers Not Found'
                ]
                );
            } else {
             return response()->json(
                [
                    'success' => true,
                    'message' => 'Success Retrive Data',
                    'data' => $data
                ]
             ) ; 
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // $timestamp = \Carbon\Carbon::now()->toDateTimeString();

        // $this->validate($request, [
        //    'full_name' => 'required | string',
        //    'username' => 'required | string',
        //    'email' => 'required | email | unique:costumers,email',
        //    'phone_number' => 'required | string'
        // ]);

        $this->validate($request, [
            'data.attributes.full_name' => 'required',
            'data.attributes.username' => 'required',
            'data.attributes.email' => ['required', 'email', Rule::unique('costumers','email')],
            'data.attributes.phone_number' => 'required',
        ]);

        $data = new Costumer();
        $data->full_name = $request->input('data.attributes.full_name');
        $data->username = $request->input('data.attributes.username');
        $data->email = $request->input('data.attributes.email');
        $data->phone_number = $request->input('data.attributes.phone_number');
        $data->save();

        // $request['created_at'] = $timestamp;
        // $request['updated_at'] = $timestamp;

        // $data = DB::connection('mysql')->table('costumers')->insert($request->all());

        return response()->json(
            [
                'success' => true,
                'message' => 'Success Retrive Data',
               // 'data' => $data
                'data' => [
                    'attributes' => $data
                ]
            ]) ; 

    }


    public function show($id)
    {
        //
        $data = Costumer::find($id);
        if(!$data) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Customers Not Found'
                ]
                );
            } else {
             return response()->json(
                [
                    'success' => true,
                    'message' => 'Success Retrive Data',
                    'data' => $data
                ]
             ) ;
         }
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'data.attributes.full_name' => 'required',
            'data.attributes.username' => 'required',
            'data.attributes.email' => ['required', 'email', Rule::unique('costumers','email')],
            'data.attributes.phone_number' => 'required',
        ]);

        $data = Costumer::find($id);

        if ($data) {
            $data->full_name = $request->input('data.attributes.full_name');
            $data->username = $request->input('data.attributes.username');
            $data->email = $request->input('data.attributes.email');
            $data->phone_number = $request->input('data.attributes.phone_number');
            $data->save();

            return response()->json([
                "success" => true,
                "message" => "Success Updated",
                "data" => [
                    "attributes" => $data
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not Found',
            ]);
        }
        
    }

    public function update(Request $request, Costumer $costumer)
    {
        //
    }

    public function destroy($id)
    {
        $data = Costumer::find($id);
        if($data) {
            $data ->delete();

            $result = array(
                "data" => array("attributes")
                );
            
            return response()->json([
                    'success' => true,
                    'message' => 'Success Retrive Data',
                    'data' => [
                        'attributes' => $data
                    ]
                ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not Found',
            ]);
        }
    }
}
