@extends('master/customer/template')

@section('title','Halaman Point Of Sales')

@section('konten')


@if (session('insert'))
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

<div class="container">

    <div class="card border-light mb-3" style="max-width: 60rem;">
      <div class="card-header">
      <h3>Point Of Sales</h3>
      </div>
      
   
      <div class="card-body">
      <!-- <h5 class="card-title">Point Of Sales</h5> -->
    
      <form method="post" action="{{ url('/pos/store') }}">
      @csrf
      <div class="form-row">
      <div class="form-group col-md-3">
        @php $x=0; @endphp
        @foreach($sales as $s)
        @php $x++; @endphp
        @endforeach
        @php $y=$x+1; @endphp
        <label for="date"><font size="6"><strong>Nota #{{$y}}</strong></font></label>
        <input type="hidden" name="nota_id" value="{{$nota_id}}">
      </div>
      <!-- <div class="form-group col-md-7"></div>
        <div class="form-group col-md-2">
       <a href="/sales_detail/pdf"><button type="button" class="btn btn-success">PDF Laporan</button></a>
        </div> -->
       
      </div>

      <div class="form-row">

      <div class="form-group col-md-4">
          <label for="nota_date"><font size="4">Date *</font></label>
          <input type="date" class="form-control @error('nota_date') is-invalid @enderror" 
          id="nota_date" placeholder=" nota_date " name="nota_date" value="">
          @error('nota_date')
        <div class="invalid-feedback"><font color="red" size="2">{{ $message }}</font></div>
            @enderror
        </div>

      </div>

  <div class="form-row">
      <div class="form-group col-md-4">
          <label for="user_id"><font size="4">User *</font></label>
          <select id="user_id" name="user_id" class="form-control"
          placeholder="" value="">
          <option disabled selected="">Pilih User</option>
              @foreach($user as $us)
              <option value="{{$us->user_id}}">{{$us->first_name2}}</option>
              @endforeach
          </select>
          </div>

          <div class="form-group col-md-2">
          </div>

          <div class="form-group col-md-2">
          </div>
           <div class="form-group col-md-4">
          <label for="customer_id"><font size="4">Customer *</font></label>
          <select id="customer_id" name="customer_id" class="form-control"
          placeholder="" value="">
          <option disabled selected="">Pilih Customer</option>
              @foreach($customer as $cus)
              <option value="{{$cus->customer_Id}}">{{$cus->first_name}}</option>
              @endforeach
          </select>
          </div>
  </div>
              

    <div class="form-row">
    <div class="form-group col-md-2">
      <button type="button" class="btn btn-primary" onclick="tampil_modal()">Add Product</button>
    </div>   
    </div>
    <input type="text" class="form-control" id="search" name="search" 
    value="" placeholder="Or Search Your Product Name In Here And Enter !" onkeydown="getModal(event)">
   
              <!-- Modal -->
              <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Produk</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <font size="3"> <table class="table table-striped table-bordered mydatatable" id="tabelproduk"></font>
                      <thead class="thead-dark">
                        <tr>
                          <th width=1px scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Stok</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($product as $pr)
                        <tr id="row{{$pr -> product_id}}">
                          <th scope="row"><input type="checkbox" id="pr{{$pr->product_id }}" ></th>
                          <td>{{ $pr->product_name}}</td>
                          <td>{{ $pr->product_price}}</td>
                          <td>{{ $pr->product_stok}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>

                    </div> <!-- Tutup Modal Body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="save" ><font size="4">Add</font></button>
                    <button type="button" class="btn badge-danger" data-dismiss="modal"><font size="4">Back</font></button>
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
              </div>
             <!-- <br> -->

              <font size="3">
              <table class="table table-striped table-bordered " style="width:0%;" id="cart"></font>
                  <thead class="thead-white">
                  <tr>
                  <th  style="text-align:center"   scope="col">Name</th>
                    <th  style="text-align:center"  scope="col">Quantity</th>
                    <th   style="text-align:center" scope="col">Price</th>
                    <th   style="text-align:center" scope="col">Discount & Tax</th>
                    <th   style="text-align:center" scope="col">Total Price</th>
                    <th style="text-align:center"  scope="col">Action</th>
                  </tr>
                </thead>
                    <tbody>
                    </tbody>
                </table>

                <table>
                <td><div class="card bg-light mb-3" style="max-width: 100rem;">
                  <!-- <div class="card-header">Header</div> -->
                  <div class="card-body">
                    <!-- <h5 class="card-title">Light card title</h5> -->
                    <table>
                        <tr>
                          <input type="hidden" id="subtotal">
                            <td><p class="card-text">Price Produk</p></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td>:</td>
                            <td></td><td>Rp</td><td></td><td id="subtotal-val"></td> 
                        </tr>
                        <tr>
                        <input type="hidden" name="total_tax" id="total_tax">
                            <td><p class="card-text">Tax </p></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td>:</td>
                            <td></td><td>Rp </td><td></td><td id="total_tax-val"></td> 
                        </tr>
                        <tr>
                        <input type="hidden" id="total_discount">
                          <td><p class="card-text">Discount</p></td>
                          <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td> 
                            <td>:</td>
                            <td></td><td>Rp </td><td></td><td id="total_discount-val"></td> 
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
                <td><div class="card text-left bg-light mb-10" >
                        <div class="card-body">
                        <input type="hidden" name="total_payment" id="total_payment">
                        <div class="row">
                        <h5><strong>Total</strong></h5>
                      </div>
                          <div class="row">
                              <div class="col">
                              
                              </div>
                              <h3>Rp </h3>
                               <div class="col">
                               <h3 class="card-title" id="total_payment-val"></h3>
                              </div>
                          </div>
                          
                        
                        </div>
                </div></td>
          </table>

          <div class="form-row">
            <br>
          </div>
          <div class="form-row">
          <div class="form-group col-md-10">
          </div>
          <div class="form-group col-md-1">
          <button type="reset" class="btn btn-danger">Reset</button>
          </div>
          <div class="form-group col-md-1">
          <button type="submit" class="btn btn-success">Insert</button>
          </div>
          </div>
      </form>

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
            event.preventDefault();
            myFunction();
        }
    }

    function tampil_modal(){
      $("#tambahModal").modal();
    }

    function myFunction() {
     document.getElementById("search").value='';
    }

    jQuery( function( $ ) {
        
        $("#save").click(function(){
          var checks = $("#tambahModal").find("input[type=checkbox]:checked");
          var ids = Array();
          for(var i=0;i<checks.length;i++) {
              ids[i] = checks[i].id; 
              $("#"+ids[i]).prop("checked", false);
              ids[i] = ids[i].substring(2,10); //PR001
              console.log(ids[i]);
              addRow(ids[i]);

              $("#tabelproduk tbody tr#row"+ids[i]).hide();
          }
        });
            //function agar di klik row mana saja bsa ke ceklis
        // $('#tabelproduk tr').click(function() {
        //     var check = $(this).find("input[type=checkbox]");
        //     if (check.prop("checked") == true) {
        //       check.prop("checked", false);
        //     }
        //     else{
        //       check.prop("checked", true);
        //     }
        // });
      });

    var products = <?php echo json_encode($product); ?>;

  function addRow(id){
      var index = getIndex(id);
      var id = products[index]["product_id"];
      var name = products[index]["product_name"];
      var price = products[index]["product_price"];
      var stock = products[index]["product_stok"];
      var mprice = money(price);
      var markup = "\
      <tr id='"+id+"' style='border: 1px;'>\
	  \
	  <td style='text-align: left; padding-left: 40px;' class='align-middle'>\
	    <div class='row'>\
	      <h6 class='product_name' style='font-weight:bold;'>"+name+"</div>\
	    <div class='row'>\
	      <input type='hidden' name='product_id["+id+"]' value="+id+" readonly id='product_id"+id+"'></div>\
	  </td>\
	  \
	  <td style='width: 15%;' class='align-middle'>\
	    <div class='row justify-content-center'>\
      <button class='dec btn btn-sm btn-dark' type='button' onclick='dec(\""+id+"\")'>-</button>\
	    	<input type='number' style='background-color:#f5f5f5; -moz-appearance: textfield; width: 30%; border:1px;text-align: center;' class='quantity' oninput='recount(\""+id+"\")' name='jumlah["+id+"]' min='1' id='jumlah"+id+"'required max='"+stock+"' value='1'>\
        <button class='inc btn btn-sm btn-dark' type='button' onclick='inc(\""+id+"\")'>+</button>\
	    </div>\
	  </td>\
	  \
	  <td style='text-align: right; width:20%;' class='align-middle'>\
	    <div class='row justify-content-center'>\
	      <input type='hidden' class='selling_price' name='selling_price["+id+"]' id='price"+id+"' value='"+price+"'>\
	       Rp "+"  "+mprice+"\
	  </div>\
    </td>\
    <td>\
    <div class='row align-text-bottom justify-content-center'>\
	      <div class='col-4 pl-0 pt-2 align-middle'>\
	      <h6 style='text-align: left; font-weight:bold;'>Disc. </h6></div>\
	      <div class='col-4 px-0 pt-1'>\
	        <input type='number' min='0' max='100' oninput='percentDisc(\""+id+"\")' class='percent' \
	        name='percent["+id+"]' id='percent"+id+"' \
	        placeholder='0' \
	        style='-moz-appearance: textfield;padding-right:10px; text-align:right; width: 100%;color: black;border-radius: 10pt;border: 2px solid #E06C78;'>\
	        <input type='hidden' min='0' oninput='recount(\""+id+"\")' \
	        class='discount' name='discount["+id+"]' \
	        id='discount"+id+"' placeholder='0' \
	        style='-moz-appearance: textfield;text-align: right;'>\
	      </div>\
	      <div style='text-align: left;font-weight:bold;' class='col-2 pt-2'>%</div>\
	    </div>\
      <div class='row align-text-bottom justify-content-center'>\
	      <div class='col-4 pl-0 pt-2 align-middle'>\
	      <h6 style='text-align: left; font-weight:bold;'>Tax. </h6></div>\
	      <div class='col-4 px-0 pt-1'>\
	        <input type='number' min='0' max='100' oninput='percentTax(\""+id+"\")' class='percentTax' \
	        name='percentTax["+id+"]' id='percentTax"+id+"' \
	        placeholder='10' readonly\
	        style='-moz-appearance: textfield;padding-right:10px; text-align:right; width: 100%;color: black;border-radius: 10pt;border: 2px solid #E06C78;'>\
	        <input type='hidden' min='0' oninput='recount(\""+id+"\")' \
	        class='discountTax' name='discountTax["+id+"]' \
	        id='discountTax"+id+"' placeholder='0' \
	        style='-moz-appearance: textfield;text-align: right;'>\
	      </div>\
	      <div style='text-align: left;font-weight:bold;' class='col-2 pt-2'>%</div>\
	    </div>\
	  </td>\
	  \
	  <td class='align-middle' style='width: 25%;'>\
		  <div class='row align-middle justify-content-end'>\
		  	<input type='hidden' class='total' name='total["+id+"]' min='1' id='total"+id+"' required>\
		  	<div class='col-4 pl-4'>\
		  		<h6 style='text-align: left;'>Rp  </h6>\
		  	</div>\
		  	<div class='col-8' >\
	      		<h6 style='text-align: right; padding-right: 18px;' id='total-val"+id+"'></h6>\
	      	</div>\
		  </div>\
	  </td>\
	  \
	  <td style='width: 5%;' class='align-middle'>\
	  	<i class='badge badge-danger' onclick='delRow(\""+id+"\")' style='cursor: pointer; '>x</i>\
	  </td>\
	</tr>\
	";
	$("#cart tbody").append(markup);
	recount(id);
}

