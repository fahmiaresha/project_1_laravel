<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Controller_Customer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function kontak(){
    //     return view('template/kontak');
    // }

    // public function login(){
    //     return view('template/login');
    // }
    
    public function index()
    {
        $customer = DB::table('customer')->get();
        //dump($customer);
         return view ('master/customer/index',['customer' =>$customer]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view ('master/customer/create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required','last_name' => 'required','phone' => 'required|numeric',
            'email' => 'required|email','street' => 'required','city' => 'required',
            'state' => 'required','zip_code' => 'required|numeric']);
        
        DB::table('customer')->insert(['first_name' => $request->first_name,
        'last_name' => $request->last_name,'phone' => $request->phone,'email' => $request->email,
        'street' => $request->street,'city' => $request->city,'state' => $request->state,
        'zip_code' => $request->zip_code
        ]);

        //mengalihkan halaman
        return redirect('customer/index')->with('status','Data Berhasil Di
         Tambahkan');
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
       //mengambil id
    //    $customer= DB::table('customer')->where('customer_Id',$id)->get();
    //    // dump($customer);
    //    //mengirim data yang telah di ambil ke view
    //     return view('master/customer/edit',['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required','last_name' => 'required','phone' => 'required|numeric',
            'email' => 'required|email','street' => 'required','city' => 'required',
            'state' => 'required','zip_code' => 'required|numeric']);
          
        DB::table('customer')->where('customer_Id',$request->id)->update([
            'first_name' => $request->first_name,'last_name' => $request->last_name,
            'phone' => $request->phone,'email' => $request->email,
            'street' => $request->street,'city' => $request->city,
            'state' => $request->state,'zip_code' => $request->zip_code
        ]);

        //redirect
        return redirect('/customer/index')->with('status2','Data Berhasil Di
        Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        DB::table('customer')->where('customer_Id',$id)->delete();
        $nama_cus= DB::table('customer')->where('customer_Id',$id)->value('first_name');
        //mengalihkan halaman
        return redirect('/customer/index')->with('status3','Data Berhasil Di
        Hapus');
        // return redirect('/customer/index')->with('deleted',$nama_cus);
    }
}
