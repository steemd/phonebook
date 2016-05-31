<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phonebook v1</title>
	<link rel="stylesheet" href="/www/css/bootstrap.min.css">
	<link rel="stylesheet" href="/www/css/style.css">
</head>
<body>
	<div class="container">
	<div class="wrapper">
		<h1>Admin Panel</h1>
		<form method="POST">
			<div class="form-group">
				<label for="InputLogin">Login</label>
				<input type="text" name="login" class="form-control" id="InputLogin" placeholder="Login" required>
			</div>
			<div class="form-group">
				<label for="InputPass">Pass</label>
				<input type="password" name="pass" class="form-control" id="InputPass" placeholder="Pass" required>
			</div>

			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
	</div>
</body>
</html>