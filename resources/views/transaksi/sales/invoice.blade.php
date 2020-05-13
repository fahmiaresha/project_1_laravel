@extends('master/customer/template')

@section('title','Halaman Invoice')
@section('konten')

<div class="container">

<div class="card" style="width: 1100px;">
  <div class="card-body">
    <h3 class="card-title mb-4"><strong>Invoice #{{$invoice}}</strong></h3>

    <div class="container">
    <div class="form-row mb-2">
    <h6 style="font-family: Arial, Helvetica, sans-serif">Date</h6>
    </div>

    <div class="form-row mb-4">
    @foreach($sales as $s)
    @if($s->nota_id == $invoice)
    <h5><strong>{{$s->nota_date}}</strong></h5>
    @endif
    @endforeach
    </div>

    <div class="form-row  mb-2">
    <h6 style="font-family: Arial, Helvetica, sans-serif">Customer</h6>
    </div>

    <div class="form-row">
        @php $id_cus=0; @endphp
   @foreach($sales as $s)
        @if($s->nota_id == $invoice)
        @php $id_cus=$s->customer_id; @endphp
        @endif
    @endforeach

    @foreach($customer as $c)
                @if($c->customer_Id == $id_cus)
                <h5><strong>{{$c->first_name}} {{ $c->last_name}}</strong></h5>
    </div>
    <div class="form-row">
    <h6 style="font-family: Arial, Helvetica, sans-serif">{{$c->street}} , {{ $c->city}} {{ $c->zip_code}}</h6>
    </div>

    <div class="form-row">
    <h6 style="font-family: Arial, Helvetica, sans-serif">{{$c->phone}}</h6>
    </div>
    <div class="form-row">
    <h6 style="font-family: Arial, Helvetica, sans-serif">{{$c->email}}</h6>
    </div>
                @endif
    @endforeach
    <br>
    
  <div class="table-responsive ">
  <font size="2"><table class="table table-striped table-bordered "></font>
    <thead class="thead-white">
    <thead class="thead-light">
        <tr>
            <!-- <th>Nomer</th> -->
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Total Price</th>
        </tr>
    </thead>

    <tbody>
        <tr>
    @php $id_produk=0; @endphp
        @foreach($sales_detail as $sd)
        @if($sd->nota_id == $invoice)
             @php $id_produk=$sd->product_id; @endphp
             @foreach($product as $p)
                    @if($p->product_id == $id_produk)
                    <td>  {{$p->product_name}}</td>
                    @endif
             @endforeach
             <td> {{$sd->quantity}}</td>
             <td> {{$sd->selling_price}}</td>
             <td> {{$sd->discount}}</td>
             <td> {{$sd->total_price}}</td>
        @endif
        </tr>
        @endforeach 
    </tbody>
  </table>
</div>

    </div>

  </div>
</div>

</div>
@endsection