<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modal log in</title>
</head>
<body>
	<div id="modal-login" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2>Sign in to your account:</h2>
					<span>Welcome to the home!</span>
				</div>
				<form action="thank_you_page.html">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" name="user-email" placeholder="Email:" required>
							<span class="fa fa-at"></span>
						</div>				
						<div class="form-group">
							<input type="password" name="password" placeholder="Password:" required>
							<span class="fa fa-lock"></span>
						</div>
						<div class="form-group social-login clearfix">
							<a href="https://www.facebook.com" class="col-md-6 fb-login" target="blank"><span class="fa fa-facebook-square"></span>Facebook login</a>
							<a href="https://plus.google.com" class="col-md-6 google-login" target="blank"><span class="fa fa-google-plus-square"></span>Google login</a>
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group clearfix">
							<span>Don't have an account? <a href="#">Sign Up</a></span>
							<span>Forgot your password? <a href="#">Restore</a></span>
							<button type="submit" class="btn btn-primary">Login</button>					
						</div>
					</div>		
				</form>
			</div>
		</div>
	</div>
</body>
</html>
