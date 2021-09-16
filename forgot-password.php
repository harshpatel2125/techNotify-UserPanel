<!DOCTYPE html>
<html lang="en">
<head>

	<title>Tech Notify</title>
	<link rel="icon" type="image/png" href="media/bell.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CUSTOM CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- MODIFIED BOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="css/modified-bootstrap.css">

	<!-- BOOTSTRAP CSS 4.3.1 -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- FONT AWESOME CSS 5.7.2 -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

	<!-- JQUERY SLIM JS 3.3.1 -->
	<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>

	<!-- POPPER JS 1.14.7 -->
	<script type="text/javascript" src="js/popper-1.14.7.min.js"></script>

	<!-- BOOTSTRAP JS 4.3.1 -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<style type="text/css">
		html
		{
			height: 100%;
		}
		body
		{
			height: 100%;
			display: flex;
			-ms-flex-align: center;
			background-color: #ffffff !important;
		}
		.theme-btn
		{
			font-size: 20px !important;
			line-height: 24px !important;
			font-weight: 500 !important;
			color: #000000 !important;
			background-color: #22ff66 !important;
			border-color: #22ff66 !important;
			border-radius: 50px !important;
		}
		.theme-btn:hover
		{
			background-color: #22e066 !important;
			border-color: #22e066 !important;
		}
		.theme-btn:active
		{
			background-color: #22d066 !important;
			border-color: #22d066 !important;
		}
		.theme-btn:focus
		{
			box-shadow: 0 0 0 0.2rem rgba(34,255,102,.5) !important;
		}
	</style>

</head>
<body>
	<div class="signin-form">
		<div class="brand-logo" style="margin-bottom: 30px;">
			<img src="media/logo.png" class="img-fluid d-block my-0 mx-auto" width="230">
		</div>
		<h4 class="signin-txt">Account Recovery</h4>
		<form method="post">
			<input type="text" name="email-or-phone" placeholder="Email or Phone" class="form-control theme-txtbox" required>
			<small class="form-text text-muted ml-2" style="color: #afafaf !important;">Couldn't find your account</small>
			<button type="submit" name="submit" class="btn btn-block theme-btn" style="margin-top: 20px; margin-bottom: 15px;">Next</button>
			<a href="sign-in" class="text-link">Sign in instead</a>
		</form>
	</div>
</body>
</html>