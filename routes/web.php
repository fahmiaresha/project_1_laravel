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

Route::get('/customer', 'ControllerTampil@tampil_customer');
Route::get('/customer/create', 'ControllerTampil@create');
Route::post('/customer/store', 'ControllerTampil@store');

Route::get('/customer/edit/{id}' ,'ControllerTampil@edit');
Route::post('/customer/update','ControllerTampil@update');

Route::get('/customer/hapus/{id}' ,'ControllerTampil@destroy');


Route::get('/admin','Controller_Admin@tampil_admin');
Route::get('/admin/create','Controller_Admin@tampil_form');
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