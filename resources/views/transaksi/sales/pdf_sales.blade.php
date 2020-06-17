<!DOCTYPE html>
<html>
<head>
	<title>print-invoice-pdf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <center>
       <h2> <strong>Invoice Penjualan</strong></h2>
    </center>
    <br>
    <div class="container">
    <div class="form-row">
    <div class="form-group col-md-9">
    <h3><strong>Invoice #{{$invoice}}</strong></h3>
    </div>
    <div class="form-group col-md-3 mt-3">
     <h6 style="font-family: Arial, Helvetica, sans-serif">
     <strong>Created at : @php  echo date('H:i:s d-m-Y'); @endphp</strong>
     </h6>
    </div>


    </div>
    
    <div class="container">
    <div class="form-row">
    <h5 style="font-family: Arial, Helvetica, sans-serif"><strong>Date</strong></h5>
    </div>

    <div class="form-row mb-4">
    @foreach($sales as $s)
    @if($s->nota_id == $invoice)
    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">{{$s->nota_date}}</h5>
    @endif
    @endforeach
    </div>

    <div class="form-row">
    <h5 style="font-family: Arial, Helvetica, sans-serif"><strong>Customer</strong></h5>
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
                <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">{{$c->first_name}} {{ $c->last_name}}</h5>
    </div>
    <div class="form-row">
    <h6 style="font-family: Georgia, 'Times New Roman', Times, serif">{{$c->street}} , {{ $c->city}} {{ $c->zip_code}}</h6>
    </div>

    <div class="form-row">
    <h6 style="font-family: Georgia, 'Times New Roman', Times, serif">{{$c->phone}}</h6>
    </div>
    <div class="form-row">
    <h6 style="font-family: Georgia, 'Times New Roman', Times, serif">{{$c->email}}</h6>
    </div>
                @endif
    @endforeach
    <br>
    
  <div class="table-responsive ">
  <font size="2"><table class="table table-striped  "></font>
    <thead class="thead-dark">
    <!-- <thead class="thead-light"> -->
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
             <td>Rp. {{$sd->selling_price}}</td>
             <td> 
              @if($sd->discount==0)
                  -
              @else
              Rp. {{$sd->discount}}
              @endif
              </td>
             <td>Rp. {{$sd->total_price}}</td>
        @endif
        </tr>
        @endforeach 
    </tbody>
  </table>
</div>

<div class="form-row">
<div class="form-group col-md-8">
</div>

<div class="form-group col-md-4">
    <div class="card text-white bg-dark mb-5" style="width: 290px;">
      <div class="card-body">
        <h5 class="card-title mb-3"><strong>Payment</strong></h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              
              @php $z=0; @endphp
                @foreach($sales_detail as $sd)
                @if($sd->nota_id==$invoice)
                  @php $z=$z+$sd->total_price @endphp
                @endif
                @endforeach

               <div class="form-row">
               <div class="form-group col-md-7">
               <p class="text-left font-weight-bold">Subtotal : </p>
               </div>
               <div class="form-group col-md-4 text-right font-weight-bold">
               Rp.  {{$z}}
               </div>
               </div>
                  

                @php $t=0; @endphp
                @foreach($sales_detail as $sd)
                @if($sd->nota_id==$invoice)
                  @php $t=$t+$sd->discount @endphp
                @endif
                @endforeach 
               <div class="form-row" style="margin-top: -15px">
               <div class="form-group col-md-7">
               <p class="text-left font-weight-bold">Total Discount : </p>
               </div>
               <div class="form-group col-md-4 text-right font-weight-bold">
               Rp.  {{$t}}
               </div>
               </div>

               @php $p=($z*0.1) @endphp
               <div class="form-row" style="margin-top: -15px">
               <div class="form-group col-md-7">
               <p class="text-left font-weight-bold">Tax (10%) :</p>
               </div>
               <div class="form-group col-md-4 text-right font-weight-bold">
               Rp. {{$p}}
               </div>
               </div>
              
               
               @foreach($sales as $sd)
                @if($sd->nota_id==$invoice)
               
               <div class="form-row" style="margin-top: -15px">
               <div class="form-group col-md-7">
               <p class="text-left font-weight-bold">Total Payment :</p>
               </div>
               <div class="form-group col-md-4 text-right font-weight-bold">
               Rp. {{$sd->total_payment}}
               </div>
               @endif
                @endforeach
               </div>

              
      </div>
    </div>
</div>

</div>
        
    </div>
  

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
     Swal.fire({
          timer: 6000,
          icon: 'info',
          title: 'Tekan Ctrl + P Untuk Print',
          text: '',
        })
  });
</script>   
</body>
</html>

