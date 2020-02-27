@extends('master/customer/template')

@section('title','Form Edit Customer')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-5">
  <h2 class ="mt-3"><font size="6">Form Edit Data Customer</font></h2>
  @foreach($customer as $cus)
      <form method="post" action="/customer/update">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $cus->customer_Id }}">
      <div class="form-row">
    <div class="col">
    <label for="first_name"><font size="4">First Name</font></label>
    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
     id="first_name" placeholder="First name " name="first_name"
     value="{{ $cus->first_name }}" required>
     @error('first_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

    <div class="col">
    <label for="last_name"><font size="4">Last Name</font></label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
     id="last_name" placeholder="Last name" name="last_name" 
     value="{{ $cus->last_name }}" required>
     @error('last_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror  
    </div>
  </div>

  <div class="form-group">
    <label for="phone"><font size="4">Phone</font></label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
    id="phone" placeholder="08xxxxxxxx
     " name="phone" value="{{ $cus->phone }}"  required>
    @error('phone')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="email"><font size="4">Email</font></label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" 
    id="email" placeholder="email@example.com" name="email" 
    value="{{ $cus->email }}" required>
    @error('email')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="street"><font size="4">Street</font></label>
    <input type="text" class="form-control @error('street') is-invalid @enderror" 
    id="street" placeholder="Masukkan Jalan " name="street" 
    value="{{ $cus->street }}" required>
    @error('street')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>


  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="city"><font size="4">City</font></label>
      <input type="text" class="form-control @error('city') is-invalid @enderror" 
      id="city" name="city" placeholder="Kota"
      value="{{ $cus->city }}"  required>
      @error('city')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="state"><font size="4">State</font></label>
      <select id="state" name="state" class="form-control @error('state') is-invalid @enderror"
       placeholder="Kota" value="{{ $cus->state }}"  required>
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
      <label for="zip_code"><font size="4">Zip_Code</font></label>
      <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code"
      placeholder="Kodepos"
      value="{{ $cus->zip_code }}"  required>
      @error('zip_code')
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