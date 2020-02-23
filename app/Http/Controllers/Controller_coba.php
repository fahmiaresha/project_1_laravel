<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Class Controller_coba extends Controller{

    
    public function index(){
        //return "Hi, anda membuka view ini dari Controller.";
        return view ('webtest');
    }

    public function nama(){
        $nama = "M.Fahmi Aresha";
        return view('showname', ['nama2' => $nama]);
    }

    public function matkul()
    {
        $nama = "M.Fahmi Aresha";
        $mk = ["alpro", "matdas", "pemrograman web", "jaringan komputer"];
        return view('matakuliah', ['nama'=>$nama, 'matkul'=>$mk]);
    }
   
    public function getNameFromUrl($nama)
    {
    return view('showname', ['nama' => $nama]);
    }

    public function formulir()
    {
    return view('formulir');
    }
    
     public function proses(Request $req)
    {
    $nama = $req->input('nama');
    $alamat = $req->input('alamat');
    return "Nama : ".$nama." dan Alamat :".$alamat;
    }

    public function home()
    {
    return view('home');
    }

    public function tentang()
    {
    return view('tentang');
    }

    public function kontak(){
        return view ('kontak');
    }
    
}