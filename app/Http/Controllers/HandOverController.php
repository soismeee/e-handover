<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandOverController extends Controller
{
    public function index(){
        return view('handover.index', [
            'title' => 'Hand Over',
            'menu' => 'Hand Over',
            'submenu' => 'Daftar Hand Over',
        ]);
    }
    
    public function create(){
        return view('handover.create', [
            'title' => 'Create Hand Over',
            'menu' => 'Hand Over',
            'submenu' => 'Form Hand Over',
        ]);
    }
}
