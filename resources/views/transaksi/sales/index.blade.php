@extends('master/customer/template')

@section('title','Halaman Sales')

@section('konten')

<div class="container" style="margin-left: 15px;">
   <div class="row">
      <div class="col-20">
  <h2  class ="mt-3  animate__animated animate__backInLeft" style=" animation-duration: 3s;">Data Sales</h2>
  
   <!-- Button trigger modal -->
   @if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('admin') || \Session::has('kasir'))
<!-- <button type="button" class="btn btn-primary my-3" data-toggle="modal" 
data-target="#exampleModal3">
  Tambah Data Sales
</button> -->
<div class="form-row">
<div class="form-group col-md-4">
<a href="/sales_detail/create"><button type="button" class="btn btn-success my-2 animate__animated animate__fadeInUp " style=" animation-duration: 3s; "> <i class="fas fa-plus-circle"></i> Tambah Data Sales</button></a>
</div>
<div class="form-group col-md-5">
</div>
<div class="form-group col-md-3">
<a href="/sales_detail/pdf"><button type="button" onclick="tampil_download()" class="btn btn-danger animate__animated animate__fadeInUp " style=" animation-duration: 3s; "><svg class="bi bi-download" width="20px" height="20px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M.5 8a.5.5 0 01.5.5V12a1 1 0 001 1h12a1 1 0 001-1V8.5a.5.5 0 011 0V12a2 2 0 01-2 2H2a2 2 0 01-2-2V8.5A.5.5 0 01.5 8z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M5 7.5a.5.5 0 01.707 0L8 9.793 10.293 7.5a.5.5 0 11.707.707l-2.646 2.647a.5.5 0 01-.708 0L5 8.207A.5.5 0 015 7.5z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M8 1a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 1z" clip-rule="evenodd"></path>
</svg> Laporan Sales</button></a>
</div>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Insert sales</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ url('/sales/store') }}">
      {{ csrf_field() }}

  <!-- <div class="form-group">
    <label for="customer_id"><font size="4">Customer Id</font></label>
    <input type="text" class="form-control @error('customer_id') is-invalid @enderror" 
    id="customer_id" placeholder="customer_id@example.com" name="customer_id" value="{{ old('customer_id') }}">
    @error('customer_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <!-- <div class="form-group">
    <label for="user_id"><font size="4">User Id</font></label>
    <input type="text" class="form-control @error('user_id') is-invalid @enderror" 
    id="user_id" placeholder="08xxxxxxxx
     " name="user_id" value="{{ old('user_id') }}">
    @error('user_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <div class="form-group ">
    <label for="customer_id"><font size="4">Customer Name</font></label>
    <select class="form-control" id="customer_id" name="customer_id">
    <option disabled selected="">Pilih Customer</option>
      @foreach($customer as $cus)
      <option value="{{$cus -> customer_Id}}">{{$cus->first_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group ">
    <label for="user_id"><font size="4">User Name</font></label>
    <select class="form-control" id="user_id" name="user_id">
    <option disabled selected="">Pilih User</option>
      @foreach($user as $us)
      <option value="{{$us->user_id}}">{{$us->first_name2}}</option>
      @endforeach
    </select>
  </div>

 

  

  <div class="form-group">
    <label for="nota_date"><font size="4">Date </font></label>
    <input type="date" class="form-control @error('nota_date') is-invalid @enderror" 
    id="nota_date" placeholder=" nota_date " name="nota_date" value="">
    @error('nota_date')
  <div class="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>
  
  <div class="form-group">
    <label for="total_payment"><font size="4">Total Payment</font></label>
    <input type="numeric" class="form-control @error('total_payment') is-invalid @enderror" 
    id="total_payment" placeholder="Total" name="total_payment" value="{{ old('total_payment') }}">
    @error('total_payment')
  <div class="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
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
    <!-- <th scope="col">#</th> -->
      <th scope="col" style="text-align:center" >Nota ID</th>
      <th scope="col" style="text-align:center" >Customer Name</th>
      <th scope="col" style="text-align:center" >User Name</th>
      <th scope="col" style="text-align:center" >Date</th>
      <th scope="col" style="text-align:center" >Total Payment</th>
      @if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('kasir') )
      <th scope="col" style="text-align:center" >Action</th>
      @endif
    </tr>
  </thead>

  <tbody>
  @foreach($sales as $sl )
    <tr>
      <!-- <th scope="row"> {{ $loop->iteration }}</th> -->
      <td style="text-align:center">{{ $sl->nota_id}}</td>
      <td  style="text-align:center">{{ $sl->first_name }}</td>
      <td  style="text-align:center">{{ $sl->first_name2}}</td>
      <td style="text-align:center">{{ $sl->nota_date }}</td>
      <td style="text-align:center">{{ $sl->total_payment }}</td>
      @if(\Session::has('super_admin') || \Session::has('owner') || \Session::has('kasir'))
      <td>
        
        <!-- <a href="/user/edit/{{ $us->user_id }}" 
           class="badge badge-success"><svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit</a> -->

<!-- Button trigger modal -->
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#detailModal{{$sl->nota_id}}"><svg class="bi bi-eye" width="22px" height="22px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z" clip-rule="evenodd"></path>
</svg>
  Detail
</button>

<!-- Modal -->
<div class="modal fade" id="detailModal{{$sl->nota_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        @php $x=$sl->nota_id; @endphp
       
        <label for="date"><font size="4"><strong>Nota #{{$x}}</strong></font></label>
            <font size="2">
            <table class="table table-striped table-bordered " style="width:0%;"> </font>
          <thead class="thead-dark">
            <tr>
                  <!-- <th style="text-align:center" scope="col">Nota ID</th> -->
                  <th style="text-align:center"  scope="col">Name</th>
                  <th style="text-align:center"  scope="col">Quantity</th>
                  <th style="text-align:center"  scope="col">Price</th>
                  <th style="text-align:center"  scope="col">Discount</th>
                  <th style="text-align:center"  scope="col">Tax</th>
                  <th style="text-align:center"  scope="col">Total Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sales_detail as $sd)
            <tr>
              @if($sl->nota_id == $sd->nota_id)
                  <!-- <td  style="text-align:center">{{ $sd->nota_id }}</td> -->
                  <td  style="text-align:center">{{ $sd->product_name }}</td>
                  <td style="text-align:center" >{{ $sd->quantity}}</td>
                  <td style="text-align:center" >{{ $sd->selling_price }}</td>
                  @php $p=0; @endphp
                  @php $p=(($sd->discount/$sd->total_price)*100) @endphp
                  <td style="text-align:center" ><strong>{{$p}} %</strong></td>
                  <th style="text-align:center" >10 %</th>
                  <td style="text-align:center" >{{ $sd->total_price }}</td>
                  @endif
            </tr>
            @endforeach
          </tbody>  
          </table>
          <div class="container">
            
          <!-- <br> -->
          <div class="form-row mt-4">
          <div class="form-group col-md-5">
          </div>
          <div class="form-group col-md-3">
             @php $z=0; @endphp
                @foreach($sales_detail as $sd)
                @if($sd->nota_id==$sl->nota_id)
                  @php $z=$z+$sd->total_price @endphp
                @endif
                @endforeach
                <label><font size="3"><strong>Subtotal : </strong></font></label>
          </div>
          <div class="form-group col-md-3">
          <label><font size="3"><strong>Rp. {{$z}} </strong></font></label>
          </div>
           
          </div>

          <div class="form-row "style="margin-top: -15px">
          <div class="form-group col-md-5">
          </div>
          <div class="form-group col-md-3">
          @php $t=0; @endphp
          @foreach($sales_detail as $sd)
          @if($sl->nota_id == $sd->nota_id)
             @php $t=$t+$sd->discount @endphp
          @endif
          @endforeach
          <label><font size="3"><strong>Discount :</strong></font></label>
          </div>
          <div class="form-group col-md-3">
          <label><font size="3"><strong> Rp. {{$t}}</strong></font></label>
          </div>
          </div>

          <div class="form-row" style="margin-top: -15px">
          <div class="form-group col-md-5">
          </div>
          <div class="form-group col-md-3">
          @php $b=($z*0.1) @endphp
          <label><font size="3"><strong>Tax (10%) : </strong></font></label>
          </div>
          <div class="form-group col-md-3">
          <label><font size="3"><strong>Rp. {{$b}}</strong></font></label>
          </div>
          </div>

          @foreach($sales_detail as $sd)
          @if($sl->nota_id == $sd->nota_id)
          <div class="form-row" style="margin-top: -15px">
          <div class="form-group col-md-5">
          </div>
          <div class="form-group col-md-3">
          <label><font size="3"><strong> Payment : </strong></font></label>
          </div>
          <div class="form-group col-md-3">
          <label><font size="3"><strong>Rp. {{$sl->total_payment}}</strong></font></label>
          </div>
          </div>
          @break
          @endif
          @endforeach
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Close</button> -->
      </div>
    </div>
  </div>
</div>

<a href="/sales/invoice/{{ $sl->nota_id}}">
<button type="button" class="badge badge-info" ><svg class="bi bi-file-earmark-text" width="22px" height="22px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4 1h5v1H4a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V6h1v7a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2z"></path>
  <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 019 4.5z"></path>
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5z" clip-rule="evenodd"></path>
</svg>
 Invoice
</button></a>



<!-- MODAL EDIT -->
<!-- Button trigger modal -->
<!-- <button type="button" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $sl->nota_id }}">
<svg class="bi bi-pencil" width="25px" height="25px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
</svg>Edit
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal{{ $sl->nota_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form method="post" action="{{ url('/sales/update') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $sl->nota_id }}">
  
  <!-- <div class="form-group">
    <label for="customer_id"><font size="4">Nama Customer</font></label>
    <input type="customer_id" class="form-control @error('customer_id') is-invalid @enderror" 
    id="customer_id" placeholder="customer_id" name="customer_id" 
    value="{{ $sl->customer_id }}" required>
    @error('customer_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="user_id"><font size="4">Nama user</font></label>
    <input type="text" class="form-control @error('user_id') is-invalid @enderror" 
    id="user_id" placeholder="user_id" name="user_id" 
    value="{{ $sl->user_id }}" required>
    @error('user_id')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div> -->

  <div class="form-group ">
    <label for="customer_id"><font size="4">Customer Name</font></label>
    <select class="form-control" id="customer_id" name="customer_id">
    <option disabled selected="">Pilih Customer</option>
      @foreach($customer as $cus)
      <option value="{{$cus -> customer_Id}}">{{$cus->first_name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group ">
    <label for="user_id"><font size="4">User Name</font></label>
    <select class="form-control" id="user_id" name="user_id">
    <option disabled selected="">Pilih User</option>
      @foreach($user as $us)
      <option value="{{$us->user_id}}">{{$us->first_name2}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="form-group">
    <label for="nota_date"><font size="4">Date</font></label>
    <input type="text" class="form-control @error('nota_date') is-invalid @enderror" 
    id="nota_date" placeholder="nota_date" name="nota_date" 
    value="{{ $sl->nota_date }}" readonly>
    @error('nota_date')
  <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
      @enderror
  </div>

  <div class="form-group">
    <label for="total_payment"><font size="4">Total Payment</font></label>
    <input type="text" class="form-control @error('total_payment') is-invalid @enderror" 
    id="total_payment" placeholder="Total" name="total_payment" 
    value="{{ $sl->total_payment }}" >
    @error('total_payment')
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
       
<!-- <button type="button" class="badge badge-danger" data-toggle="modal" 
data-target="#deleteModal{{$sl -> nota_id}}"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
</svg>Delete</button> -->
        
<!-- Modal -->
<div class="modal fade" id="deleteModal{{$sl -> nota_id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="{{ url('/sales/destroy/'.$sl->nota_id) }}">
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
@endsection

@section('tambahscript')
<script>
     $('.mydatatable').DataTable();
        function tampil_download(){
              let timerInterval
              Swal.fire({
                title: 'Please Wait....',
                html: 'Your File Is Downloading!',
                timer: 5000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                  Swal.showLoading()
                  timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                      const b = content.querySelector('b')
                      if (b) {
                        b.textContent = Swal.getTimerLeft()
                      }
                    }
                  }, 100)
                },
                onClose: () => {
                  clearInterval(timerInterval)
                }
              }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
                }
              })
        }
</script> 
@endsection