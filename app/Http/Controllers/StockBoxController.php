<?php

namespace App\Http\Controllers;

use App\Models\StockBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class StockBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=StockBox::where('jumlah','>',0)->orderBy('ukuran','ASC')->orderBy('tinggi','ASC')->get();
        return view("home",compact("files"));

    }
    public function indexukuran($ukuran)
    {
        $tinggi=StockBox::where('jumlah','>',0)->where("ukuran",$ukuran)->orderBy('ukuran','ASC')->orderBy('tinggi','ASC')->pluck("tinggi");
        return json_encode($tinggi);
    }
    public function indextinggi($ukuran,$tinggi)
    {
        $jumlah=StockBox::where('jumlah','>',0)->where("ukuran",$ukuran)->where("tinggi",$tinggi)->orderBy('ukuran','ASC')->orderBy('tinggi','ASC')->pluck("jumlah",'id');
        // dd($jumlah);
        return json_encode($jumlah);

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
        dd(URL::current());
        return redirect("/stockkotak");
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
        // dd($stockawal);
        StockBox::where("ukuran",$request->ukuran)->where("tinggi",$request->tinggi)->update([
            'jumlah' =>  $stockawal->jumlah - $request->jumlah ,
        ]);
        return redirect("/stockkotak");
        
    }
    public function updatedata($id,$func)
    {
        // dd("aa");

        $stockawal=StockBox::select('jumlah')->find($id)->jumlah;
        if ($func =="negative") {
            $stockawal =  $stockawal- 1 ;
        } else {
            $stockawal=  $stockawal + 1 ;
        }
        // dd($stockawal);

        StockBox::find($id)->update(['jumlah'=>$stockawal]);
        // dd($stockawal);

        return json_encode($stockawal);

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
