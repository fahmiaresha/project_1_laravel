@extends('master/customer/template')

@section('title','Form Edit User')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-4">
  <h2 class ="mt-3"><font size="6">Form Edit Data user</font></h2>
  @foreach($user as $us)
      <form method="post" action="/user/update">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $us->user_id }}">

  <div class="form-group">
    <label for="user_id"><font size="4">user_id</font></label>
    <input type="text" class="form-control @error('user_id') is-invalid @enderror" 
    id="user_id" placeholder="user_id " name="user_id" value="{{ $us->user_id }}"  required>
    @error('user_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="first_name"><font size="4">First_Name</font></label>
    <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
    id="first_name" placeholder="first_name" name="first_name" 
    value="{{ $us->first_name }}" required>
    @error('first_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="last_name"><font size="4">Last_Name</font></label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
    id="last_name" placeholder="last_name" name="last_name" 
    value="{{ $us->last_name}}" required>
    @error('last_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="email"><font size="4">Email</font></label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" 
    id="email" placeholder="email" name="email" 
    value="{{ $us->email }}" required>
    @error('email')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="phone"><font size="4">Phone</font></label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
    id="phone" placeholder="phone" name="phone" 
    value="{{ $us->phone }}" required>
    @error('phone')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
 
  <div class="form-group">
    <label for="password"><font size="4">Password</font></label>
    <input type="text" class="form-control @error('password') is-invalid @enderror" 
    id="password" placeholder="password" name="password" 
    value="{{ $us->password }}" required>
    @error('password')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="job_status"><font size="4">job_status</font></label>
    <input type="text" class="form-control @error('job_status') is-invalid @enderror" 
    id="job_status" placeholder="job_status" name="job_status" 
    value="{{ $us->job_status }}" required>
    @error('job_status')
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