<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hist= DB::connection('dbhistory')->table('histories')->get(); //cara laravel
        return response()->json($hist);
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
            'costumer_id' => 'required',
            'status' => 'required'
        ]);

        $request['created_at'] = $timestamp;
        $request['updated_at'] = $timestamp;

        $hist = DB::connection('dbhistory')->table('histories')->insert($request->all());
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
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $hist = DB::connection('dbhistory')->table('histories')->where('costumer_id', $id)->first();
        return response()->json($hist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hist = DB::connection('dbhistory')->table('histories')->where('costumer_id', $id)->get();
        return response()->json(" EDIT $hist");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $request['updated_at'] = $timestamp;
        $hist = DB::connection('dbhistory')->table('histories')->where('costumer_id', $id)->update($request->all());
        return response()->json("Berhasil Update Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hist = DB::connection('dbhistory')->table('histories')->where('costumer_id', $id)->delete();
        return response()->json("Berhasil Hapus");
    }
}
