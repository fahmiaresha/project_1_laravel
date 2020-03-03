@extends('master/customer/template')

@section('title','Halaman Edit Kategori')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-10">
  <h2 class ="mt-3"><font size="6">Form Edit Data Kategori</font></h2>
      <form method="post" action="/kategori/update/{{ $kategori->category_id }}">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

  <div class="form-group">
    <label for="category_name"><font size="4">Category Name</font></label>
    <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
    id="category_name" name="category_name" 
     value="{{ $kategori->category_name }}" required>
    @error('category_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

   <button type="submit" class="btn btn-primary">Simpan Data!</button>
</form>
      </div>
   </div>
  </div>
@endsection 