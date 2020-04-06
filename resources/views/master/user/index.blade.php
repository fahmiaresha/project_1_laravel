@extends('master/customer/template')

@section('title','Halaman User')

@section('konten')

<div class="container" style="margin-left: 15px;">
   <div class="row">
      <div class="col-20">
  <h2 class ="mt-3">Data User</h2>
  
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-toggle="modal" 
data-target="#exampleModal3">
  Tambah Data User
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Insert User</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ url('/user/store') }}">
      {{ csrf_field() }}
  <div class="form-row">
    <div class="col">
    <label for="first_name2"><font size="4">First Name</font></label>
    <input type="text" class="form-control @error('first_name2') is-invalid @enderror"
     id="first_name2" placeholder="First name " name="first_name2" value="{{ old('first_name2') }}">
     @error('first_name2')
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
    <label for="email"><font size="4">Email</font></label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" 
    id="email" placeholder="email@example.com" name="email" value="{{ old('email') }}">
    @error('email')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
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
    <label for="password"><font size="4">Password</font></label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" 
    id="password" placeholder=" Password " name="password" value="{{ old('password') }}">
    @error('password')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
  
  <div class="form-group">
    <label for="job_status"><font size="4">Job Status</font></label>
    <input type="text" class="form-control @error('job_status') is-invalid @enderror" 
    id="job_status" placeholder=" Job " name="job_status" value="{{ old('job_status') }}">
    @error('job_status')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
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
    <font size="2">
      
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
      <th scope="col">Job Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($user as $us )
    <tr>
      <th scope="row"> {{ $loop->iteration }}</th>
      <td>{{ $us->user_id}}</td>
      <td>{{ $us->first_name2 }}</td>
      <td>{{ $us->last_name }}</td>
      <td>{{ $us->email }}</td>
      <td>{{ $us->phone }}</td>
      <td >{{ $us->password }}</td>
      <td>{{ $us->job_status }}</td>
      <td>
        
       
        <!-- <a href="/user/edit/{{ $us->user_id }}" 
           class="badge badge-success"><svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit</a> -->

<!-- Button trigger modal -->
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $us->user_id }}">
<svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editModal{{ $us->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form method="post" action="{{ url('/user/update') }}">
      {{ csrf_field() }}


      
      <input type="hidden" name="id" value="{{ $us->user_id }}">

      <div class="form-row">
    <div class="col">
    <label for="first_name2"><font size="4">First Name</font></label>
    <input type="text" class="form-control @error('first_name2') is-invalid @enderror"
     id="first_name2" placeholder="First name " name="first_name2"
     value="{{ $us->first_name2 }}" required>
     @error('first_name2')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

    <div class="col">
    <label for="last_name"><font size="4">Last Name</font></label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
     id="last_name" placeholder="Last name" name="last_name" 
     value="{{ $us->last_name }}" required>
     @error('last_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror  
    </div>
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
    <label for="job_status"><font size="4">Job Status</font></label>
    <input type="text" class="form-control @error('job_status') is-invalid @enderror" 
    id="job_status" placeholder="job_status" name="job_status" 
    value="{{ $us->job_status }}" required>
    @error('job_status')
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
data-target="#deleteModal{{$us -> user_id}}"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg>Delete</button>
        
<!-- Modal -->
<div class="modal fade" id="deleteModal{{$us -> user_id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        
       
       <a href="{{ url('/user/destroy/'.$us->user_id) }}">
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
     window.onload=(function(){
      $('.mydatatable').DataTable();
      
     });
</script> 
@endsection