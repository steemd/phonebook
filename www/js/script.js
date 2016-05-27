;(function($){
	
	//DOM loaded
	$(function(){
		
		$.ajax({
			type: 'GET',
			url: '/api/v1/phones',
			dataType: 'json',
			success: function(data) {
				var list = data.result,
					result = '';
				
				for (var item in list) {
					result += '<div class="row"><div class="col-md-3">'+ list[item].id +'</div><div class="col-md-9">'+ list[item].name +'</div></div>';
				}
				
				$('#resalt').html(result);
				
				console.log('OK');
			}
		});
		
		
	});
	
})(jQuery);