<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cost = DB::connection('dbcore')->table('costumers')->paginate(1); //menggunakan paginate
        //$cost = DB::connection('dbcore')->get('select * from costumers'); //cara normal
        $cost= DB::connection('dbcore')->table('costumers')->get(); //cara laravel
        return response()->json($cost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $this->validate($request, [
            'name' => 'required',
        ]);

        $request['created_at'] = $timestamp;
        $request['updated_at'] = $timestamp;

        $cost = DB::connection('dbcore')->table('costumers')->insert($request->all());



        return response()->json(response("Berhasil ditambahkan"));
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
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cost = DB::connection('dbcore')->table('costumers')->where('id', $id)->first();
        return response()->json($cost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cost = DB::connection('dbcore')->table('costumers')->where('id', $id)->get();
        return response()->json(" EDIT $cost");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $request['updated_at'] = $timestamp;
        $cost = DB::connection('dbcore')->table('costumers')->where('id', $id)->update($request->all());
        return response()->json("Berhasil Update Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cost = DB::connection('dbcore')->table('costumers')->where('id', $id)->delete();
        return response()->json("Berhasil Hapus");
    }

    public function test(Request $request){
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $this->validate($request, [
            'name' => 'required',
        ]);
        //$request['tabel'] = date('YmdHis');
        $request['tabel']= '_transaksi';
        $table = implode('', $request->all());
        //dd($table);
        Schema::connection('dbtransaction')->dropIfExists($table);
        $test = Schema::connection('dbtransaction')->create($table, function (Blueprint $table)
        {
            $table->id();
            $table->integer('costumer_id');
            $table->integer('costumer_to');
            $table->string('nominal_transaksi');
            $table->string('saldo_awal');
            $table->string('saldo_akhir');
            $table->text('keterangan')->nullable;
            $table->timestamps();
        });
        //$select = DB::connection('dbcore')->table('costumers')->where('name', $table)->get();
        // $result=json_decode($select,true);
        // // dd($result);
        // foreach ($result as $value) {
        //         //$obj = ($value['id']);


        // }
        DB::connection('dbtransaction')->table($table)->insert([
            'costumer_id'  => '5',
            'costumer_to'  => '1',
            'nominal_transaksi' => '3',
            'saldo_awal'  => '10',
            'saldo_akhir'  => '7',
            'keterangan' => 'transfer',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);

        $select = DB::connection('dbtransaction')->table($table)->get();
        //dd($select);
       return response()->json($select);
    }

}
