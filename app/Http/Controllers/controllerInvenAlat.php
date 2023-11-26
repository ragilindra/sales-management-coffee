<?php

namespace App\Http\Controllers;
use App\Models\alat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \RealRashid\SweetAlert\ToSweetAlert;

class controllerInvenAlat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alat = alat::all();
        return view('alat',['alat'=>$alat]);
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

        //validation
        $request->validate([
            'nama_alat'=>'required|unique:inventaris_alat',
            'jumlah'=>'required',
            'satuan'=>'required',
            'kondisi'=>'required'
        ]);
        $alat = new alat;
        $alat->nama_alat = $request->nama_alat;
        $alat->jumlah = $request->jumlah;
        $alat->satuan = $request->satuan;
        $alat->kondisi = $request->kondisi;

        $alat->save();

        return redirect('/alat')->with('success','Data Alat Berhasil Ditambahkan!');
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
            'nama_alat'=>'required|unique:inventaris_alat',
            'jumlah'=>'required',
            'satuan'=>'required',
            'kondisi'=>'required'
        ]);
        $alat = alat::find($id);
        $alat->nama_alat = $request->nama_alat;
        $alat->jumlah = $request->jumlah;
        $alat->satuan = $request->satuan;
        $alat->kondisi = $request->kondisi;

        $alat->save();

        return redirect('/alat')->with('success','Data Alat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search = alat::find($id);
        $search->delete();
        return redirect('/alat')->with('success','Data Alat Berhasil Dihapus!');
    }
}
