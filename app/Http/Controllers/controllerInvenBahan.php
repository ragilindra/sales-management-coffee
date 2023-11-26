<?php

namespace App\Http\Controllers;
use App\Models\bahan;
use Illuminate\Http\Request;

class controllerInvenBahan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = bahan::all();
        return view('bahan',['bahan'=>$bahan]);
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
        $request->validate([
            'nama_bahan'=>'required|unique:inventaris_bahan',
            'jumlah'=>'required',
            'satuan'=>'required',
            'kondisi'=>'required'
        ]);
        $bahan = new bahan;
        $bahan->nama_bahan = $request->nama_bahan;
        $bahan->jumlah = $request->jumlah;
        $bahan->satuan = $request->satuan;
        $bahan->kondisi = $request->kondisi;

        $bahan->save();

        return redirect('/bahan')->with('success','Data Bahan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan'=>'required|unique:inventaris_bahan',
            'jumlah'=>'required',
            'satuan'=>'required',
            'kondisi'=>'required'
        ]);
        $bahan = bahan::find($id);
        $bahan->nama_bahan = $request->nama_bahan;
        $bahan->jumlah = $request->jumlah;
        $bahan->satuan = $request->satuan;
        $bahan->kondisi = $request->kondisi;

        $bahan->save();

        return redirect('/bahan')->with('success','Data Bahan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search = bahan::find($id);
        $search->delete();
        return redirect('/bahan')->with('success','Data Bahan Berhasil Dihapus!');
    }
}
