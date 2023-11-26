<?php

namespace App\Http\Controllers;
use App\Models\barista;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class controllerBarista extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barista = barista::all();
        return view('barista',['barista'=>$barista]);
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
        $barista = new barista;
        $barista->nama = $request->nama;
        $barista->gaji = $request->gaji;
        $barista->shift = $request->shift;

        $barista->save();
        return redirect('barista')->with('success','Data Barista Berhasil Diubah!');
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
        $barista = barista::find($id);
        $barista->nama = $request->nama;
        $barista->gaji = $request->gaji;
        $barista->shift = $request->shift;

        $barista->save();

        return redirect('/barista')->with('success','Data Barista Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search = barista::find($id);
        $search->delete();
        return redirect('barista')->with('success','Data Barista Berhasil Dihapus!');
    }
}
