;(function($){
	//DOM loaded
	$(function(){

		function renderList(data) {
			var list = data.result, 
				result = '';
			for (var item in list) {
				result += '<div class="item aniamtion">'+
				'<div class="row">'+
				'<div class="col-md-1">'+list[item].id +'</div>'+
				'<div class="col-md-3 name-item">'+list[item].name +'</div>'+
				'<div class="col-md-2 position-item">'+list[item].position +'</div>'+
				'<div class="col-md-2">'+list[item].inner_phone +'</div>'+
				'<div class="col-md-2">'+list[item].outer_phone +'</div>'+
				'<div class="col-md-2">'+list[item].email +'</div>'+
				'</div>'+
				'</div>';
			}
			return result;
		}
		
		function searchForm(formEl, searchEl) {	
			$(formEl).on('keyup', function(obj){
				var searchText = this.value.toLowerCase();
				$(searchEl).each(function(index, el){
					var text = this.innerHTML.toLowerCase(),
						parent = this.parentNode.parentNode;
					
					if(text.indexOf(searchText) < 0) {
						parent.style.display = 'none';					
					} else {
						parent.style.display = 'block';
					}	
				});
			});			
		}
		
		function submitData(formEl, url) {
			
			$(formEl).on('submit', function(){
				var formData = $(this).serialize();
				$.ajax({
					type: 'POST',
					url: url,
					data: formData,
					dataType: 'html',
					success: function(result) {
						$('#result').html(result);
						$('.information').show('slow').delay(2000).hide('slow');
					}
				});
				return false;
			});
			
		}
		
		
		$(window).on('load', function(){
			$('#search-name').val('');
			
			$.ajax({
				type: 'GET',
				url: '/api/v1/phones',
				dataType: 'json',
				success: function(data){
					$('#result').html(renderList(data));
				},
				error: function() {
					console.log('Error result');
				}
			});
		});
		
		searchForm('#search-name', '.name-item');
		searchForm('#search-position', '.position-item');
		
		submitData('#create-phone', '/api/v1/phones');
		
	});
})(jQuery);