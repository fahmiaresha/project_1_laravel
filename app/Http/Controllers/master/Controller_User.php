<?php

namespace App\Http\Controllers\master;

use App\users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Controller_User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $us=users::all();
       // dump($us);
        return view('master/user/index' , ['user' => $us]);
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
            'first_name' => 'required' ,
            'last_name' => 'required' ,
            'email' => 'required|email' ,
            'phone' => 'required|numeric' ,
            'password' => 'required' ,
            'job_status' => 'required' 
          ]);
            users::create([
             'first_name' => $request->first_name ,
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
    public function edit()
    {
        return 'ini halaman edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return 'ini halaman destroy';
    }
}
