@extends('master/customer/template')

@section('title','Halaman Tambah Kategori')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-10">
  <h2 class ="mt-3"><font size="6">Form Tambah Data Kategori</font></h2>
      <form method="post" action="/kategori/store">
      {{ csrf_field() }}
  

  <div class="form-group">
    <label for="category_name"><font size="4">Category Name</font></label>
    <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
    id="category_name" placeholder="Masukkan Nama Kategori " name="category_name" >
    @error('category_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

   <button type="submit" class="btn btn-primary">Tambah Data!</button>
</form>

      </div>
   </div>
  </div>
@endsection 