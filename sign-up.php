<?php
	session_start();

	if (isset($_SESSION['userid'])) 
	{
		echo '<script>javascript:history.back()</script>';
	}
	else
	{ 
		$emailerr = "";
		$mobileerr = "";
		$passerr = "";
		$conn = mysqli_connect("localhost","root","","technotify");
		if (isset($_POST['submit'])) 
		{
			$fn       =  $_POST['name'];
			$email    =  $_POST['email'];
			$mobile   =  $_POST['phone-no'];
			$pass    =   md5($_POST['password']);
			$cpass    =  md5($_POST['c-password']);
			$doi      =  date("y-m-d H:i:s");
			if ($pass==$cpass) 
			{
				$qry1 = "SELECT * FROM users_tbl WHERE email='".$email."' OR mobile='".$mobile."' ";
				$rs1=mysqli_query($conn,$qry1);
				if (mysqli_num_rows($rs1)>0)
				{
	 				$row = mysqli_fetch_assoc($rs1);
	        		if ($email==$row['email'])
	        		{
	            		$emailerr = "Email address already registered";
	        		}
	        		else 
	        		{
	        			if ($mobile==$row['mobile']) 
	        			{
	            			$mobileerr = "Phone number already registered";
	        			}
	                }
	            }
	            else
	            {
	               	$qry = "INSERT INTO users_tbl (fullname,mobile,email,password,doi,status) VALUES('".$fn."','".$mobile."','".$email."','".$cpass."','".$doi."','Active')";

	            	$rs = mysqli_query($conn,$qry);
	            	if ($rs) 
	            	{
	               		header("location:sign-in");
	               		exit();
	            	}
	            	else
	            	{
						echo '<script>window.location.href = "sign-up"</script>';
	            	}
	           	}
	        }
	       	else
	        {
	           	$passerr = "Passwords did not match";
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
	<div class="signup-form">
		<div class="brand-logo" style="margin-bottom: 30px;">
			<img src="media/logo.png" class="img-fluid d-block my-0 mx-auto" width="230">
		</div>
		<h3 class="signup-txt">Sign up</h3>
		<form method="post">
			<input type="text" name="name" placeholder="Name" class="form-control theme-txtbox" style="margin-bottom: 20px;" required>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-md-1 pr-lg-1 pr-xl-1">
					<input type="email" name="email" placeholder="Email address" class="form-control theme-txtbox" required>
					<?php
						if (!empty($emailerr)) 
						{
					?>
					<small class="form-text text-muted ml-2 mb-3 mb-sm-3 mb-md-0 mb-lg-0 mb-xl-0" style="color: #afafaf !important;">Email address already registered</small>
					<?php
						}
					?>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pl-md-1 pl-lg-1 pl-xl-1">
					<input type="number" name="phone-no" placeholder="Phone number" class="form-control theme-txtbox" required>
					<?php
						if (!empty($mobileerr)) 
						{
					?>
					<small class="form-text text-muted ml-2" style="color: #afafaf !important;">Phone number already registered</small>
					<?php
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-md-1 pr-lg-1 pr-xl-1">
					<input type="password" name="password" placeholder="Password" class="form-control theme-txtbox" style="margin-top: 20px;" required>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pl-md-1 pl-lg-1 pl-xl-1">
					<input type="password" name="c-password" placeholder="Confirm Password" class="form-control theme-txtbox" style="margin-top: 20px;" required>
				</div>
				<?php
					if (!empty($passerr)) 
					{
				?>
				<small class="form-text text-muted ml-4" style="color: #afafaf !important;">Passwords didn't match</small>
				<?php
					}
				?>
			</div>
			<button type="submit" name="submit" class="btn btn-block theme-btn" style="margin-top: 20px; margin-bottom: 15px;">Sign up</button>
			<a href="sign-in" class="text-link">Sign in instead</a>
		</form>
	</div>
</body>
</html>
<?php
}	
?>