@extends('master/customer/template')

@section('title','Halaman Sales Detail')

@section('konten')

<div class="container" style="margin-left: 15px;">
   <div class="row">
      <div class="col-20">
  <h2 class ="mt-3">Data Sales Detail</h2>
  
    <font size="2">
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Nota Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>

  <tbody>
  @foreach($sales_detail as $sd )
    <tr>
      <th scope="row"> {{ $loop->iteration }}</th>
      <td>{{ $sd->nota_id}}</td>
      <td>{{ $sd->product_name }}</td>
      <td>{{ $sd->quantity}}</td>
      <td>{{ $sd->selling_price }}</td>
      <td>{{ $sd->discount }}</td>
      <td>{{ $sd->total_price }}</td>
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