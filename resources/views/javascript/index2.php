<table  width="100%" id="table">

</table>

<script>
var colnum=0;
window.onload=function(){
    var table = document.getElementById('table');
    for(var i=0; i<2; i++)
    {
        var row = table.insertRow(table.rows.length);
        //console.log(row);
        var idrow = 'row'+colnum; //0
        row.setAttribute('id',idrow); // id=0
        colnum++; //id=1

        var cel_1=row.insertCell(0);
        var cel_2=row.insertCell(1);
        var cel_3=row.insertCell(2);
      

        cel_1.innerHTML = '<input type="number" name="var_1" value="10" readonly>';
        cel_2.innerHTML = '<input type="number" name="var_2" value="3" onkeyup="perkalian(\''+idrow+'\')">';
        cel_3.innerHTML = '<input type="number" name="var_3" value="30">';
    }


}

function perkalian(id)
{
    var row = document.getElementById(id);
    var val1 = row.childNodes[0].childNodes[0].value;
    var val2 = row.childNodes[1].childNodes[0].value;
    var subtotal = val1*val2;
    row.childNodes[2].childNodes[0].value=subtotal;
    
}
</script>