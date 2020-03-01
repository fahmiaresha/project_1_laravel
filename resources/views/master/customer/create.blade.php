@extends('master/customer/template')

@section('title','Halaman Tambah Customer')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-5">
  <h2 class ="mt-3"><font size="6">Form Tambah Data Customer</font></h2>
      <form method="post" action="/customer/store">
      {{ csrf_field() }}
  <div class="form-row">
    <div class="col">
    <label for="first_name"><font size="4">First Name</font></label>
    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
     id="first_name" placeholder="First name " name="first_name" value="{{ old('first_name') }}">
     @error('first_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

    <div class="col">
    <label for="last_name"><font size="4">Last Name</font></label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
     id="last_name" placeholder="Last name" name="last_name" value="{{ old('last_name') }}">
     @error('last_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror  
    </div>
  </div>

  <div class="form-group">
    <label for="phone"><font size="4">Phone</font></label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
    id="phone" placeholder="08xxxxxxxx
     " name="phone" value="{{ old('phone') }}">
    @error('phone')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="email"><font size="4">Email</font></label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" 
    id="email" placeholder="email@example.com" name="email" value="{{ old('email') }}">
    @error('email')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="street"><font size="4">Street</font></label>
    <input type="text" class="form-control @error('street') is-invalid @enderror" 
    id="street" placeholder="Masukkan Jalan " name="street" value="{{ old('street') }}">
    @error('street')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>


  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="city"><font size="4">City</font></label>
      <input type="text" class="form-control @error('city') is-invalid @enderror" 
      id="city" name="city" placeholder="Kota" value="{{ old('city') }}">
      @error('city')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="state"><font size="4">State</font></label>
      <select id="state" name="state" class="form-control @error('state') is-invalid @enderror"
       placeholder="Kota" value="{{ old('state') }}">
        <option selected>Indonesia</option>
        <option>Singapore</option>
        <option>Amerika</option>
        <option>Malaysia</option>
      </select>
      @error('state')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="zip_code"><font size="4">Zip Code</font></label>
      <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code"
      placeholder="Kodepos" value="{{ old('zip_code') }}">
      @error('zip_code')
      <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
          @enderror
    </div>
   
  </div>
   <button type="submit" class="btn btn-primary">Tambah Data!</button>
</form>

      </div>
   </div>
  </div>
@endsection 