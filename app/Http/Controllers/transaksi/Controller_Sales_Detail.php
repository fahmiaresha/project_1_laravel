<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Controller_Sales_Detail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
        $categories = DB::table('categories')->get();
        $product = DB::table('product')->get();
        $customer = DB::table('customer')->get();
        $user= DB::table('user')->get();
        $sales= DB::table('sales')->get();
        //dump($categories);
        
        return view('transaksi/sales_detail/create',['categories'=>$categories,
        'product'=>$product,'customer'=>$customer,'user'=>$user,'sales'=>$sales]);

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'user_id' => 'required' ,
            'nota_date' => 'required' ,
            'total_payment' => 'required|numeric'
          ]);

          DB::table('sales')->insert([
            'customer_id' => $request->customer_id ,
            'user_id' => $request->user_id ,
            'nota_date' => $request->nota_date ,
            'total_payment' => $request->total_payment 
        ]);          

            foreach($request['product_id'] as $pr){
                DB::table('sales_detail')->insert([
                    'nota_id' => $request->nota_id ,
                    'product_id' => $pr ,
                    'quantity' => $request['jumlah'][$pr] ,
                    'selling_price' => $request['selling_price'][$pr] ,
                    'discount' => $request['discount'][$pr] ,
                    'total_price' => $request['total'][$pr]
                ]);     
            }
            return redirect('/sales_detail/create')->with('insert','data berhasil di tambah');
    }

    public function index(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda Belum Login !');
        }
        else{
            // $sales_detail=DB::table('sales_detail')->get();
            $sales_detail= DB::table('sales_detail')
                    ->join('product','sales_detail.product_id','=','product.product_id')->get();
                    // ->join('categories','product.product_id','=','categories.category_id')
                    // ->get();
            return view('transaksi/sales_detail/index',['sales_detail'=>$sales_detail]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
