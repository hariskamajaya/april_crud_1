<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LemariController extends Controller
{
    public function index()
    {
        
        return view('lemari.index');
    }

    public function create()
    {
        
        return view('lemari.create');
    }


}
