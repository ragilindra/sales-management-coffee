<?php

namespace App\Http\Controllers;
use App\Models\menu;
use App\Models\penjualan;
use Illuminate\Http\Request;

class controllerPenjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = penjualan::all();
        $menu = menu::all();
        return view('penjualan',['penjualan'=>$penjualan],['menu'=>$menu]);
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
        // dump($request);
        // die;
        $penjualan = new penjualan;
        $menu = $request->nama_barang;
        $cari = menu::find($menu);
        $harga_item = $cari->harga;
        $untung_item = $cari->untung;
        $total = $harga_item * $request->jumlah;
        $total_untung= $untung_item * $request->jumlah;
        $penjualan->Total_Harga = $total;
        $penjualan->untung= $total_untung;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->nama_barang = $cari->nama_menu;
        $penjualan->save();

        return redirect('/penjualan')->with('success','Data Penjualan Berhasil Ditambahkan!');
        // $menu = new menu;
        // $penjualan->created_at = $request->tanggal;
        // $penjualan->nama_barang = $request->nama_barang;
        // $penjualan->jumlah = $request->jumlah;
        // $menu = menu::find($request->nama_barang);
        // $pilih = $request->nama_barang;
        // echo $pilih->harga;
        // $penjualan->Total_Harga = $menu->harga * $request->jumlah ;
        // $penjualan->save();
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
        $penjualan = penjualan::find($id);
        $cariID = $request->id;
        $cari = menu::find($cariID);
        $harga_item = $cari->harga;
        $untung_item = $cari->untung;
        $total = $harga_item * $request->jumlah;
        $total_untung = $untung_item * $request->jumlah;
        $penjualan->Total_Harga = $total;
        $penjualan->untung = $total_untung;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->nama_barang = $cari->nama_menu;
        $penjualan->save();

        return redirect('/penjualan')->with('success','Data Penjualan Berhasil Diubah!');
        // $penjualan->save();

        // return redirect('/penjualan');
        // // $total = $harga_item * $request->jumlah;
        // $penjualan->Total_Harga = $total;
        // $penjualan->jumlah = $request->jumlah;
        // // $cari = menu::find($request->nama_menu);
        // $harga_item = $cari->harga;
        // $total = $harga_item * $request->jumlah;
        // $penjualan->Total_Harga = $total;
        // $penjualan->jumlah = $request->jumlah;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search = penjualan::find($id);
        $search->delete();
        return redirect('/penjualan')->with('success','Data Penjualan Berhasil Dihapus!');
    }
}
