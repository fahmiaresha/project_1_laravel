<?php

namespace App\Http\Controllers\master;

use App\users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Controller_User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function login(){
      return view('template/login');
    }

    

    public function loginPost(Request $request){
      $email = $request->email;
      $password = $request->password;

      $data = users::where('email',$email)->first();
      if($data){ 
          // if(Hash::check($password,$data->password)){
            if($data->password == $password){
               Session::put('coba',$data->job_status);
              //  Session::put('coba1',$data->last_name);
                Session::put('login',TRUE);
                if($data->job_status == 'Super Admin'){
                  Session::put('super_admin',TRUE);
                 
                }
                if( $data->job_status =='Owner'){
                 Session::put('owner',TRUE);
                   
                }
                if($data->job_status == 'Admin' ){
                  Session::put('admin',TRUE);
                }
                if($data->job_status == 'Kasir' ){
                  Session::put('kasir',TRUE);
                }
              return redirect('/dashboard');
          }
          else{
              return redirect('/login')->with('salah_password','Password Anda , Salah !');
          }
      }
      else{
          return redirect('/login')->with('tidak_terdaftar','Anda Belum Terdaftar , Silahkan Create Acoount !');
      }
   }

   public function logout(){
    Session::flush();
    return redirect('template/login')->with('logout','Kamu sudah logout');
}

public function register(Request $request){
  if(!Session::get('login')){
    return redirect('/login')->with('alert','Anda Belum Login !');
   }
   else{
    return view('template/register');
   }
  }

public function registerPost(Request $request){
    $this->validate($request, [
        'first_name2' => 'required|min:4',
        'email' => 'required|min:4|email|unique:users',
        'password' => 'required',
        'repeat_password' => 'required|same:password',
        'job_status' => 'required'
    ]);

    $data =  new users();
    $data->first_name2 = $request->first_name2;
    $data->last_name = $request->last_name;
    $data->email = $request->email;
    $data->phone = '089612312';
    $data->job_status =  $request->job_status;
    $data->password = $request->password;
    $data->save();
    return redirect('/login')->with('register','Kamu berhasil Register');
}

    public function index()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
        $us=users::all();
        // $us=DB::table('user');
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


          users::create([
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

    public function store_about(Request $request)
    {
            DB::table('about')->insert(['first_name' => $request->first_name,
            'last_name' => $request->last_name,'phone_number' => $request->phone_number,'email' => $request->email,
            'message' => $request->message
            ]);
          return redirect('/about')->with('berhasil','Data Berhasil Di
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
            'job_status' => 'required',
            // 'password' => 'required'
          ]);
          
        //edit
        // DB::table('user')->where('user_id',$request->id)->update([
        //     'first_name2' => $request->first_name2,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'password' => $request->password,
        //     'job_status' => $request->job_status,
        // ]);

          $users=users::find($request->id); 
          $users->first_name2 = $request->first_name2; 
          $users->last_name = $request->last_name; 
          $users->email = $request->email; 
          $users->phone = $request->phone; 
        //   $users->password = $request->password; 
          $users->job_status = $request->job_status; 
          $users->save();          

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
        // DB::table('user')->where('user_id',$id)->delete();
        $users = users::find($id);
        $users->delete();
        //mengalihkan halaman
        return redirect('/user/index')->with('status3','Data Berhasil Di
        Hapus');

     }
}
