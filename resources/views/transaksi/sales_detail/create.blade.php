@extends('master/customer/template')

@section('title','Halaman Point Of Sales')

@section('konten')
<div class="container">
    <div class="card border-light mb-3" style="max-width: 60rem;">
      <div class="card-header"><h3>Form Insert Data </h3></div>
      <div class="card-body">
      <h5 class="card-title">Point Of Sales</h5>

      <div class="form-row">
        <div class="form-group col-md-4">
        <label for="date"><font size="4">Category Id</font></label>
            <input type="text" class="form-control @error('date') is-invalid @enderror" 
            id="date" name="date" value=""readonly>
            @error('date')
          <div clas="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
              @enderror
          </div>

          <div class="form-group col-md-2">
          </div>

          <div class="form-group col-md-2">
          </div>
          
          <div class="form-group col-md-4">
          <label for="category_name"><font size="4">Category Name *</font></label>
          <select id="category_name" name="category_name" class="form-control"
          placeholder="" value="">
          <option disabled selected="">Select Category Name</option>
              @foreach($categories as $cat)
              <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
              @endforeach
          </select>
          </div>
  </div>

    <input type="text" class="form-control" id="search" name="search" 
    value="" placeholder="Enter Your Product Name!" onkeyup="getModal(event)">

              <!-- Modal -->
              <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <font size="3"> <table class="table table-bordered"></font>
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Stok</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($product as $pr)
                        <tr>
                          <th scope="row"> <input type="checkbox" id="$pr->$product_id" name="$pr->$product_id"></th>
                          <td>{{ $pr->product_name}}</td>
                          <td>{{ $pr->product_price}}</td>
                          <td>{{ $pr->product_stok}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>

                    </div> <!-- Tutup Modal Body -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success">
                      <svg aria-hidden="true" width="20px" height="20px" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-fw fa-2x"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg> Add To Cart</button>
                     <font size="6"><button type="button" class="badge badge-danger" data-dismiss="modal">Back</button></font>
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
              </div>
             <!-- <br> -->

              <font size="3">
              <table class="table table-striped table-bordered mydatatable" style="width:0%;"></font>
                  <thead class="thead-white">
                  <tr>
                  <th scope="col">#</th>
                    <th width="25%" scope="col">Product Name</th>
                    <th width="25%" scope="col">Price</th>
                    <th width="25%" scope="col">Quantity</th>
                    <th width="25%" scope="col">Sub Total</th>
                  </tr>
                </thead>

                <tbody>
                <tr>
                      <th scope="row"><button type="button" class="badge badge-danger"><svg class="bi bi-trash-fill" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
                      </svg></button></th>
                      <td>Chiki</td>
                      <td>8000</td>
                      
                      <td><input type="number" value="0" min="0" max="1000" step="1" style='text-align:right;'></td>
                      <td>16000</td>
                </tr>
                </tbody>
                </table>

                <table>
                <td><div class="card bg-light mb-3" style="max-width: 100rem;">
                  <!-- <div class="card-header">Header</div> -->
                  <div class="card-body">
                    <!-- <h5 class="card-title">Light card title</h5> -->
                    <table>
                        <tr>
                            <td><p class="card-text">Sub Total</p></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td>:</td>
                            <td></td><td></td><td></td><td>Rp. 16.000</td> 
                        </tr>
                        <tr>
                            <td><p class="card-text">Tax (10%)</p></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td>:</td>
                            <td></td><td></td><td></td><td>Rp. 1.600</td> 
                        </tr>
                        <tr>
                          <td><p class="card-text">Discount</p></td>
                          <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td>:</td>
                            <td></td><td></td><td></td><td>Rp. 0</td> 
                        </tr>
                    </table>
                  
                  </div>
                </div></td>

                <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                 <td><div class="card text-right bg-light mb-3" >
                        <div class="card-body">
                          <h3 class="card-title">Total : Rp. 17.600</h3>
                        </div>
                </div></td>

</table>
                
                

      </div> <!-- tutup cards -->
    </div> <!-- tutup cards -->
</div>  <!-- tutup kontainer -->
              

       
@endsection

@section('tambahscript')
<script>
   $('.mydatatable').DataTable(); 

   function getModal(event){
        if(event.keyCode==13){
            $("#tambahModal").modal();
            myFunction();
        }
    }

    function myFunction() {
     document.getElementById("search").value='';
    }

</script> 
@endsection

<script>
    $("input[name='demo2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: '$'
    });
</script>