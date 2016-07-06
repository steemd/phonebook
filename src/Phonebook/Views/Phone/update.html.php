<div class="wrapper">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Phonebook</a> - 
				<a href="/admin" class="btn btn-primary">Admin Panel</a> - 
				<a href="/admin/phone/list" class="btn btn-primary">Phone list</a> - 
				<b>Update Phone</b>
			</div>
			<div class="col-md-6">
				<a href="/logout" class="btn btn-primary pull-right">Logout</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h1>Update Phone:</h1>
		<div id="result" class="bg-success information"></div>
		<form id="update-phone">
			<input type="text" hidden name="id" value="<?php echo $id; ?>" >
			<div class="form-group">
				<label for="InputName">Name</label>
				<input type="text" name="name" class="form-control" id="InputName" placeholder="Name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="InputPosition">Position</label>
				<input type="text" name="position" class="form-control" id="InputPosition" placeholder="Position" value="<?php echo $position; ?>">
			</div>
			<div class="form-group">
				<label for="InputInnerPhone">Inner Phone</label>
				<input type="text" name="inner_phone" class="form-control" id="InputInnerPhone" placeholder="Inner phone" value="<?php echo $inner_phone; ?>">
			</div>
			<div class="form-group">
				<label for="InputOuterPhone">Outer Phone</label>
				<input type="text" name="outer_phone" class="form-control" id="InputOuterPhone" placeholder="Outer Phone" value="<?php echo $outer_phone; ?>">
			</div>
			<div class="form-group">
				<label for="InputAuditory">Auditory</label>
				<input type="text" name="auditory" class="form-control" id="InputAuditory" placeholder="Auditory" value="<?php echo $auditory; ?>">
			</div>
			<div class="form-group">
				<label for="InputEmail">Email</label>
				<input type="text" name="email" class="form-control" id="InputEmail" placeholder="Email" value="<?php echo $email; ?>">
			</div>
			<div class="form-group">
				<label>Catogory</label>
				<select name="category_id" class="form-control">
					<option <?php echo ($category_id == 1) ? 'selected' : '' ?> value="1">Category Name One</option>
					<option <?php echo ($category_id == 2) ? 'selected' : '' ?> value="2">Category Name Two</option>
					<option <?php echo ($category_id == 3) ? 'selected' : '' ?> value="3">Category Name Three</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
<script src="/www/js/script.js"></script>