function getIndex(id){
	for(var i = 0;i<products.length;i++){
	  if(products[i]["product_id"] == id){
	      var index = i;
        console.log('function getIndex');
        console.log(index);
	      return index;
	  }
	}
}

function money(text){
	var text = text.toString();
  // console.log(text);
	var panjang = text.length; //4
	var hasil = new Array();
	if (panjang>0){
		if(panjang>3){
			var div = parseInt(panjang/3); //1
			var char = new Array();
			var result="";
			if (div > 1 && panjang > 6) {
				var x = parseInt(panjang - (div*3));
				div++;
				for (var i=0; i<div; i++) {
					if (i == 0) {
						char[i] = text.slice(i,x);
					}
					else{
						char[i] = text.slice(((i-1)*3)+x,(i*3)+x);
					}
					if (i == (div-1)) {					
						hasil[i]= char[i];
					}
					else{
						hasil[i]= char[i]+".";
					}
				}
				for (var i=0; i<div; i++) {
					result+=hasil[i];
				}
			}
			else{
				result = text.slice(0,panjang-3)+"."+text.slice(panjang-3,panjang);
			//  console.log( text.slice(0,panjang-3));
      //  console.log(text.slice(panjang-3,panjang));
      }
			return result;
		}
    else if(panjang>0){
        return text;
    }
		return 0;
	}
}

    function recount(id) {
      console.log("function recount");
      var jumlah = document.getElementById("jumlah"+id).value;
      var price = document.getElementById("price"+id).value;
      var subtotal = (jumlah*price);
      document.getElementById("discount"+id).setAttribute("max", subtotal);
      document.getElementById("total"+id).value = subtotal;
      percentDisc(id);
    };

    function delRow(id){
          $('#cart tbody tr#'+id).remove();
          getTotal();
          $("#tabelproduk tbody tr#row"+id).show();
    }

    function percentDisc(id){
      console.log("function percentDisc");
      var percent = document.getElementById("percent"+id).value;
      if(percent>100 || percent<0){
        console.log('masukkk if percent');
        var percent = document.getElementById("percent"+id).value=0;
      }
      var total = document.getElementById("total"+id).value;
      var hasil = (Number(percent)/100) * total;
      document.getElementById("discount"+id).value = hasil;

      document.getElementById("total"+id).value = total;
      document.getElementById("total-val"+id).innerHTML = money(total-hasil);
      getTotal();
    };

    function getTotal(){
      console.log("function getTotal");
      var totals = document.getElementsByClassName("total");

      var i;
      var total_p = 0;
      for (i = 0; i < totals.length; ++i) {
        total_p = total_p + Number(totals[i].value);
      }
      document.getElementById('subtotal').value = total_p ;
      document.getElementById('subtotal-val').innerHTML = money(total_p);

      var discounts = document.getElementsByClassName("discount");

      var i;
      var total_disc = 0;
      for (i = 0; i < discounts.length; ++i){
        total_disc = total_disc + Number(discounts[i].value);
      }
    //  console.log(total_p);
      var l=document.getElementById('total_tax').value=(Number(total_p*0.1));
      // console.log(l);
      document.getElementById('total_tax-val').innerHTML=money(l);
      // console.log(money(l));
      document.getElementById('total_discount').value = total_disc;
      document.getElementById('total_discount-val').innerHTML = money(total_disc);

      let k = (Number(total_p))-total_disc;
      if(k<=0){
        console.log('masuk if k<=0');
        document.getElementById('total_payment').value = 0;
        document.getElementById('total_payment-val').innerHTML = '0';
      }
      else{
        console.log('masuk if k!=0');
        document.getElementById('total_payment').value = (total_p+(Number(total_p*0.1)))-total_disc;
        document.getElementById('total_payment-val').innerHTML = money((total_p+(Number(total_p*0.1)))-total_disc);
      }
     
    };

    function inc(id){
          var oldValue = $("#jumlah"+id).val();//jumlahPR004
          console.log('Nilai Old Value : ');
          console.log(oldValue);
          var newVal = parseFloat(oldValue)+1;
          console.log('Nilai newVal : ');
          console.log(newVal);
          var maximal = $("#jumlah"+id).attr('max');
          if(!(newVal > maximal)){
            $("#jumlah"+id).val(newVal);
            recount(id);
            console.log("massssuk");
          }
    }

        function dec(id){
          var oldValue = $("#jumlah"+id).val();
          if (parseFloat(oldValue) > 1) {
              var newVal = parseFloat(oldValue)-1;
              $("#jumlah"+id).val(newVal);
          }
          recount(id);
        }

</script> 
@endsection

