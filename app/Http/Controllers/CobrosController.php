<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobrosController extends Controller
{
    public function index(){
        return view('cobros.index');
    }

    public function show($id){
        return view('cobros.target', compact('id'));
    } 
}
