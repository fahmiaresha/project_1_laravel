@extends('master/customer/template')

@section('title','Halaman Customer')
@section('head')
<style>
    .post1
    :hover{
      cursor: pointer;
    }
</style>
@endsection
@section('konten')
@if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('admin'))
<div class="container">
   <div class="row">
      <div class="col-12">
     
  <h2 class ="mt-3  animate__animated animate__backInLeft" style=" animation-duration: 3s; ">Data Customer</h2>
  
  @if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('admin'))
   <!-- Button trigger modal -->
<button type="button" class="btn btn-success my-2 animate__animated animate__fadeInUp " style=" animation-duration: 3s; " data-toggle="modal" data-target="#exampleModal2">
<i class="fas fa-plus-circle"></i> Tambah Data Customer
</button>
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Insert Data Customer</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form method="post" action="{{ url('/customer/store') }}">
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
    id="street" placeholder=" Jalan " name="street" value="{{ old('street') }}">
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
          <option disabled selected>Pilih Negara</option>
          <option>Indonesia</option>
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
        </div>

      <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div> 

@if (session('status'))
    <font size="4"> 
      <script>
      Swal.fire(
          'Data Berhasil Di Tambahkan!',
          '',
          'success'
        )
    </script>
    </font>
    @endif
   
    @if (session('status2'))
    <font size="4"> 
    <script>
      Swal.fire(
        'Data Berhasil Di Update!',
          '',
          'success'
        )
    </script>
    </font>
    @endif

    @if (session('status3'))
    <font size="4"> 
    <script>
      Swal.fire(
          'Data Berhasil Di Hapus!',
          '',
          'success'
        )
    </script>
    </font>
    @endif

    @if (session('status4'))
    <font size="4"> 
    <script>
      Swal.fire(
        'Status Berhasil Di Update!',
          '',
          'success'
        )
    </script>
    </font>
    @endif
  

    <font size="2">
      <table class="table table-striped table-bordered mydatatable " style="width:100%; "> </font>
    <thead class="thead-dark">
    <tr>
    @if(\Session::has('super_admin') || \Session::has('owner'))
    <th scope="col">Status</th>
    @endif

   
      <th scope="col" style="text-align:center"  >ID</th>
      <th scope="col" style="text-align:center"  >First Name</th>
      <th scope="col" style="text-align:center"  >Last Name</th>
      <th scope="col" style="text-align:center"  >Phone</th>
      <th scope="col" style="text-align:center"  >Email</th>
      <th scope="col" style="text-align:center"  >Street</th>
      <th scope="col" style="text-align:center"  >City</th>
      <th scope="col" style="text-align:center"  >State</th>
      <th scope="col" style="text-align:center"  >Zip Code</th>
    
      @if(\Session::has('super_admin') || \Session::has('owner'))
      <th width="5%" scope="col">Action</th>
      @endif
    </tr>
  </thead>

  <tbody>
  @foreach($customer as $cus )
    <tr>
      <!-- <th scope="row"> -->
      @if(\Session::has('super_admin') || \Session::has('owner'))
      <td>
      <form class="post1" method="post" action="{{ url('/customer/update/switch') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $cus->customer_Id }}">
        @if($cus->status == 1)
          <div class="custom-control custom-switch">
          <input type="checkbox" checked class="custom-control-input" id="switch{{ $cus->customer_Id }}">
          <label class="custom-control-label" for="switch{{ $cus->customer_Id }}"></label>
          </div>
          <span class="badge badge-success"><font size="2">Active</font></span>
      @else
          <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="switch{{ $cus->customer_Id }}">
          <label class="custom-control-label" for="switch{{ $cus->customer_Id }}"></label>
          </div>
          <span class="badge badge-danger"><font size="2">Non-Active</font></span>
      @endif 
      </form>
      
       </td>
       @endif
      <!-- </th> -->
     
      <td  style="text-align:center">{{ $cus->customer_Id }}</td>
      <td style="text-align:center" > {{ $cus->first_name }}</td>
      <td style="text-align:center">{{ $cus->last_name }}</td>
      <td style="text-align:center">{{ $cus->phone }}</td>
      <td style="text-align:center">{{ $cus->email }}</td>
      <td style="text-align:center">{{ $cus->street }}</td>
      <td style="text-align:center">{{ $cus->city }}</td>
      <td style="text-align:center">{{ $cus->state }}</td>
      <td style="text-align:center">{{ $cus->zip_code }}</td>
    
      @if(\Session::has('super_admin') || \Session::has('owner'))
      <td>
<!-- Button trigger modal -->
@if($cus->status == 1)
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $cus->customer_Id }}">
<svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button>

@else
<button id="modal{{ $cus->customer_Id }}" onclick="tampil_modal(id)" type="button" class="badge badge-success" data-toggle="modal" data-target="#e">
<svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button>
@endif 

<!-- Modal -->
<div class="modal fade" id="editModal{{ $cus->customer_Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ url('/customer/update') }}">
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

  <div class="form-group mt-3">
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
  
      </div>
      

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Update</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>

      </div>
      </form>
    </div>
  </div>
</div>
          
<!-- Button trigger modal -->
<button type="button" class="badge badge-danger" data-toggle="modal" 
data-target="#exampleModal{{$cus -> customer_Id}}"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg>Delete</button>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$cus -> customer_Id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin Ingin Menghapus Data ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">
        <a href="{{ url('/customer/destroy/'.$cus->customer_Id) }}">
        <font size="2" color="white">Yes</font></a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><font size="2">No</font></button>
      </div>
    </div>
  </div>
</div> 
      </td>
    @endif
    </tr>
  @endforeach
  </tbody>
</table>
  
<div class="container">
      <div class="text-center text-muted"><font size="4">Copyright © 2020 - M.  Fahmi Aresha</font></div>
    </div>
      

      </div>
   </div>
  </div>
  @endif
@endsection


@section('tambahscript')
<script>
     $('.mydatatable').DataTable();

     console.log('x : ')
    const x = document.getElementsByClassName('post1');
    for(let i=0;i<x.length;i++){
    x[i].addEventListener('click',function(){
        x[i].submit();
    });
    }

    function tampil_modal(id){
      const y = document.getElementById(id);
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Status Data Tidak Aktif',
        })
    }
</script>
 @endsection 