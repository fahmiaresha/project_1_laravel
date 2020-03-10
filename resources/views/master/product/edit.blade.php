@extends('master/customer/template')

@section('title','Form Edit Product')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-4">
  <h2 class ="mt-3"><font size="6">Form Edit Data Product</font></h2>
  @foreach($product as $pr)
      <form method="post" action="/product/update">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $pr->product_id }}">

  <div class="form-group">
    <label for="category_id"><font size="4">Category_Id</font></label>
    <input type="text" class="form-control @error('category_id') is-invalid @enderror" 
    id="category_id" placeholder="Category_Id " name="category_id" value="{{ $pr->category_id }}"  required>
    @error('category_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="product_name"><font size="4">Name</font></label>
    <input type="text" class="form-control @error('product_name') is-invalid @enderror" 
    id="product_name" placeholder="Product_Name" name="product_name" 
    value="{{ $pr->product_name }}" required>
    @error('product_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="product_price"><font size="4">Price</font></label>
    <input type="text" class="form-control @error('product_price') is-invalid @enderror" 
    id="product_price" placeholder="Product_Price" name="product_price" 
    value="{{ $pr->product_price }}" required>
    @error('product_price')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="product_stok"><font size="4">Stok</font></label>
    <input type="number" class="form-control @error('product_stok') is-invalid @enderror" 
    id="product_stok" placeholder="Product_Stok" name="product_stok" 
    value="{{ $pr->product_stok }}" required>
    @error('product_stok')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="explanation"><font size="4">Explanation</font></label>
    <input type="text" class="form-control @error('explanation') is-invalid @enderror" 
    id="explanation" placeholder="Explanation" name="explanation" 
    value="{{ $pr->explanation }}" required>
    @error('explanation')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
 

   <button type="submit" class="btn btn-primary"> Simpan Data!</button>
</form>
@endforeach
      </div>
   </div>
  </div>
@endsection 