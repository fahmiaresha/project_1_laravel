<!DOCTYPE html>
<html>
<head>
	<title>laporan-penjualan-pdf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <center>
       <h2> <strong>Laporan Penjualan</strong></h2>
    </center>
    <br>
    <div class="container">
    

    <font size="2">
      <table class="table table-striped table-bordered mydatatable" style="width:100%;"> </font>
    <thead class="thead-dark">
			<tr>
            <th scope="col" style="text-align:center" >Nota ID</th>
            <th scope="col" width="20%" style="text-align:center" >Customer Name</th>
            <th scope="col" style="text-align:center" >User Name</th>
            <th scope="col" width="20%" style="text-align:center" >Date</th>
            <th scope="col"  width="20%" style="text-align:center" >Total Payment</th>
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

    </div>

    </body>
</html>

