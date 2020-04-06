<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\categorie;
use App\produk;
use Illuminate\Support\Facades\Session;

class Controller_Product extends Controller
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
        // $product = DB::table('product')->get();
        $product = produk::all();
        $categories= DB::table('categories')->where('status','=',1)->get();
        $product2= DB::table('product')
                    ->join('categories','product.category_id','=','categories.category_id')
                    ->get();
        return view 
        ('master/product/index',['product' =>$product2],['categories'=>$categories]);
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
           
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_stok' => 'required',
            'explanation' => 'required',
          ]);
         
        produk::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_stok' => $request->product_stok,
            'explanation' => $request->explanation,
        ]);

        //mengalihkan halaman
        return redirect('product/index')->with('status','Data Berhasil Di
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
        $product= DB::table('product')->where('product_id',$id)->get();
        // dump($customer);
        //mengirim data yang telah di ambil ke view
         return view('master/product/edit',['product' => $product]);
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
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_stok' => 'required',
            'explanation' => 'required'
          ]);
          $produk=produk::find($request->id); 
          $produk->category_id = $request->category_id; 
          $produk->product_name = $request->product_name;
          $produk->product_price = $request->product_price;  
          $produk->product_stok = $request->product_stok; 
          $produk->explanation = $request->explanation; 
          $produk->save(); 

        //edit
        // DB::table('product')->where('product_id',$request->id)->update([
        //     'category_id' => $request->category_id,
        //     'product_name' => $request->product_name,
        //     'product_price' => $request->product_price,
        //     'product_stok' => $request->product_stok,
        //     'explanation' => $request->explanation
        // ]);

        //redirect
        return redirect('/product/index')->with('status2','Data Berhasil Di
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
        // DB::table('product')->where('product_id',$id)->delete();
        $produk= produk::find($id);
        $produk->delete();
        
        //mengalihkan halaman
        return redirect('/product/index')->with('status3','Data Berhasil Di
        Hapus');
    }
}
