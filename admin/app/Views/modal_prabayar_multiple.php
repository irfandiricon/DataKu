<?php 
$PROVIDER = isset($provider) ? $provider :array();
$UrlProvider = base_url('prabayar/provider');
?>

<div class="table-responsive">
	<table id="table-input-pulsa">
		<tr>
			<td width="50">
				<input name="button1" value="Hapus" type="button" readonly style="display:none">
			</td>
			<td width="150">TIPE</td>
			<td width="150">Provider</td>
			<td width="150">Kode</td>
			<td width="200">Nama</td>
			<td width="150">Harga Modal</td>
			<td width="150">Harga Jual</td>
			<td width="250" style="text-align: left">Deskripsi</td>
		</tr>
	</table>
	<div style="padding: 10px;">
		<button onclick="addRow('table-input-pulsa')" class="btn btn-info btn-remove-row">
			<i class="fa fa-plus-circle" style="font-size: 20px; cursor: pointer;"></i> Tambah
		</button>
	</div>
</div>

<style type="text/css">
	table#table-input-pulsa{
		width: 100%;
	}

	table#table-input-pulsa thead tr th{
		padding: 5px;
		font-size: 14px;
		border: 1px solid #ddd;
		font-weight: 600;
	}

	table#table-input-pulsa tbody tr td{
		padding: 5px;
		font-size: 14px;
		border: 1px solid #ddd;
		text-align: center;
	}

	table#table-input-pulsa tfoot tr td{
		padding: 5px;
		border: 1px solid #ddd;
	}

	textarea{
		width: 100%;
	}

	.btn-remove-row{
		font-size: 14px;
		padding-top: 3px;
		padding-bottom: 3px;
	}

	.t-right{
		text-align: right;
	}
</style>

<script>
    function addRow(tableID) {  
    	var url = "<?php echo $UrlProvider ?>";
    	$.ajax({
    		url : url,
    		dataType : 'json',
    		cache : false,
    		type : 'post',
    		success : function(array){
    			var table = document.getElementById(tableID);  
		        var rowCount = table.rows.length;  
		        var row = table.insertRow(rowCount);  

		        //Column 0
		        var cell0 = row.insertCell(0); 
		        var element0 = document.createElement("input");  
			    element0.type = "button";  
			    var btnName = "button" + (rowCount + 1);  
			    element0.name = btnName;  
			    element0.setAttribute('value', 'Hapus');
			    element0.setAttribute('class', 'btn btn-danger btn-remove-row');
			    element0.onclick = function() {  
			        removeRow(btnName);  
			    }  
			    cell0.appendChild(element0);

		        //Column 1
		        var tipe = ["PULSA","PAKET NELPON","PAKET SMS","DATA","PLN"];
		        var cell1 = row.insertCell(1);  
		        var element1 = document.createElement("select");
				element1.name = "type[]";
				element1.setAttribute("class","form-control form-input");
				cell1.appendChild(element1);

				for (var i = 0; i < tipe.length; i++) {
				    var option = document.createElement("option");
				    option.value = tipe[i];
				    option.text = tipe[i];
				    element1.appendChild(option);
				}

		        //Column 2  
		        var cell2 = row.insertCell(2);  
		        var element2 = document.createElement("select");
				element2.name = "provider[]";
				element2.setAttribute("class","form-control form-input");
				cell2.appendChild(element2);

				for (var i = 0; i < array.length; i++) {
				    var option = document.createElement("option");
				    option.value = array[i].ID;
				    option.text = array[i].NAME;
				    element2.appendChild(option);
				}

		        //Column 3  
		        var cell3 = row.insertCell(3);  
		        var element3 = document.createElement("input");  
		        element3.setAttribute("class","form-control form-input");
		        element3.type = "text";  
		        element3.name = "kode[]";  
		        cell3.appendChild(element3);

		        //Column 4 
		        var cell4 = row.insertCell(4);  
		        var element4 = document.createElement("input"); 
		        element4.setAttribute("class","form-control form-input"); 
		        element4.type = "text";  
		        element4.name = "nama[]";  
		        cell4.appendChild(element4);

		        //Column 5
		        var cell5 = row.insertCell(5);  
		        var element5 = document.createElement("input"); 
		        element5.setAttribute("class","form-control form-input t-right"); 
		        element5.type = "text";  
		        element5.name = "harga_modal[]";
		        element5.onkeyup = function() {  
			        element5.value = formatRupiah(element5.value, '');
			    }
		        cell5.appendChild(element5); 

		        //Column 6
		        var cell6 = row.insertCell(6);  
		        var element6 = document.createElement("input"); 
		        element6.setAttribute("class","form-control form-input t-right"); 
		        element6.type = "text";  
		        element6.name = "harga_jual[]";
		        element6.onkeyup = function() {  
			        element6.value = formatRupiah(element6.value, '');
			    }
			    element6.onkeypress = function() {  
			        hanyaAngka(element6.value);
			    }
		        cell6.appendChild(element6);

		        //Column 7
		        var cell7 = row.insertCell(7);  
		        var element7 = document.createElement("textarea");
		        element7.type = "text";  
		        element7.name = "deskripsi[]";  
		        cell7.appendChild(element7); 
    		}
    	});
    }  
      
    function removeRow(btnName) { 
    	try {  
	        var table = document.getElementById('table-input-pulsa');  
	        var rowCount = table.rows.length;  
	        for (var i = 0; i < rowCount; i++) {  
	            var row = table.rows[i];  
	            var rowObj = row.cells[0].childNodes[0];  
	            if (rowObj.name == btnName) {  
	                table.deleteRow(i);  
	                rowCount--;  
	            }  
	        }  
	    } catch (e) {  
	        alert(e);  
	    }  
    } 
</script>