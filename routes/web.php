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


/*
Route::get('/customer', 'ControllerTampil@tampil_customer');
Route::get('/customer/create', 'ControllerTampil@create');
Route::post('/customer/store', 'ControllerTampil@store');

Route::get('/customer/edit/{id}' ,'ControllerTampil@edit');
Route::post('/customer/update','ControllerTampil@update');

Route::get('/customer/hapus/{id}' ,'ControllerTampil@destroy');
*/
Route::get('/', function () {
    return view('template/login');
});

Route::get('/javascript1','ControllerTampil@tampil_javascript1');
Route::get('/javascript2','ControllerTampil@tampil_javascript2');
Route::get('/javascript3','ControllerTampil@tampil_javascript3');


Route::get('/admin','Controller_Admin@coba_tampil');
Route::get('/admin/create','Controller_Admin@tampil_form');

// Route::get('/login', 'User@login');
// Route::post('/loginPost', 'User@loginPost');
// Route::get('/register', 'User@register');
// Route::post('/registerPost', 'User@registerPost');

Route::get('/login', 'master\Controller_User@login');
Route::post('/loginPost', 'master\Controller_User@loginPost');
Route::get('/register', 'master\Controller_User@register');
Route::post('/registerPost', 'master\Controller_User@registerPost');


// Route::get('/logout', 'User@logout');

// Route::get('/kontak', 'ControllerTampil@tampil_kontak');
Route::get('/dashboard', 'ControllerTampil@tampil_dashboard');
Route::get('/rating', 'ControllerTampil@tampil_rating');
Route::get('/about', 'ControllerTampil@tampil_about');

Route::get('/logout','master\Controller_Customer@logout');
Route::get('/customer/index','master\Controller_Customer@index');
Route::post('/customer/store','master\Controller_Customer@store');
Route::post('/customer/update','master\Controller_Customer@update');
Route::get('/customer/destroy/{id}','master\Controller_Customer@destroy');
Route::post('/customer/update/switch','master\Controller_Customer@update_switch');



Route::get('/kategori/index','master\Controller_Categorie@index');
Route::get('/kategori/create','master\Controller_Categorie@create');
Route::post('/kategori/store','master\Controller_Categorie@store');
Route::get('/kategori/edit/{id}','master\Controller_Categorie@edit');
Route::post('/kategori/update','master\Controller_Categorie@update');
//Route::put('/kategori/update/{id}','master\Controller_Categorie@update');
Route::get('/kategori/destroy/{id}','master\Controller_Categorie@destroy');
Route::post('/kategori/update/switch','master\Controller_Categorie@update_switch');



Route::get('/user/index','master\Controller_User@index');
Route::get('/user/create','master\Controller_User@create');
Route::post('/user/store','master\Controller_User@store');
Route::get('/user/edit/{id}','master\Controller_User@edit');
Route::post('/user/update','master\Controller_User@update');
Route::get('/user/destroy/{id}','master\Controller_User@destroy');

Route::get('/product/index','master\Controller_Product@index');
Route::get('/product/create','master\Controller_Product@create');
Route::post('/product/store','master\Controller_Product@store');
Route::get('/product/edit/{id}','master\Controller_Product@edit');
Route::post('/product/update','master\Controller_Product@update');
Route::get('/product/destroy/{id}','master\Controller_Product@destroy');


Route::get('/sales/index','transaksi\Controller_Sales@index');
Route::post('/sales/store','transaksi\Controller_Sales@store');
Route::get('/sales/create','transaksi\Controller_Sales@create');
Route::get('/sales/edit','transaksi\Controller_Sales@edit');
Route::post('/sales/update','transaksi\Controller_Sales@update');
Route::get('/sales/destroy/{id}','transaksi\Controller_Sales@destroy');

Route::post('/pos/store','transaksi\Controller_Sales_Detail@store');

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

