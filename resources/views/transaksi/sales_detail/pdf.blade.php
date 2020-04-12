@extends('master/customer/template')
@section('konten')
    <center>
       <h2> <strong>Laporan Penjualan</strong></h2>
    </center>
    
    <div class="container">
    <h4>1. Data Sales</h4>

    <font size="2">
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
			<tr>
            <th scope="col" style="text-align:center" >Nota ID</th>
            <th scope="col" style="text-align:center" >Customer Name</th>
            <th scope="col" style="text-align:center" >User Name</th>
            <th scope="col" style="text-align:center" >Date</th>
            <th scope="col" style="text-align:center" >Total Payment</th>
			</tr>
		</thead>
		<tbody>
        @foreach($sales as $sl )
			<tr>
            <td style="text-align:center">{{ $sl->nota_id}}</td>
            <td  style="text-align:center">{{ $sl->first_name }}</td>
            <td  style="text-align:center">{{ $sl->first_name2}}</td>
            <td style="text-align:center">{{ $sl->nota_date }}</td>
            <td style="text-align:center">{{ $sl->total_payment }}</td>
				
			</tr>
			@endforeach
		</tbody>
    </table>

<br>
    <h4>2. Data Sales Detail</h4>
	<font size="2">
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
			<tr>
            <th style="text-align:center" scope="col">Nota ID</th>
            <th style="text-align:center"  scope="col">Product Name</th>
            <th style="text-align:center"  scope="col">Quantity</th>
            <th style="text-align:center"  scope="col">Price</th>
            <th style="text-align:center"  scope="col">Discount</th>
            <th style="text-align:center"  scope="col">Total Price</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sales_detail as $sd)
			<tr>
            <td  style="text-align:center">{{ $sd->nota_id }}</td>
            <td  style="text-align:center">{{ $sd->product_name }}</td>
            <td style="text-align:center" >{{ $sd->quantity}}</td>
            <td style="text-align:center" >{{ $sd->selling_price }}</td>
            <td style="text-align:center" >{{ $sd->discount }}</td>
            <td style="text-align:center" >{{ $sd->total_price }}</td>
				
			</tr>
			@endforeach
		</tbody>
    </table>

    </div>
@endsection

@section('tambahscript')
<script>
     $('.mydatatable').DataTable();
</script> 
@endsection
