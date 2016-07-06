;(function($){
	//DOM loaded
	$(function(){

		function renderList(data, type) {
			var list = data.result,
					type = type || 'site',
					result = '';
					
			if (type == 'site') {
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
			} else if (type == 'admin') {
				for (var item in list) {
					result += '<div class="item aniamtion">'+
					'<div class="row">'+
					'<div class="col-md-1">'+list[item].id +'</div>'+
					'<div class="col-md-3 name-item">'+list[item].name +'</div>'+
					'<div class="col-md-2">'+list[item].inner_phone +'</div>'+
					'<div class="col-md-2">'+list[item].outer_phone +'</div>'+
					'<div class="col-md-2">'+list[item].email +'</div>'+
					'<div class="col-md-2"><batton class="btn btn-default phone-delete-btn" data-id="'+list[item].id+'"><span class="glyphicon glyphicon-trash"></span> Delete</batton><a href="/admin/phone/update/'+list[item].id +'" class="btn btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</a></div>'+
					'</div>'+
					'</div>';
				}
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
		
		function submitData(formEl, url, type) {
			var type = type || 'POST';
			
			$(formEl).on('submit', function(){
				var formId,
					formData = $(this).serialize();
				
				if ($(this).serializeArray()[0].name == 'id') {
					formId = '/'+$(this).serializeArray()[0].value;
				} else {
					formId = '';
				}
					
				$.ajax({
					type: type,
					url: url+formId,
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

		function toggleInfo(btn, block) {
			$(btn).click(function() {
				$(block).toggleClass('hidden');
			});
			return false;
		}
		
		function deletePhone(btn){
			console.log('run delete handler');
			
			$(btn).on('click', function(){
				var id = this.getAttribute('data-id');
				
				if(confirm('Y realy vont delete '+ id +' element')){
					$.ajax({
						type: 'DELETE',
						url: '/api/v1/phones/'+id,
						dataType: 'html',
						success: function(result) {
							$('#response').html(result);
							$('.information').show('slow').delay(2000).hide('slow');
						}
					});
					
					$.ajax({
						type: 'GET',
						url: '/api/v1/phones',
						dataType: 'json',
						success: function(data){
							$('#list-result').html(renderList(data, 'admin'));
							deletePhone('.phone-delete-btn');
						},
						error: function() {
							console.log('Error result');
						}
					});
				}
				
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
					$('#list-result').html(renderList(data, 'admin'));
					deletePhone('.phone-delete-btn');
				},
				error: function() {
					console.log('Error result');
				}
			});
		});

		toggleInfo('.search-btn', '.search-block');
		toggleInfo('.category-btn', '.category-block');
		
		searchForm('#search-name', '.name-item');
		searchForm('#search-position', '.position-item');
		
		submitData('#create-phone', '/api/v1/phones');
		submitData('#update-phone', '/api/v1/phones', 'PUT');

		
	});
})(jQuery);