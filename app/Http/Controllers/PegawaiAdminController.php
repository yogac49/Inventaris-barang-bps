<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiAdminController extends Controller
{
    public function index(){
        return view('pegawai.index');
    }
}
