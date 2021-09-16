<?php
	session_start();

	if (isset($_SESSION['userid'])) 
	{
		$id = $_SESSION['userid'];
	}
	else
	{
		header("location:index");
		exit();
	}

	require 'dbconnect.php';

	$qry = "SELECT * FROM users_tbl WHERE id='".$id."' ";
	$rs = mysqli_query($conn,$qry);
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

	<!-- CUSTOM JQUERY -->
	<script type="text/javascript" src="js/custom.js"></script>

</head>
<body>
	<!-- header start -->
	<header>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-black">
			<img src="media/logo.png" class="img-fluid" width="193">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#drop" aria-controls="drop" aria-expanded="false">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="drop">
  				<ul class="navbar-nav ml-auto my-navs">
  					<li class="nav-item">
  						<a href="index" class="nav-link px-3">Home</a>
  					</li>
  					<li class="nav-item">
  						<a href="news" class="nav-link px-3">News</a>
  					</li>
  					<li class="nav-item">
  						<a href="tips-tricks" class="nav-link px-3">Tips & Tricks</a>
  					</li>
  					<li class="nav-item dropdown active">
  						<a href="#" class="nav-link dropdown-toggle px-3" id="dropmore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
  						<div class="dropdown-menu" aria-labelledby="dropmore">
  							<a href="share-your-post" class="dropdown-item">Share Your Post</a>
  							<?php
  								if(isset($_SESSION['userid'])){
								echo '<a href="profile" class="dropdown-item search-class active">Profile</a>';
								echo '<a href="bookmark" class="dropdown-item search-class">Bookmark</a>';}
							?>
  							<a href="#" class="dropdown-item search-class" id="search-txt">Search</a>
  							<a href="about-us" class="dropdown-item">About Us</a>
  							<a href="contact-us" class="dropdown-item ">Contact Us</a>
  						</div>
  					</li>
  					<?php
  					if(isset($_SESSION['userid'])){
					echo '
  					<li class="nav-item">
  						<a href="logout" class="nav-link pr-0 pl-3">Logout</a>
  					</li>';
					}else{
					echo '
  					<li class="nav-item">
  						<a href="sign-in" class="nav-link pr-0 pl-3">Login</a>
  					</li>';
					}
					?>
  				</ul>
  			</div>
		</nav>
	</header>
	<!-- header end -->
	<!-- main start -->
	<main style="padding-top: 72px">
		<div class="container">
			<section class="main-section">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<form method="get" class="form-search-box mb-4 d-none" id="search-box">
							<div class="row">
								<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
  									<input type="text" name="search" placeholder="Search..." class="form-control theme-txtbox mr-2">
  								</div>
								<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
  									<button type="submit" class="btn btn-block theme-btn">Search</button>
  								</div>
  							</div>
						</form>
					</div>
				</div>
				<!-- profile start -->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="share-post-section">
							<h3 class="page-title">Profile <i class="fas fa-user"></i></h3>
							<div class="row">
							<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
							<?php
								if (mysqli_num_rows($rs)==1) 
								{
									while ($row=mysqli_fetch_assoc($rs)) 
									{
										if ($row) 
										{
								?>
								<div class="profile-section">
									<?php echo '<img src="data:image/jpeg;base64, '.base64_encode($row['dp']).'" class="img-fluid profile-pic d-md-inline-block d-lg-inline-block d-xl-inline-block" width="150">'; ?>
									<h4 class="text-xl-left text-lg-left text-md-left text-center" style="margin-bottom: 30px;"><?php echo $row['fullname'] ?></h4>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
								<form method="post" class="edit-profile-form" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
									<div class="form-group">
										<label class="form-label">Email address</label>
										<div class="form-inline">
											<input type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Email address" class="form-control theme-txtbox" required>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Phone number</label>
										<div class="form-inline">
											<input type="number" name="phone-no" value="<?php echo $row['mobile'] ?>" placeholder="Phone number" class="form-control theme-txtbox" required>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Profile Picture</label>
										<input type="file" name="dp" id="real-file4" hidden="hidden" required>
										<button type="button" class="btn input-file-btn" id="custom-button4">Change Profile Pic</button>
										<span class="input-file-preview pl-2" id="custom-text4">No image chosen</span>
										<script type="text/javascript">
											const realFileBtn4 = document.getElementById("real-file4");
											const customBtn4 = document.getElementById("custom-button4");
											const customTxt4 = document.getElementById("custom-text4");

											customBtn4.addEventListener("click", function()
											{
												realFileBtn4.click();
											});

											realFileBtn4.addEventListener("change", function()
											{
												if (realFileBtn4.value)
												{
    												customTxt4.innerHTML = realFileBtn4.value.match
    												(
      													/[\/\\]([\w\d\s\.\-\(\)]+)$/
    												)[1];
  												}
  												else
  												{
    												customTxt4.innerHTML = "No image chosen";
												}
											});
										</script>
									</div>
									<?php
												}
											}
										}
									?>
									<div class="form-group mb-0 mt-2">
										<button type="submit" name="submit" class="btn theme-btn mr-2">Save Profile</button>
										<a href="#" class="btn theme-btn theme-btn-inverse ml-2" id="change-pass">Change Password</a>
									</div>
								</form>
								<?php
									if (isset($_POST['submit'])) 
									{
										$id     = $_POST['id'];
										$email  = $_POST['email'];
										$mobile = $_POST['phone-no'];
										$dp     = addslashes(file_get_contents($_FILES["dp"]["tmp_name"]));

										$qry = "UPDATE users_tbl SET email='".$email."',mobile='".$mobile."',dp='".$dp."' WHERE id=$id";

										$rs=mysqli_query($conn,$qry);
										if ($rs) 
										{
											echo '<script>window.location.href = "profile"</script>';
										}
									}
								?>
								<form method="post" class="change-password-form d-none">
									<div class="form-group">
										<label class="form-label">Current Password</label>
										<div class="form-inline">
											<input type="password" name="current-password" placeholder="Current Password" class="form-control theme-txtbox">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">New Password</label>
										<div class="form-inline">
											<input type="password" name="new-password" placeholder="New Password" class="form-control theme-txtbox">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Confirm Password</label>
										<div class="form-inline">
											<input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control theme-txtbox">
										</div>
									</div>
									<div class="form-group mb-0 mt-2">
										<button type="submit" name="submitbtn" class="btn theme-btn mr-2">Change Password</button>
										<a href="#" class="btn theme-btn theme-btn-inverse ml-2" id="edit-pro">Edit Profile</a>
									</div>
								</form>
								<?php
									require 'dbconnect.php';

									if (isset($_POST['submitbtn'])) 
									{
										$password = $_POST['current-password'];
										$newpass  = $_POST['new-password'];
										$conpass  = $_POST['confirm-password'];

										if ($newpass==$conpass) 
										{
											$qry = "SELECT * FROM users_tbl WHERE password='".$password."' AND id='".$id."' AND status='Active' ";

											$rs=mysqli_query($conn,$qry);

											if (mysqli_num_rows($rs)>0) 
											{
												$row=mysqli_fetch_assoc($rs);

												if ($password==$row['password']) 
												{
													$qry1 = "UPDATE users_tbl SET password='".$conpass."' WHERE id=$id";
													$rs1=mysqli_query($conn,$qry1);
													if ($rs1) 
													{
														echo '<script>window.location.href = "profile"</script>';
													}
												}
												else
												{
				
												}
											}
											else
											{
												echo '<script> alert ("Wrong password")</script>';
											}
										}
										else
										{
											echo '<script> alert ("Password Dose not Match")</script>';
										}
									}
								?>
							</div>
						</div>
						</div>
					</div>
				</div>
				<!-- profile end -->
			</section>
		</div>
	</main>
	<!-- main end -->
	<!-- footer start -->
	<footer>
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<img src="media/logo.png" class="img-fluid d-block d-md-inline-block d-lg-inline-block d-xl-inline-block my-0 mx-auto" width="230">
					</div>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="footer-social mt-4 mt-md-0 mt-lg-0 mt-xl-0 text-center text-md-right text-lg-right text-xl-right">
							<a href="" class="footer-social-icon" style="font-size: 23px;"><i class="fab fa-facebook-f"></i></a>
							<a href="" class="footer-social-icon"><i class="fab fa-instagram"></i></a>
							<a href="" class="footer-social-icon"><i class="fab fa-twitter"></i></a>
							<a href="" class="footer-social-icon"><i class="fab fa-youtube"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="footer-nav mt-4 mt-md-4 mt-lg-4 mt-xl-4 text-center">
							<a href="index" class="footer-nav-link">Home</a>
							<a href="about-us" class="footer-nav-link">About Us</a>
							<a href="contact-us" class="footer-nav-link">Contact Us</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="mt-4 mt-md-4 mt-lg-4 mt-xl-4 text-center">
							<p class="mb-0" style="font-size: 14px; color: #afafaf;">Copyright © 2019 <span style="color: #22ff66;">Tech Notify</span>, All rights Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer end -->
</body>
</html>