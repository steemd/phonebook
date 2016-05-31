;(function($){

	//DOM loaded
	$(function(){
		
		$.ajax({
			type: 'GET',
			url: '/api/v1/phones',
			dataType: 'json',
			success: function(data) {
				$('#resalt').html(renderList(data));
			}
		});
		
		function renderList(data) {
			var list = data.result, result = '';
				
				for (var item in list) {
					result += '<div class="row item aniamtion">'+
					'<div class="col-md-1">'+list[item].id +'</div>'+
					'<div class="col-md-3"><b>'+list[item].name +'</b></div>'+
					'<div class="col-md-2">'+list[item].position +'</div>'+
					'<div class="col-md-2">'+list[item].inner_phone +'</div>'+
					'<div class="col-md-2">'+list[item].outer_phone +'</div>'+
					'<div class="col-md-2">'+list[item].email +'</div>'+
					'</div>';
				}
				
				return result;
		}
		
		$('#create-phone').submit(function(){
			data = $(this).serialize();
			
			$.ajax({
				type: 'POST',
				url: '/api/v1/phones',
				data: data,
				success: function(result) {
					$('#result').html(result);
					$('.information').show('slow').delay(2000).hide('slow');
				}
			});
			return false;
		});
		
		
	});
	
})(jQuery);