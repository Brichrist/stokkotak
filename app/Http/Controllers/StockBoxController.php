<?php

namespace App\Http\Controllers;

use App\Models\StockBox;
use Illuminate\Http\Request;

class StockBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = StockBox::where("ukuran",$request->ukuran)->where("tinggi",$request->tinggi)->get();
        if ($data->isEmpty()) {
            StockBox::insert([
                'ukuran' => $request->ukuran,
                'tinggi' => $request->tinggi,
                'jumlah' => $request->jumlah,
                'created_at' =>  now(),
            ]);
        } 
        else {
            $stockawal=StockBox::select('jumlah')->where("ukuran",$request->ukuran)->where("tinggi",$request->tinggi)->first();
            StockBox::where("ukuran",$request->ukuran)->where("tinggi",$request->tinggi)->update([
                'jumlah' => $request->jumlah + $stockawal->jumlah,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockBox  $stockBox
     * @return \Illuminate\Http\Response
     */
    public function show(StockBox $stockBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockBox  $stockBox
     * @return \Illuminate\Http\Response
     */
    public function edit(StockBox $stockBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockBox  $stockBox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockBox $stockBox)
    {
        $stockawal=StockBox::select('jumlah')->where("ukuran",$request->ukuran)->where("tinggi",$request->tinggi)->first();
            StockBox::where("ukuran",$request->ukuran)->where("tinggi",$request->tinggi)->update([
                'jumlah' => $request->jumlah + $stockawal->jumlah,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockBox  $stockBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockBox $stockBox)
    {
        //
    }
}
