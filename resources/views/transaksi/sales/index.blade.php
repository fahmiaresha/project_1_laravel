@extends('master/customer/template')

@section('title','Halaman Sales')

@section('konten')

<div class="container" style="margin-left: 15px;">
   <div class="row">
      <div class="col-20">
  <h2 class ="mt-3">Data Sales</h2>
  
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-toggle="modal" 
data-target="#exampleModal3">
  Tambah Data Sales
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Insert sales</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ url('/sales/store') }}">
      {{ csrf_field() }}

  <!-- <div class="form-group">
    <label for="customer_id"><font size="4">Customer Id</font></label>
    <input type="text" class="form-control @error('customer_id') is-invalid @enderror" 
    id="customer_id" placeholder="customer_id@example.com" name="customer_id" value="{{ old('customer_id') }}">
    @error('customer_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <!-- <div class="form-group">
    <label for="user_id"><font size="4">User Id</font></label>
    <input type="text" class="form-control @error('user_id') is-invalid @enderror" 
    id="user_id" placeholder="08xxxxxxxx
     " name="user_id" value="{{ old('user_id') }}">
    @error('user_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <div class="form-group ">
    <label for="customer_id"><font size="4">Customer Name</font></label>
    <select class="form-control" id="customer_id" name="customer_id">
    <option disabled selected="">Pilih Customer</option>
      @foreach($customer as $cus)
      <option value="{{$cus -> customer_Id}}">{{$cus->first_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group ">
    <label for="user_id"><font size="4">User Name</font></label>
    <select class="form-control" id="user_id" name="user_id">
    <option disabled selected="">Pilih User</option>
      @foreach($user as $us)
      <option value="{{$us->user_id}}">{{$us->first_name2}}</option>
      @endforeach
    </select>
  </div>

 

  

  <div class="form-group">
    <label for="nota_date"><font size="4">Date</font></label>
    <input type="text" class="form-control @error('nota_date') is-invalid @enderror" 
    id="nota_date" placeholder=" nota_date " name="nota_date" value="<?php echo date("Y-m-d")?>"readonly>
    @error('nota_date')
  <div class="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
  
  <div class="form-group">
    <label for="total_payment"><font size="4">Total Payment</font></label>
    <input type="numeric" class="form-control @error('total_payment') is-invalid @enderror" 
    id="total_payment" placeholder="Total" name="total_payment" value="{{ old('total_payment') }}">
    @error('total_payment')
  <div class="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
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
    <font size="2">
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Nota Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Date</th>
      <th scope="col">Total Payment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($sales as $sl )
    <tr>
      <th scope="row"> {{ $loop->iteration }}</th>
      <td>{{ $sl->nota_id}}</td>
      <td>{{ $sl->first_name }}</td>
      <td>{{ $sl->first_name2}}</td>
      <td>{{ $sl->nota_date }}</td>
      <td>{{ $sl->total_payment }}</td>
      <td>
        
        <!-- <a href="/user/edit/{{ $us->user_id }}" 
           class="badge badge-success"><svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit</a> -->

<!-- Button trigger modal -->
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $sl->nota_id }}">
<svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editModal{{ $sl->nota_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form method="post" action="{{ url('/sales/update') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $sl->nota_id }}">
  
  <!-- <div class="form-group">
    <label for="customer_id"><font size="4">Nama Customer</font></label>
    <input type="customer_id" class="form-control @error('customer_id') is-invalid @enderror" 
    id="customer_id" placeholder="customer_id" name="customer_id" 
    value="{{ $sl->customer_id }}" required>
    @error('customer_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="user_id"><font size="4">Nama user</font></label>
    <input type="text" class="form-control @error('user_id') is-invalid @enderror" 
    id="user_id" placeholder="user_id" name="user_id" 
    value="{{ $sl->user_id }}" required>
    @error('user_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <div class="form-group ">
    <label for="customer_id"><font size="4">Customer Name</font></label>
    <select class="form-control" id="customer_id" name="customer_id">
    <option disabled selected="">Pilih Customer</option>
      @foreach($customer as $cus)
      <option value="{{$cus -> customer_Id}}">{{$cus->first_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group ">
    <label for="user_id"><font size="4">User Name</font></label>
    <select class="form-control" id="user_id" name="user_id">
    <option disabled selected="">Pilih User</option>
      @foreach($user as $us)
      <option value="{{$us->user_id}}">{{$us->first_name2}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="form-group">
    <label for="nota_date"><font size="4">Date</font></label>
    <input type="text" class="form-control @error('nota_date') is-invalid @enderror" 
    id="nota_date" placeholder="nota_date" name="nota_date" 
    value="{{ $sl->nota_date }}" readonly>
    @error('nota_date')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="total_payment"><font size="4">Total Payment</font></label>
    <input type="text" class="form-control @error('total_payment') is-invalid @enderror" 
    id="total_payment" placeholder="Total" name="total_payment" 
    value="{{ $sl->total_payment }}" >
    @error('total_payment')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
      
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Update</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
</form>
      </div>
    </div>
  </div>
</div>
          
        <!-- Button trigger modal -->
       
<button type="button" class="badge badge-danger" data-toggle="modal" 
data-target="#deleteModal{{$sl -> nota_id}}"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg>Delete</button>
        
<!-- Modal -->
<div class="modal fade" id="deleteModal{{$sl -> nota_id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ url('/sales/destroy/'.$sl->nota_id) }}">
        <font size="2" color="white">Yes</font></a></button>
        <button type="button" class="badge badge-danger" data-dismiss="modal"><font size="2">No</font></button>
      </div>
    </div>
  </div>
</div> 
      </td>
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
@endsection

@section('tambahscript')
<script>
     $('.mydatatable').DataTable();
</script> >
@endsection