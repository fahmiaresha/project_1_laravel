<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;


class ControllerTampil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function tampil_pdf_customer(){
         $customer = DB::table('customer')->get();
         
         $pdf = PDF::loadview('master/customer/pdf',['customer'=>$customer]);  
         return $pdf->stream();
     }

     public function tampil_dashboard(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
         return view('template/dashboard')->with('login');
        }
     }

     public function tampil_ajax(){
      return view('javascript/ajax2');
   }

     public function tampil_login(){
        return view('template/login');
     }

     public function tampil_register(){
        return view('template/register');
     }

     public function tampil_about(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
         return view('template/about');
        }
     }

     public function tampil_javascript1(){
        return view('javascript/ajax');
     }
     public function tampil_javascript2(){
      return view('javascript/index2');
   }

   public function tampil_javascript3(){
      return view('javascript/index3');
   }

}
