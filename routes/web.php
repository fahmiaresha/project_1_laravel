<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'ControllerTampil@tampil_home');
Route::get('/about', 'ControllerTampil@about');

/*
Route::get('/customer', 'ControllerTampil@tampil_customer');
Route::get('/customer/create', 'ControllerTampil@create');
Route::post('/customer/store', 'ControllerTampil@store');

Route::get('/customer/edit/{id}' ,'ControllerTampil@edit');
Route::post('/customer/update','ControllerTampil@update');

Route::get('/customer/hapus/{id}' ,'ControllerTampil@destroy');
*/

Route::get('/admin','Controller_Admin@coba_tampil');
Route::get('/admin/create','Controller_Admin@tampil_form');

Route::get('/customer/index','master\Controller_Customer@index');
Route::get('/customer/create','master\Controller_Customer@create');
Route::post('/customer/store','master\Controller_Customer@store');
Route::get('/customer/edit/{id}','master\Controller_Customer@edit');
Route::get('/customer/update','master\Controller_Customer@update');
Route::get('/customer/destroy/{id}','master\Controller_Customer@destroy');

Route::get('/kategori/index','master\Controller_Categorie@index');
Route::get('/kategori/create','master\Controller_Categorie@create');
Route::post('/kategori/store','master\Controller_Categorie@store');
Route::get('/kategori/edit/{id}','master\Controller_Categorie@edit');
Route::put('/kategori/update/{id}','master\Controller_Categorie@update');
Route::get('/kategori/destroy/{id}','master\Controller_Categorie@destroy');


Route::get('/user/index','master\Controller_User@index');
Route::get('/user/create','master\Controller_User@create');
Route::get('/user/edit','master\Controller_User@edit');
Route::get('/user/destroy','master\Controller_User@destroy');

Route::get('/product/index','master\Controller_Product@index');
Route::get('/product/create','master\Controller_Product@create');
Route::get('/product/edit','master\Controller_Product@edit');
Route::get('/product/destroy','master\Controller_Product@destroy');


Route::get('/sales/index','transaksi\Controller_Sales@index');
Route::get('/sales/create','transaksi\Controller_Sales@create');
Route::get('/sales/edit','transaksi\Controller_Sales@edit');
Route::get('/sales/destroy','transaksi\Controller_Sales@destroy');


Route::get('/sales_detail/index','transaksi\Controller_Sales_Detail@index');
Route::get('/sales_detail/create','transaksi\Controller_Sales_Detail@create');
Route::get('/sales_detail/edit','transaksi\Controller_Sales_Detail@edit');
Route::get('/sales_detail/destroy','transaksi\Controller_Sales_Detail@destroy');

/*
Route::get('MyView', function () {
    return view('webtest');
});
Route::get('ID/{id}', function($id){
    echo 'ID anda : '.$id;
   }); 
Route::get('viewcontroll', 'Controller_coba@index');
Route::get('tampilnama', 'Controller_coba@nama');
Route::get('matkul', 'Controller_coba@matkul');
Route::get('getname/{nama3}', 'Controller_coba@getNameFromUrl');
Route::get('formulir', 'Controller_coba@formulir');
Route::post('formulir/proses', 'Controller_coba@proses');
Route::get('home2', 'Controller_coba@home');
Route::get('tentang', 'Controller_coba@tentang');
Route::get('kontak', 'Controller_coba@kontak');
*/

Route::get('/', function () {
    return view('welcome');
});