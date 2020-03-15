<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Console\ViewClearCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_Sales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = DB::table('sales') 
                ->join('customer','sales.customer_id','=','customer.customer_Id')
                ->join('user','sales.user_id','=','user.user_id')
                ->select('sales.*','customer.first_name','user.first_name2')
                ->get();
        $customer = DB::table('customer')->get();
        $user = DB::table('user')->get();
        //dump($sales);
        return view('transaksi/sales/index',['sales'=>$sales]
        ,['customer'=>$customer,'user'=>$user]);
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

          DB::table('sales')->insert([
            'customer_id' => $request->customer_id ,
            'user_id' => $request->user_id ,
            'nota_date' => $request->nota_date ,
            'total_payment' => $request->total_payment 
        ]);          

          return redirect('/sales/index')->with('status','Data Berhasil Di
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
    public function update(Request $request)
    {     
        //edit
        DB::table('sales')->where('nota_id',$request->id)->update([
            'customer_id' => $request->customer_id,
            'user_id' => $request->user_id,
            'nota_date' => $request->nota_date,
            'total_payment' => $request->total_payment
        ]);

        //redirect
        return redirect('/sales/index')->with('status2','Data Berhasil Di
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
        DB::table('sales')->where('nota_id',$id)->delete();
        
        //mengalihkan halaman
        return redirect('/sales/index')->with('status3','Data Berhasil Di
        Hapus');
    }
}
