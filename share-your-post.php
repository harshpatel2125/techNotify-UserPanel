<?php
	session_start();

	if (isset($_SESSION['userid'])) 
	{
		$id = $_SESSION['userid'];
	}
	else
	{
		header("location:sign-in");
		exit();
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
  							<a href="share-your-post" class="dropdown-item active">Share Your Post</a>
  							<?php
  								if(isset($_SESSION['userid'])){
								echo '<a href="profile" class="dropdown-item search-class">Profile</a>';
								echo '<a href="bookmark" class="dropdown-item search-class">Bookmark</a>';}
							?>
  							<a href="#" class="dropdown-item search-class" id="search-txt">Search</a>
  							<a href="about-us" class="dropdown-item">About Us</a>
  							<a href="contact-us" class="dropdown-item">Contact Us</a>
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
				<!-- share your post start -->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="share-post-section">
							<h3 class="page-title">Share Your Post <i class="far fa-newspaper"></i></h3>
							<form method="post" enctype="multipart/form-data">
								<div class="form-group">
								<label class="form-label">Post Title</label>
								<input type="text" name="post-title" placeholder="Enter the Title of Post" class="form-control theme-txtbox" required>
							</div>
							<div class="form-group">
								<label class="form-label">Post Content</label>
								<textarea name="post-content-1" placeholder="Enter the Content of Post 1" class="form-control theme-txtbox mb-3" required></textarea>
								<textarea name="post-content-2" placeholder="Enter the Content of Post 2" class="form-control theme-txtbox mb-3"></textarea>
								<textarea name="post-content-3" placeholder="Enter the Content of Post 3" class="form-control theme-txtbox mb-3"></textarea>
							</div>
							<div class="form-group">
								<label class="form-label">Post Images</label>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3 mb-md-0 mb-lg-0 mb-xl-0">
										<input type="file" name="img1" id="real-file5" hidden="hidden">
										<button type="button" class="btn input-file-btn" id="custom-button5">Select Image 1</button>
										<span class="input-file-preview pl-2" id="custom-text5">No image chosen</span>
										<script type="text/javascript">
											const realFileBtn5 = document.getElementById("real-file5");
											const customBtn5 = document.getElementById("custom-button5");
											const customTxt5 = document.getElementById("custom-text5");

											customBtn5.addEventListener("click", function()
											{
												realFileBtn5.click();
											});

											realFileBtn5.addEventListener("change", function()
											{
												if (realFileBtn5.value)
												{
    												customTxt5.innerHTML = realFileBtn5.value.match
    												(
      													/[\/\\]([\w\d\s\.\-\(\)]+)$/
    												)[1];
  												}
  												else
  												{
    												customTxt5.innerHTML = "No image chosen";
												}
											});
										</script>
									</div>
									<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3 mb-md-0 mb-lg-0 mb-xl-0">
										<input type="file" name="img2" id="real-file6" hidden="hidden">
										<button type="button" class="btn input-file-btn" id="custom-button6">Select Image 2</button>
										<span class="input-file-preview pl-2" id="custom-text6">No image chosen</span>
										<script type="text/javascript">
											const realFileBtn6 = document.getElementById("real-file6");
											const customBtn6 = document.getElementById("custom-button6");
											const customTxt6 = document.getElementById("custom-text6");

											customBtn6.addEventListener("click", function()
											{
												realFileBtn6.click();
											});

											realFileBtn6.addEventListener("change", function()
											{
												if (realFileBtn6.value)
												{
    												customTxt6.innerHTML = realFileBtn6.value.match
    												(
      													/[\/\\]([\w\d\s\.\-\(\)]+)$/
    												)[1];
  												}
  												else
  												{
    												customTxt6.innerHTML = "No image chosen";
												}
											});
										</script>
									</div>
								</div>
							</div>
							<div class="form-group mb-0 mt-5 text-center">
								<button type="submit" name="submit" class="btn theme-btn mr-2">Send</button>
								<button type="reset" onclick="location.href='javascript:history.go(-1)'" class="btn theme-btn-red ml-2">Cancel</button>
							</div>
							</form>
							<?php 
								require 'dbconnect.php';
								if (isset($_POST['submit'])) 
								{

									$posttitle    =  $_POST['post-title'];
									$postcontent1 =  $_POST['post-content-1'];
									$postcontent2 =  $_POST['post-content-2'];
									$postcontent3 =  $_POST['post-content-3'];
									$name         =  $_SESSION['fullname'];
									$status       =  "Active";
									$doi          =  date("y-m-d H:i:s");
									$img1         =  $_FILES["img1"]["name"];
									$img2         =  $_FILES["img2"]["name"];
									$target1 = "C:/xampp\htdocs/technotify/AdminPanel/userpost/".basename($_FILES['img1']['name']);
									$target2 = "C:/xampp\htdocs/technotify/AdminPanel/userpost/".basename($_FILES['img2']['name']);

									$qry = "INSERT INTO userposts_tbl (title,content1,content2,content3,img1,img2,name,userid,doi,status) VALUES('".$posttitle."','".$postcontent1."','".$postcontent2."','".$postcontent3."','".$img1."','".$img2."','".$name."','".$id."','".$doi."','".$status."')";

									$rs = mysqli_query($conn,$qry);

									move_uploaded_file($_FILES['img1']['tmp_name'], $target1);
									move_uploaded_file($_FILES['img2']['tmp_name'], $target2);

									if ($rs) 
									{
										echo '<script> alert ("Thanks for Your Idea.")</script>';
									}
								}
							?>
							</div>
						</div>
					</div>
				</div>
				<!-- share your post end -->
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