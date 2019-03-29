<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
		<div class="row">
			<div class="col-lg-12">
				<h2>Login</h2>
				<form action="validation.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="Username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="Pass" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
			
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h2>Register</h2>
				<form action="register.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="Username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="Pass" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary">Sign Up</button>
				</form>
			</div>
			
		</div>
	</div>
	</div>

</body>
</html>