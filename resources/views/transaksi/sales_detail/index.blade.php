@extends('master/customer/template')

@section('title','Halaman Sales Detail')

@section('konten')

<div class="container" style="margin-left: 15px;">
   <div class="row">
      <div class="col-20">
      
  <h2 class ="mt-3">Data Sales Detail</h2>
   <!-- <a href="/sales_detail/create"><button type="button" class="btn btn-primary my-3">Tambah Data</button></a> -->
  
    <font size="2">
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
    <tr>
    <!-- <th  style="text-align:center"  scope="col">#</th> -->
      <th  style="text-align:center" scope="col">Nota ID</th>
      <th style="text-align:center"  scope="col">Product Name</th>
      <th style="text-align:center"  scope="col">Quantity</th>
      <th style="text-align:center"  scope="col">Price</th>
      <th style="text-align:center"  scope="col">Discount</th>
      <th style="text-align:center"  scope="col">Total Price</th>
    </tr>
  </thead>

  <tbody>
  @foreach($sales_detail as $sd )
    <tr>
      <!-- <th scope="row"> {{ $loop->iteration }}</th> -->
      
      <td style="text-align:center" >{{ $sd->nota_id}}</td>
      <td  >{{ $sd->product_name }}</td>
      <td style="text-align:center" >{{ $sd->quantity}}</td>
      <td style="text-align:center" >{{ $sd->selling_price }}</td>
      <td style="text-align:center" >{{ $sd->discount }}</td>
      <td style="text-align:center" >{{ $sd->total_price }}</td>
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
</script> 
@endsection