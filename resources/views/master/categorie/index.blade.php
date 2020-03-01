@extends('master/customer/template')

@section('title','Halaman Kategori Produk')

@section('konten')

<div class="container">
   <div class="row">
      <div class="col-12">
  <h2 class ="mt-3">Daftar Kategori Produk</h2>
    <a href="/kategori/create" class="btn btn-primary my-3">Tambah Data Kategori Produk</a> 

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
      <th scope="col">#</th>
      <th scope="col">Category_id</th>
      <th scope="col">Category_name</th>
      <th width="100px" scope="col">Aksi</th>
    </tr>
  </thead>

  <tbody>
  @foreach($kategori as $kt )
    <tr>
      <th scope="row"> {{ $loop->iteration }}</th>
      <td>{{ $kt->category_id }}</td>
      <td>{{ $kt->category_name }}</td>
      <td>
        <form>
       
        <a href="/kategori/edit/{{ $kt-> category_id }}" 
           class="badge badge-success"><svg class="bi bi-check-box" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M17.354 4.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L10 11.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M3.5 15A1.5 1.5 0 005 16.5h10a1.5 1.5 0 001.5-1.5v-5a.5.5 0 00-1 0v5a.5.5 0 01-.5.5H5a.5.5 0 01-.5-.5V5a.5.5 0 01.5-.5h8a.5.5 0 000-1H5A1.5 1.5 0 003.5 5v10z" clip-rule="evenodd"></path>
</svg>Edit</a>
          
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
        <a href="/kategori/destroy/{{ $kt->category_id }}">
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
  
<div class="container">
      <div class="text-center text-muted"><font size="4">Copyright © 2020 - M.  Fahmi Aresha</font></div>
    </div>

      </div>
   </div>
  </div>
@endsection
@section('tambahscript')
<script>
$('.mydatatable').dataTable( {
  "columns": [
    { "width": "10%" },
    { "width": "10%" },
    { "width": "50%" },
    { "width": "25%" }
  ]
} );
</script>
@endsection