<div class="wrapper">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Phonebook</a> - 
				<a href="/admin" class="btn btn-primary">Admin Panel</a> - 
				<b>Add Category</b>
			</div>
			<div class="col-md-6">
				<a href="/logout" class="btn btn-primary pull-right">Logout</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h1>Add Category:</h1>
		<div id="result" class="bg-success information"></div>
		<form id="create-category">
			<div class="form-group">
				<label for="InputName">Name</label>
				<input type="text" name="name" class="form-control" id="InputName" placeholder="Name">
			</div>
			<div class="form-group">
				<label>Parent catogory</label>
				<select name="parent_id" class="form-control">
					<option value="0">Parent</option>
					<option value="1">Category Name One</option>
					<option value="2">Category Name Two</option>
					<option value="3">Category Name Three</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>
<script src="/www/js/script.js"></script>
