// THIS IS JS FILE AND INCLUDES JS FUNCTIONS
function getTableData()
{
	var val;
	var client;
	val = document.getElementById("data_to_fetch").value;
	client = document.getElementById("client").value;
	
	dataStr = 'client=' + client + '&val=' + val;
	
//	alert(dataStr);

	
	$.ajax({
		url: 'ajax/getData.php',
		data: dataStr,
		type: 'POST',
		success: function(obj)
		{
			
			
				
				
			var obj = jQuery.parseJSON( obj );
		
		count = obj.length;
			
			str = "";
			for (i = 0; i <count; i++) {
			str += '<tr><td>' + obj[i]['invoice_num'] + '</td><td>' + obj[i]['invoice_date'] + '</td><td>' + obj[i]['product_description'] + '</td><td>' + obj[i]['qty'] + '</td><td>' + obj[i]['price'] + '</td><td>' + obj[i]['total'] + '</td></tr>';
			
				}
			
				
				$('#dataValuesBody').html(str);
				
		},
		error: function()
		{
			alert('error');
		}
	
	});
	


}