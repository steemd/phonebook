<div class="wrapper">
	<div class="header">
		<div class="row">
			<div class="col-md-6">
				<a href="/" class="btn"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Phonebook</a>
			</div>
			<div class="col-md-6">
				<a href="/admin" class="btn btn-primary pull-right">Admin panel</a>
				<a href="#" class="btn search-btn pull-right"><span class="glyphicon glyphicon-search"></span> Search form</a>
				<a href="#" class="btn category-btn pull-right"><span class="glyphicon glyphicon-th-list"></span> Categories</a>
				<a href="#" class="btn page-btn pull-right"><span class="glyphicon glyphicon-info-sign"></span> Information</a>
			</div>
		</div>
	</div>
	<div class="info-block">
		<div class="container category-block hidden">
			<a href="#" class="category-btn close-btn"><span class="glyphicon glyphicon-remove"></span></a>
			<div class="row">
				<div class="col-md-12">
					<h3>Caregories list:</h3>
					<ul>
						<li>Categoty item 1</li>
						<li>Categoty item 2</li>
						<li>Categoty item 3</li>
						<li>Categoty item 4</li>
						<li>Categoty item 5</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="info-block">
		<div class="container search-block hidden">
			<a href="#" class="search-btn close-btn"><span class="glyphicon glyphicon-remove"></span></a>
			<div class="row">
				<div class="col-md-12">
					<h3>Search form:</h3>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="sr-only" for="search-name">Name</label>
						<input type="text" class="form-control" id="search-name" placeholder="Enter name">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="sr-only" for="search-position">Position</label>
						<input type="text" class="form-control" id="search-position" placeholder="Enter position">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="sr-only" for="search-inner-phone">Position</label>
						<input type="text" class="form-control" id="search-inner-phone" placeholder="Enter position">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="sr-only" for="search-outer-phone">Position</label>
						<input type="text" class="form-control" id="search-outer-phone" placeholder="Enter position">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="sr-only" for="search-email">Position</label>
						<input type="text" class="form-control" id="search-email" placeholder="Enter position">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="item-title">
			<div class="row">
				<div class="col-md-1">ID</div>
				<div class="col-md-3">Name</div>
				<div class="col-md-2">Position</div>
				<div class="col-md-2">Inner Phone</div>
				<div class="col-md-2">Outer Phone</div>
				<div class="col-md-2">Email</div>
			</div>
		</div>
		<div id="result">Loading...</div>
	</div>
</div>
