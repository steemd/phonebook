<div class="wrapper">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Phonebook</a> - 
				<a href="/admin" class="btn btn-primary">Admin Panel</a> - 
				<a href="/admin/page/list" class="btn btn-primary">Page list</a> - 
				<b>Update Page</b>
			</div>
			<div class="col-md-6">
				<a href="/logout" class="btn btn-primary pull-right">Logout</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h1>Update Page:</h1>
		<div id="result" class="bg-success information"></div>
		<form id="update-page">
			<input type="text" hidden name="id" value="<?php echo $page['id']; ?>" >
			<div class="form-group">
				<label for="InputTitle">Title</label>
				<input type="text" name="title" class="form-control" id="InputTitle" placeholder="Title" value="<?php echo $page['title']; ?>">
			</div>
			<div class="form-group">
				<label for="InputText">Text</label>
				<input type="text" name="text" class="form-control" id="InputText" placeholder="Text" value="<?php echo $page['text']; ?>">
			</div>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>