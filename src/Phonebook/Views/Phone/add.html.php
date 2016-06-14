<div class="container">
<div class="wrapper">
	<div class="row">
		<div class="col-md-6"><b>Admin Panel - Phones</b>	</div>
		<div class="col-md-6"><a href="logout" class="btn btn-primary pull-right">Logout</a></div>
	</div>
	<div id="result" class="bg-success information"></div>
	<form id="create-phone">
		<div class="form-group">
			<label for="InputName">Name</label>
			<input type="text" name="name" class="form-control" id="InputName" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="InputPosition">Position</label>
			<input type="text" name="position" class="form-control" id="InputPosition" placeholder="Position">
		</div>
		<div class="form-group">
			<label for="InputInnerPhone">Inner Phone</label>
			<input type="text" name="inner_phone" class="form-control" id="InputInnerPhone" placeholder="Inner phone">
		</div>
		<div class="form-group">
			<label for="InputOuterPhone">Outer Phone</label>
			<input type="text" name="outer_phone" class="form-control" id="InputOuterPhone" placeholder="Outer Phone">
		</div>
		<div class="form-group">
			<label for="InputAuditory">Auditory</label>
			<input type="text" name="auditory" class="form-control" id="InputAuditory" placeholder="Auditory">
		</div>
		<div class="form-group">
			<label for="InputEmail">Email</label>
			<input type="text" name="email" class="form-control" id="InputEmail" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Catogory</label>
			<select name="category_id" class="form-control">
				<option value="1">Category Name One</option>
				<option value="2">Category Name Two</option>
				<option value="3">Category Name Three</option>
			</select>
		</div>

		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
