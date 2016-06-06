;(function($){

	//DOM loaded
	$(function(){
	
		function getAJAX(setType, setUrl, setDataType, setHandler, setData) {
			var setType = setType || 'GET',
				setUrl = setUrl || '/',
				setData = setData || '',
				setDataType = setDataType || 'html';
			
			$.ajax({
				type: setType,
				url: setUrl,
				data: setData,
				dataType: setDataType,
				success: setHandler,
				error: function() {
					console.log('Error result');
				}
			});
			
			console.log('success loaded');
		}

		function renderList(data) {
			var list = data.result, 
				result = '';
				
				console.log('run renderList()');
				
				for (var item in list) {
					result += '<div class="item aniamtion">'+
					'<div class="row">'+
					'<div class="col-md-1">'+list[item].id +'</div>'+
					'<div class="col-md-3"><b>'+list[item].name +'</b></div>'+
					'<div class="col-md-2">'+list[item].position +'</div>'+
					'<div class="col-md-2">'+list[item].inner_phone +'</div>'+
					'<div class="col-md-2">'+list[item].outer_phone +'</div>'+
					'<div class="col-md-2">'+list[item].email +'</div>'+
					'</div>'+
					'</div>';
				}
				
				return result;
		}
		
		getAJAX('GET', '/api/v1/phones', 'json', function(data){
			$('#result').html(renderList(data));
		});
		
		
		$('#create-phone').submit(function(){
			getAJAX('POST', 
				'/api/v1/phones', 
				'html', 
				function(result) {
					$('#result').html(result);
					$('.information').show('slow').delay(2000).hide('slow');
				},
				$(this).serialize()
			);
			
			return false;
		});
		
		
	});
	
})(jQuery);