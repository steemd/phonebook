<div class="wrapper">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Phonebook</a> - 
				<a href="/admin" class="btn btn-primary">Admin Panel</a> - 
				<b>Add Page</b>
			</div>
			<div class="col-md-6">
				<a href="/logout" class="btn btn-primary pull-right">Logout</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h1>Add Page:</h1>
		<div id="result" class="bg-success information"></div>
		<form id="create-page">
			<div class="form-group">
				<label for="InputTitle">Title</label>
				<input type="text" name="title" class="form-control" id="InputTitle" placeholder="Title">
			</div>
			<div class="form-group">
				<label for="InputText">Text</label>
				<input type="text" name="text" class="form-control" id="InputText" placeholder="Text">
			</div>


			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>



