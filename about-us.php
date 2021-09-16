<?php
	session_start();

	if (isset($_SESSION['userid'])) 
	{
		$id = $_SESSION['userid'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>About | Tech Notify</title>
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
								echo '<a href="profile" class="dropdown-item search-class">Profile</a>';
								echo '<a href="bookmark" class="dropdown-item search-class">Bookmark</a>';}
							?>
  							<a href="#" class="dropdown-item search-class" id="search-txt">Search</a>
  							<a href="about-us" class="dropdown-item active">About Us</a>
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
				<!-- news start -->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="about-us-section">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<div class="profile-pic-section">
										<img src="media/profile.png" class="img-fluid tech-notify-profile-pic d-md-inline-block d-lg-inline-block d-xl-inline-block mt-2" width="230">
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<h3 class="page-title">About Us</h3>
									<p class="about-us-text"><span class="theme-green">Tech Notify</span> is one of the consumer technology websites aimed at helping people understand and use technology in a better way.</p>
									<p class="about-us-text">At <span class="theme-green">Tech Notify</span>, we serve the hottest tech news, latest tech tips & tricks through our website and help our audience make better decisions through our detailed reviews on tech gadgets.</p>
									<p class="about-us-text-special">WE ARE ON A MISSION TO TOUCH EVERY TECH CONSUMER’S LIFE BY HELPING THEM DO MORE WITH THEIR DEVICES.</p>
									<p class="about-us-text"><span class="theme-green">Tech Notify</span> is Founded in 2019 as an effort, turned into a passion and later into a responsibility to help people use technology in the most efficient way possible.</p>
									<p class="about-us-text-special text-left mt-2"><span class="text-white">- </span> TechNotify.in</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- news end -->
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