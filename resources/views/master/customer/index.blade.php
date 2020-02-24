@extends('master/customer/template')

@section('title','Halaman Customer')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-12">
  <h2 class ="mt-3">Daftar Customer</h2>
    <a href="/customer/create" class="btn btn-primary my-3">Tambah Data Customer</a> 

    @if (session('status'))
    <font size="4"> 
      <div class="alert alert-success">
          {{ session ('status') }} 
      </div>
    </font>
    @endif

    @if (session('status2'))
    <font size="4">  
      <div class="alert alert-success">
      {{ session ('status2') }}
      </div>
    </font>
    @endif

    @if (session('status3'))
    <font size="4">  
      <div class="alert alert-success">
      {{ session ('status3') }}
      </div> 
    </font>
    @endif
    <font size="2"><table class="table table-striped table-bordered mydatatable" 
    height= width="0%"> </font>
    <thead class="thead-dark">
    <tr>
      <th scope="col">Customer_id</th>
      <th scope="col">First_name</th>
      <th scope="col">Last_name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Street</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Zip_code</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
  @foreach($customer as $cus )
    <tr>
      <th scope="row"> {{ $loop->iteration }}</th>
      <td>{{ $cus->first_name }}</td>
      <td>{{ $cus->last_name }}</td>
      <td>{{ $cus->phone }}</td>
      <td>{{ $cus->email }}</td>
      <td>{{ $cus->street }}</td>
      <td>{{ $cus->city }}</td>
      <td>{{ $cus->state }}</td>
      <td>{{ $cus->zip_code }}</td>
      <td>
        <form>
       
        <a href="/customer/edit/{{ $cus->customer_Id }}" 
           class="badge badge-success"><svg class="bi bi-check-box" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M17.354 4.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L10 11.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M3.5 15A1.5 1.5 0 005 16.5h10a1.5 1.5 0 001.5-1.5v-5a.5.5 0 00-1 0v5a.5.5 0 01-.5.5H5a.5.5 0 01-.5-.5V5a.5.5 0 01.5-.5h8a.5.5 0 000-1H5A1.5 1.5 0 003.5 5v10z" clip-rule="evenodd"></path>
</svg>Edit</a>
          
<a href="/customer/destroy/{{ $cus->customer_Id }}">
        <font color="red">Yes</font></a></button>
        <!-- Button trigger modal -->
       
<button type="button" class="badge badge-danger" data-toggle="modal" 
data-target="#exampleModal"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg>Delete</button>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="badge badge-success">
        <a href="/customer/destroy/{{ $cus->customer_Id }}">
        <font color="white">Yes</font></a></button>
        <button type="button" class="badge badge-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
  



      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  

      </div>
   </div>
  </div>
@endsection 