@extends('master/customer/template')

@section('title','Halaman Product')

@section('konten')

<div class="container" style="margin-left: 15px;">
   <div class="row">
      <div class="col-20">
  <h2 class ="mt-3">Data Product</h2>
  
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-3" data-toggle="modal" 
data-target="#exampleModal4">
  Tambah Data Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Insert Product</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post"  action="{{ url('/product/store') }}">
      {{ csrf_field() }}

    <div class="form-group ">
    <label for="category_id"><font size="4">Category Name</font></label>
    <select class="form-control" id="category_id" name="category_id">
    <option disabled selected="">Pilih Kategori</option>
      @foreach($categories as $cat)
      <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="product_name"><font size="4">Product Name</font></label>
    <input type="text" class="form-control @error('product_name') is-invalid @enderror" 
    id="product_name" placeholder="Product_Name
     " name="product_name" value="{{ old('product_name') }}">
    @error('product_name')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="product_price"><font size="4">Price</font></label>
    <input type="product_price" class="form-control @error('product_price') is-invalid @enderror" 
    id="product_price" placeholder="Product_Price " name="product_price" value="{{ old('product_price') }}">
    @error('product_price')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
  
        <div class="form-group">
            <label for="product_stok"><font size="4">Stok</font></label>
            <input type="number" class="form-control @error('product_stok') is-invalid @enderror" 
            id="product_stok" placeholder="Product_Stok " name="product_stok" value="{{ old('product_stok') }}">
            @error('product_stok')
        <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
            @enderror
        </div>

        <div class="form-group">
            <label for="explanation"><font size="4">Explanation</font></label>
            <input type="text" class="form-control @error('explanation') is-invalid @enderror" 
            id="explanation" placeholder=" Explanation " name="explanation" value="{{ old('explanation') }}">
            @error('explanation')
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
      <th scope="col">Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stok</th>
      <th scope="col">Explanation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($product as $pr )
    <tr>
      <th scope="row"> {{ $loop->iteration }}</th>
      <td>{{ $pr->product_id}}</td>
      <td>{{ $pr->category_name }}</td>
      <td>{{ $pr->product_name }}</td>
      <td>{{ $pr->product_price }}</td>
      <td>{{ $pr->product_stok }}</td>
      <td>{{ $pr->explanation }}</td>
      <td>
      
       
        <!-- <a href="/product/edit/{{ $pr->product_id }}" 
           class="badge badge-success"><svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit</a> -->

<!-- Button trigger modal -->
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $pr->product_id }}">
<svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editModal{{ $pr->product_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post"  action="{{ url('/product/update') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $pr->product_id }}">

  <!-- <div class="form-group">
    <label for="category_id"><font size="4">Category_Id</font></label>
    <input type="text" class="form-control @error('category_id') is-invalid @enderror" 
    id="category_id" placeholder="Category_Id " name="category_id" value="{{ $pr->category_id }}"  required>
    @error('category_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <div class="form-group ">
    <label for="category_id"><font size="4">Category Name</font></label>
    <select class="form-control" id="category_id" name="category_id">
    <option disabled selected="">Pilih Kategori</option>
      @foreach($categories as $cat)
      <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="product_name"><font size="4">Product Name</font></label>
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
    data-target="#exampleModal2{{$pr -> product_id}}"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
    </svg>Delete</button>
            
<!-- Modal -->
<div class="modal fade" id="exampleModal2{{$pr -> product_id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
       
        <a href="{{ url('/product/destroy/'.$pr->product_id) }}">
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