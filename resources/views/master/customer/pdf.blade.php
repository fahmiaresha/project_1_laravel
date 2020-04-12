<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
		<h5>Sales Detail</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
            <th scope="col">Status</th>
            <th scope="col"  style="text-align:center" >ID</th>
            <th scope="col"  style="text-align:center" >First Name</th>
            <th scope="col"  style="text-align:center" >Last Name</th>
            <th scope="col"  style="text-align:center" >Phone</th>
            <th scope="col"  style="text-align:center" >Email</th>
            <th scope="col"  style="text-align:center" >Street</th>
            <th scope="col"  style="text-align:center" >City</th>
            <th scope="col"  style="text-align:center" >State</th>
            <th scope="col"  style="text-align:center" >Zip Code</th>
			</tr>
		</thead>
		<tbody>
			@foreach($customer as $cus)
			<tr>
            <td  style="text-align:center">{{ $cus->status }}</td>
            <td  style="text-align:center">{{ $cus->customer_Id }}</td>
            <td  style="text-align:center"> {{ $cus->first_name }}</td>
            <td style="text-align:center">{{ $cus->last_name }}</td>
            <td style="text-align:center">{{ $cus->phone }}</td>
            <td style="text-align:center">{{ $cus->email }}</td>
            <td style="text-align:center">{{ $cus->street }}</td>
            <td style="text-align:center">{{ $cus->city }}</td>
            <td style="text-align:center">{{ $cus->state }}</td>
            <td style="text-align:center">{{ $cus->zip_code }}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>