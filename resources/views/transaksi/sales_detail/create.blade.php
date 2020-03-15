@extends('master/customer/template')

@section('title','Halaman Point Of Sales')

@section('konten')
<div class="card" style="width: 50rem;" style="margin-left: 5px;">
  <div class="card-body">
      <div class="container">
          <h3 class ="my-2">Nota Id</h3>
          <div class="form-row">
        <div class="form-group col-md-3">
          <label for="customer"><font size="4">Customer</font></label>
          <select id="customer" name="customer" class="form-control @error('customer') is-invalid @enderror"
          placeholder="Kota" value="{{ old('customer') }}">
           <option disabled selected="">Pilih Nama Customer</option>
            <option>Customer1</option>
            <option>Customer2</option>
            <option>Customer3</option>
            <option>Customer4</option>
          </select>
          @error('customer')
        <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
            @enderror
          </div>

          <div class="form-group col-md-2">
          </div>
          
          <div class="form-group col-md-3">
          <label for="user"><font size="4">User</font></label>
          <select id="user" name="user" class="form-control @error('user') is-invalid @enderror"
          placeholder="Kota" value="{{ old('user') }}">
          <option disabled selected="">Pilih Nama User</option>
            <option>User1</option>
            <option>User2</option>
            <option>User3</option>
            <option>User4</option>
          </select>
          @error('user')
          <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
              @enderror
          </div>
  </div>



    <!-- <div class="form-row">
      <div class="form-group col-md-3">
            <label for="date"><font size="4">Date</font></label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" 
            id="date" placeholder="08xxxxxxxx
            " name="date" value="{{ old('date') }}">
            @error('date')
          <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
              @enderror
          </div>
    </div> -->

    <div class="form-row">
      <div class="form-group col-md-4">
            <label for="date"><font size="4">Date</font></label>
            <input type="text" class="form-control @error('date') is-invalid @enderror" 
            id="date" name="date" value="<?php echo date("d-m-Y h:i:sa")?>"readonly>
            @error('date')
          <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
              @enderror
          </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-3">
          <label for="product"><font size="4">Product</font></label>
          <select id="product" name="product" class="form-control @error('product') is-invalid @enderror"
          placeholder="Kota" value="{{ old('product') }}">
            <option selected>Pilih Nama Product</option>
            <option>Product1</option>
            <option>Product2</option>
            <option>Product3</option>
            <option>Product4</option>
          </select>
          @error('product')
          <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
              @enderror
          </div>
  </div>
  <button type="button" class="btn btn-success my-3"><svg class="bi bi-plus" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10 5.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H6a.5.5 0 010-1h3.5V6a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M9.5 10a.5.5 0 01.5-.5h4a.5.5 0 010 1h-3.5V14a.5.5 0 01-1 0v-4z" clip-rule="evenodd"></path>
 </svg>Tambah Product</button>
      
 <font size="3">
 <table class="table table-striped table-bordered mydatatable"  style="width:0%;"></font>
    <thead class="thead-white">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Nota Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Total Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>ID01</td>
      <td>Chiki</td>
      <td>1</td>
      <td>2.000</td>
      <td>50%</td>
      <td>1.000</td>
      <td><button type="button" class="badge badge-danger"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg></button></td>
    </tr>

    <tr>
    <th scope="row"></th>
      <td colspan="6" align="center"><font size="4">Sub Total</font></td>
      <td>Rp. </td>  
    </tr>

    <tr>
    <th scope="row"></th>
      <td colspan="6" align="center"><font size="4">Discount</font></td>
      <td>Rp. </td>  
    </tr>

    <tr>
    <th scope="row"></th>
      <td colspan="6" align="center"><font size="4">Total Payment</font></td>
      <td>Rp. </td>  
    </tr>


      </div>
        </div>
       

</div>
</div>
@endsection

@section('tambahscript')

<script>
   $('.mydatatable').DataTable();  
</script> 
@endsection