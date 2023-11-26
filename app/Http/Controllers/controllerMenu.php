<?php

namespace App\Http\Controllers;
use App\Models\menu;
use Illuminate\Http\Request;

class controllerMenu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = menu::all();
        return view('menu',['menu'=>$menu]);
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
            'nama_menu'=>'required|unique:menu',
            'harga'=>'required',
            'untung'=>'required',
        ]);
        $menu = new menu;
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->untung = $request->untung;
        $menu->save();

        return redirect('/menu')->with('success','Data Menu Berhasil Ditambahkan!');

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
            'nama_menu'=>'required|unique:menu',
            'harga'=>'required',
            'untung'=>'required',
        ]);
        $menu = menu::find($id);
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->untung = $request->untung;
        $menu->save();

        return redirect('/menu')->with('success','Data Menu Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search = menu::find($id);
        $search->delete();
        return redirect('/menu')->with('success','Data Menu Berhasil Dihapus!');
    }
}
