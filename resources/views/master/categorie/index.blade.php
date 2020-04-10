@extends('master/customer/template')

@section('title','Halaman Kategori Produk')
@section('head')
<style>
    .post0
    :hover{
      cursor: pointer;
    }
</style>
@endsection

@section('konten')
@if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('admin'))
<div class="container">
   <div class="row">
      <div class="col-6">
  <h2 class ="mt-3">Data Kategori</h2>
  @if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('admin'))
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Kategori
</button>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Insert Data Categorie</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
      <form method="post" action="{{ url('/kategori/store') }}"> 
      {{ csrf_field() }}
    <div class="form-group">
    <label for="category_name"><font size="4">Category Name</font></label>
    <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
    id="category_name" placeholder="Category Name " name="category_name">
    @error('category_name')
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

    <font size="2"><table class="table table-striped table-bordered mydatatable"></font>
    <thead class="thead-dark">
    <tr>
      @if(\Session::has('super_admin') || \Session::has('owner'))
      <th width="2%" scope="col" style="text-align:center">Status</th>
      @endif
      <th scope="col" style="text-align:center">ID</th>
      <th scope="col" style="text-align:center">Category Name</th>
      @if(\Session::has('super_admin') || \Session::has('owner'))
      <th scope="col" style="text-align:center">Action</th>
      @endif
    </tr>
  </thead>

  <tbody>
  @foreach($kategori as $kt )
    <tr>
      <!-- <th scope="row"> -->
      @if(\Session::has('super_admin') || \Session::has('owner'))
        <td>
          @php $x=0; @endphp
            @foreach($product as $p)
                @if($kt->category_id == $p->category_id)
                    @php $x=1; @endphp
                @endif
            @endforeach
   @if($x==0)
        <form class="post0" method="post" action="{{ url('/kategori/update/switch') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $kt->category_id }}">
          @if($kt->status == 1)
          <div class="custom-control custom-switch">
          <input type="checkbox" checked class="custom-control-input" id="switch{{$kt->category_id}}">
          <label class="custom-control-label" for="switch{{$kt->category_id}}"></label>
          </div>
          <span class="badge badge-success"><font size="2">Active</font></span>
            
            @else
          <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="switch{{$kt->category_id}}">
          <label class="custom-control-label" for="switch{{$kt->category_id}}"></label>
          </div>
          <span class="badge badge-danger"><font size="2">Non-Active</font></span>    
      @endif 
      </form>
  @else
  <form id="tampil{{$kt->category_id}}" onclick="tampil_cat(id)"  method="post" action="#">
        @csrf
        <input  type="hidden" name="id" value="{{ $kt->category_id }}">
          @if($kt->status == 1)
          <div class="custom-control custom-switch">
          <input type="checkbox" checked  class="custom-control-input" id="switch{{$kt->category_id}}">
          <label class="custom-control-label" for="switch{{$kt->category_id1}}" ></label>
          </div>
          <span class="badge badge-success"><font size="2">Active</font></span>
             
      @endif 
      </form>
  @endif
       </td>
       @endif
      <!-- </th> -->
      <td style="text-align:center">{{ $kt->category_id }}</td>
      <td style="text-align:center">{{ $kt->category_name }}</td>
      @if(\Session::has('super_admin') || \Session::has('owner'))
      <td style="text-align:center">
       
       
        <!-- <a href="/kategori/edit/{{ $kt-> category_id }}" 
           class="badge badge-success"><svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit</a> -->



<!-- Button trigger modal -->
@if($kt->status == 1)
<button type="button" class="badge badge-success" data-toggle="modal" 
data-target="#editModal{{$kt -> category_id}}" >
<svg class="bi bi-pencil" width="23px" height="23px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button>

@else
<button id="modal{{$kt->category_id}}" onclick="tampil_modal(id)" type="button" class="badge badge-success" data-toggle="modal" 
data-target="#e" >
<svg class="bi bi-pencil" width="23px" height="23px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button>

@endif

<!-- Modal -->
<div class="modal fade" id="editModal{{$kt -> category_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal{{$kt -> category_id}}">Form Edit Data Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="{{ url('/kategori/update') }}">
      @csrf
      <input type="hidden" name="id" value="{{ $kt->category_id }}">
    <div class="form-group">
    <label for="category_name"><font size="4">Category Name</font></label>
    <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
    id="category_name" name="category_name" 
     value="{{ $kt->category_name }}" required>
    @error('category_name')
  <div class="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
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
data-target="#deleteModal{{$kt -> category_id}}"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg>Delete</button>
        
<!-- Modal -->
<div class="modal fade" id="deleteModal{{$kt -> category_id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ url('/kategori/destroy/'.$kt->category_id) }}">
        <font size="2" color="white">Yes</font></a></button>
        <button type="button" class="badge badge-danger" data-dismiss="modal"><font size="2">No</font></button>
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
$('.mydatatable').dataTable( {
} );
    
    
const x = document.getElementsByClassName('post0');
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

    function tampil_cat(id){
      const a = document.getElementById(id);
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Data Category Telah Digunakan Di Produk !',
        })
    }
    
    
       
</script>
@endsection