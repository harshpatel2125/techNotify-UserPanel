<?php
	session_start();

	if (isset($_SESSION['userid'])) 
	{
		echo '<script>javascript:history.back()</script>';
	}
	else
	{

		$emailerr = "";
		$passerr = "";
		if (isset($_COOKIE['user'])) 
		{
			$username = $_COOKIE['username'];
			$password = $_COOKIE['password'];
		}
		else
		{
			$username="";
			$password="";
		}
?>
<?php  
	$conn = mysqli_connect("localhost","root","","technotify");

	if (isset($_POST['submit'])) 
	{

		$email  = $_POST['email-or-phone'];
		$mobile = $_POST['email-or-phone'];
		$pass   = $_POST['password'];

		$qry = "SELECT * FROM users_tbl WHERE (email='".$email."' OR mobile='".$mobile."') AND status='Active'";
		$rs=mysqli_query($conn,$qry);
		if (mysqli_num_rows($rs)==1) 
		{
			$row=mysqli_fetch_assoc($rs);
			$user     = $row['email'];
			$password = $row['password'];
			$_SESSION['userid']   =$row['id'];
			$_SESSION['fullname'] =$row['fullname'];
			$_SESSION['email']    =$row['email'];
			$_SESSION['password'] =$row['password'];
			$_SESSION['userdp']   =$row['dp'];

			if (md5($pass) == $password) 
			{

				if (isset($_POST['remember-me'])) 
				{
					setcookie("username",$email,time() + (86400 * 30), "/");
					setcookie("password",$pass,time() + (86400 * 30), "/");
				}

				echo '<script>javascript:history.back()</script>';
			}
			else
			{
				$passerr = "Wrong password";
			}		
		}
		else
		{
			$emailerr = "Couldn't find your account";
		}
	}
?>

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
		<h3 class="signin-txt">Sign in</h3>
		<form method="post">
			<input type="text" name="email-or-phone" value="<?php echo $username; ?>" placeholder="Email or Phone" class="form-control theme-txtbox" required>
			<?php 
				if (!empty($emailerr)) 
				{
			?>
				<small class="form-text text-muted ml-2" style="color: #afafaf !important;"><?php echo $emailerr ?></small>
			<?php
				}
			?>
			<input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password" class="form-control theme-txtbox" style="margin-top: 20px;" required>
			<?php 
				if (!empty($passerr)) 
				{
			?>
				<small class="form-text text-muted ml-2" style="color: #afafaf !important;">Wrong password</small>
			<?php
				}
			?>
			<div class="custom-control custom-checkbox ml-1" style="margin-top: 20px; margin-bottom: 20px;">
				<input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me">
				<label for="remember-me" class="custom-control-label theme-chkbox text-white">Remember me</label>
			</div>
			<button type="submit" name="submit" class="btn btn-block theme-btn" style="margin-bottom: 15px;">Sign in</button>
			<div class="row">
				<div class="col pr-0"><a href="sign-up.php" class="text-link">Create Account</a></div>
				<div class="col pl-0"><a href="forgot-password.php" class="text-link">Forgot Password?</a></div>
			</div>
		</form>
	</div>
</body>
</html>
<?php
	}
?>