<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function show_alat(){
        return view('alat');
    }
    public function show_bahan(){
        return view('bahan');
    }
    public function show_menu(){
        return view('menu');
    }
    public function show_penjualan(){
        return view('penjualan');
    }
    public function show_barista(){
        return view('barista');
    }
}
