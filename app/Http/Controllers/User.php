<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('template/login')->with('alert','Kamu harus login dulu');
        }
        else{
            // return view('user');
            return view('template/dashboard');
        }
    }

    public function login(){
        return view('template/login');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelUser::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/dashboard');
            }
            else{
                return redirect('/login')->with('alert','Password Anda , Salah !');
            }
        }
        else{
            return redirect('/login')->with('alert','Anda Belum Terdaftar , Silahkan Create Acoount !');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('template/login')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('template/register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'repeat_password' => 'required|same:password',
            'Terms_Of_Service' => 'checked'
        ]);

        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('/login')->with('alert-success','Kamu berhasil Register');
    }
}
