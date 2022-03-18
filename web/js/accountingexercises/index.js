function toggle(obj)
{
	url = $(obj).attr('href');
	$.ajax({
		url: url,
			method: "POST",
			success:function(data){			
				$.pjax.reload({
					timeout: 5000,
				   	type: 'GET',
				   container:'#crud-datatable-pjax'
			   });				
			},
			error: function(data) { // if error occured	
				
			},
			dataType:'html'
		});	
	return false;
}