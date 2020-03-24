<?php

namespace App\Http\Controllers\master;

use App\users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
        $us=users::all();
       // dump($us);
        return view('master/user/index' , ['user' => $us]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ini halaman create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name2' => 'required' ,
            'last_name' => 'required' ,
            'email' => 'required|email' ,
            'phone' => 'required|numeric' ,
            'password' => 'required' ,
            'job_status' => 'required' 
          ]);

          DB::table('user')->insert([
            'first_name2' => $request->first_name2 ,
            'last_name' => $request->last_name ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'password' => $request->password ,
            'job_status' => $request->job_status 
        ]);          

          return redirect('/user/index')->with('status','Data Berhasil Di
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
        $user= DB::table('user')->where('user_id',$id)->get();
        // dump($user);
        //mengirim data yang telah di ambil ke view
         return view('master/user/edit',['user' => $user]);
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
            'first_name2' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'required',
            'job_status' => 'required'
          ]);
          
        //edit
        DB::table('user')->where('user_id',$request->id)->update([
            'first_name2' => $request->first_name2,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'job_status' => $request->job_status,
        ]);

        //redirect
        return redirect('/user/index')->with('status2','Data Berhasil Di
        Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $kategori= users::find($id)->delete();
    //     return redirect('/user/index')->with('status3','Data Berhasil Di
    //     delete');
    // }

    public function destroy($id)
    { 
        DB::table('user')->where('user_id',$id)->delete();
        //mengalihkan halaman
        return redirect('/user/index')->with('status2','Data Berhasil Di
        Hapus');

     }
}
