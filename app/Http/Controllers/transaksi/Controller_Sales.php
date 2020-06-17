<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Console\ViewClearCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class Controller_Sales extends Controller
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
        $sales = DB::table('sales') 
                ->join('customer','sales.customer_id','=','customer.customer_Id')
                ->join('user','sales.user_id','=','user.user_id')
               
                ->select('sales.*','customer.first_name','user.first_name2','customer.customer_Id',
                'user.user_id')
                ->get();
        $sales_detail= DB::table('sales_detail')
                ->join('product','sales_detail.product_id','=','product.product_id')
                 ->join('sales','sales_detail.nota_id','=','sales.nota_id')
                 ->get();
        $customer = DB::table('customer')->get();
        $user = DB::table('user')->get();
        //dump($sales);
        return view('transaksi/sales/index',['sales'=>$sales,
        'customer'=>$customer,'user'=>$user,'sales_detail'=>$sales_detail]);
        }
    }

    public function invoice($id){
        $customer = DB::table('customer')->get();
        $sales = DB::table('sales')->get();
        $sales_detail = DB::table('sales_detail')->get();
        $product = DB::table('product')->get();
        $nota = DB::table('sales')->where('nota_id',$id)->get();
        $invoice=$id;
        return view('transaksi/sales/invoice',['nota'=>$nota,'customer'=>$customer,'sales'=>$sales,'invoice'=>$invoice,
        'product'=>$product,'sales_detail'=>$sales_detail]);
    }

    public function pdf($id){
        $customer = DB::table('customer')->get();
        $sales = DB::table('sales')->get();
        $sales_detail = DB::table('sales_detail')->get();
        $product = DB::table('product')->get();
        $nota = DB::table('sales')->where('nota_id',$id)->get();
        $invoice=$id;
        return view('transaksi/sales/pdf_sales',['nota'=>$nota,'customer'=>$customer,'sales'=>$sales,'invoice'=>$invoice,
        'product'=>$product,'sales_detail'=>$sales_detail]);
        // $customPaper = array(0,0,1190.5511811,1190.5511811016);
        // $pdf=PDF::loadview('transaksi/sales/pdf_sales',['nota'=>$nota,'customer'=>$customer,'sales'=>$sales,'invoice'=>$invoice,
        // 'product'=>$product,'sales_detail'=>$sales_detail]);
        // $pdf->setPaper($customPaper);
        //  return $pdf->stream('print-invoice-pdf');
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
            'customer_id' => 'required',
            'user_id' => 'required' ,
            'total_payment' => 'required|numeric'
          ]);

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
        $request->validate([
            'customer_id' => 'required',
            'user_id' => 'required' ,
            'total_payment' => 'required|numeric'
          ]);
          
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
