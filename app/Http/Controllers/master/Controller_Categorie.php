<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\categorie;
use Illuminate\Support\Facades\DB;

class Controller_Categorie extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= categorie::all();
        return view('master/categorie/index' , ['kategori' => $categories]);
       //return view('master/categorie/index ');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/categorie/create');
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
            'category_name' => 'required'
          ]);
            categorie::create([
             'category_name' => $request->category_name
          ]);

          return redirect('/kategori/index')->with('status','Data Berhasil Di
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
        $cat=categorie::find($id);
        return view('master/categorie/edit',['kategori' =>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update2(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
          ]);
          
        //edit
        DB::table('categories')->where('category_id',$request->id)->update([
            'category_name' => $request->category_name
        ]);

        //redirect
        return redirect('/kategori/index')->with('status2','Data Berhasil Di
        Edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
          ]);

          $kategori=categorie::find($request->id); 
          $kategori->category_name = $request->category_name;
          $kategori->save();

          return redirect('/kategori/index')->with('status2','Data Berhasil Di
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
        $kategori= categorie::find($id);
        $kategori->delete();
        return redirect('/kategori/index')->with('status3','Data Berhasil Di
        delete');
    }

    public function destroy2(categorie $id)
    {
        $id->delete(); //Fungsi untuk menghapus data sesuai dengan ID yang dipilih

        return redirect('master/kategori/index')->with('status3','Data Berhasil Di
        delete');
    }
}
