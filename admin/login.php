<!DOCTYPE html>
<html>
<head>
	<title>Meranda|Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="./dist/css/login.css">
</head>
<body>
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	  	<div class="modal-dialog">
			<div class="loginmodal-container">
				<h1>Login</h1><br>
			  	<form action="./Handlers/AccountHandler.php" method="POST">
					<input type="text" name="username" id="username" placeholder="Username">
					<input type="password" name="password" id="password" placeholder="Password">
					<input type="submit" name="action" class="login loginmodal-submit" value="Login">
				</form>

			  	<!-- <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
			  	</div> -->
			</div>
		</div>
	</div>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#login-modal').modal('show');
		})
	</script>
</body>
</html>
