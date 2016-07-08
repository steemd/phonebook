<div class="wrapper">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Phonebook</a> - 
				<a href="/admin" class="btn btn-primary">Admin Panel</a> - 
				<a href="/admin/category/list" class="btn btn-primary">Category list</a> - 
				<b>Update Category</b>
			</div>
			<div class="col-md-6">
				<a href="/logout" class="btn btn-primary pull-right">Logout</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h1>Update Category:</h1>
		<div id="result" class="bg-success information"></div>
		<form id="update-category">
			<input type="text" hidden name="id" value="<?php echo $category['id']; ?>" >
			<div class="form-group">
				<label for="InputName">Name</label>
				<input type="text" name="name" class="form-control" id="InputName" placeholder="Name" value="<?php echo $category['name']; ?>">
			</div>
			<div class="form-group">
				<label>Parent Catogory</label>
				<select name="category_id" class="form-control">
					<option value="0">Parent</option>
					<?php 	
						foreach($categories as $val){
							if ($val['id'] == $category['parent_id']) {
								$selected = 'selected';
							} else {
								$selected = '';
							}
							echo '<option '.$selected.' value="'.$val['id'].'">'.$val['name'].'</option>';
						}
					?>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>