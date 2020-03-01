<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Admin extends Controller
{
    public function tampil_admin(){
        return view('admin/admin');
    }

    public function coba_tampil(){
        return view('template/admin');
    }
}
