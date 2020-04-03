<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerTampil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function tampil_dashboard(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
         return view('template/dashboard');
        }
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
        return view('javascript/index');
     }
     public function tampil_javascript2(){
      return view('javascript/index2');
   }




    //  public function tampil_kontak(){
    //         return view('template/kontak');
    //  }


    // public function tampil_mahasiswa(){
    // $users = DB::table('users')->get();
    // $mahasiswa = DB::table('murid')->get();
    //dump($mahasiswa);
    //return view ('penjualan/home', ['mahasiswa' => $mahasiswa]);
    //}

    // public function tampil_home(){
    //     return view('penjualan/home');
    // }

    // public function tampil_customer(){
    //     $customer = DB::table('customer')->get();
       
    //    //dump($customer);
    //     return view ('penjualan/customer',['customer' =>$customer]);

    // }
    //  public function about(){
    //      return view('penjualan/about');
    //  }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //    return view ('penjualan/create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // { 
    //     //insert
    //       $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'phone' => 'required|numeric',
    //         'email' => 'required|email',
    //         'street' => 'required',
    //         'city' => 'required',
    //         'state' => 'required',
    //         'zip_code' => 'required|numeric'
    //       ]);

    //     DB::table('customer')->insert([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'street' => $request->street,
    //         'city' => $request->city,
    //         'state' => $request->state,
    //         'zip_code' => $request->zip_code
    //     ]);

    //     //mengalihkan halaman
    //     return redirect('/customer')->with('status','Data Berhasil Di
    //      Tambahkan');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //mengambil id
    //     $customer= DB::table('customer')->where('customer_Id',$id)->get();
    //    // dump($customer);
    //     //mengirim data yang telah di ambil ke view
    //     return view('penjualan/edit',['customer' => $customer]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'phone' => 'required|numeric',
    //         'email' => 'required|email',
    //         'street' => 'required',
    //         'city' => 'required',
    //         'state' => 'required',
    //         'zip_code' => 'required|numeric'
    //       ]);
          
    //     //edit
    //     DB::table('customer')->where('customer_Id',$request->id)->update([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'street' => $request->street,
    //         'city' => $request->city,
    //         'state' => $request->state,
    //         'zip_code' => $request->zip_code
    //     ]);

    //     //redirect
    //     return redirect('/customer')->with('status2','Data Berhasil Di
    //     Edit');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     DB::table('customer')->where('customer_Id',$id)->delete();

    //     //mengalihkan halaman
    //     return redirect('/customer')->with('status3','Data Berhasil Di
    //     Hapus');
    // }

    // public function tes_script(){
    //         return view('template/create');
    // }
}
