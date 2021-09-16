<?php
	session_start();

	if (isset($_SESSION['userid'])) 
	{
		$id = $_SESSION['userid'];
		$fullname = $_SESSION['fullname'];
	}

	require 'dbconnect.php';

	$posttitle = $_GET['search'];
	$qry = "SELECT * FROM posts_tbl WHERE title='$posttitle' and status='Published' ORDER BY id DESC ";
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
								echo '<a href="profile" class="dropdown-item">Profile</a>';
								echo '<a href="bookmark" class="dropdown-item">Bookmark</a>';}
							?>
  							<a href="#" class="dropdown-item search-class active" id="search-txt">Search</a>
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
				<!-- news start -->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="latest-section">
							<h3 class="page-title">News <i class="far fa-newspaper"></i></h3>
							<div class="row">
								<?php
								if (mysqli_num_rows($rs)>0) 
								{
									while ($row=mysqli_fetch_assoc($rs)) 
									{
										if ($row) 
										{
								?>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
									<div class="card">
										<?php $postid=$row['id'] ?>
										<a href="view-post?id=<?php echo $row['id'] ?>" class="post-img-block"><?php echo '<img src="data:image/jpeg;base64, '.base64_encode($row['img1']).'" class="card-img-top post-img" width="150">'; ?></a>
										<div class="card-body">
											<a href="view-post?id=<?php echo $row['id'] ?>" class="post-link"><h4 class="card-title"><?php echo $row['title'] ?></h4></a>
											<div class="row mx-0" style="margin-bottom: 12px;">
												<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
													<p class="card-text"><a href="https://twitter.com/AuthorUsername" class="author-link"><?php echo $row['author'] ?></a><span class="post-time"><?php $date=$row['doi']; echo date("F d, Y", strtotime($date)); ?></span></p>
												</div>
											</div>
											<div class="post-feedback">
												<div class="feedback-group pr-xl-4 pr-lg-4 pr-md-4 pr-sm-5 pr-5">
													<form style="display: inline;" method="post">
														<input type="hidden" name="userid" value="<?php echo $id; ?>">
														<input type="hidden" name="postid" value="<?php echo $postid; ?>">
														<?php
															if (isset($_SESSION['userid'])) 
															{
																$id = $_SESSION['userid'];
																$postid=$row['id'];

																$qry15 = "SELECT * from likes_tbl where post_id=$postid and user_id=$id ";
																$rs15 = mysqli_query($conn,$qry15);
																if (mysqli_num_rows($rs15)>0)
    															{	
																	echo '<button type="submit" name="dislike" class="feedback-btn" id="like-btn"><i class="fa-heart fas far"></i></button>';
																}
																else
																{
																	echo '<button type="submit" name="like" class="feedback-btn" id="like-btn"><i class="fa-heart far"></i></button>';
																}
															}
															else
															{
																echo '<button type="submit" name="like" class="feedback-btn" id="like-btn"><i class="fa-heart far"></i></button>';
															}
														?>
														<?php
										 					$postid=$row['id'];
															$qry10 = "SELECT * from likes_tbl where post_id=$postid  ";
															$rs10  = mysqli_query($conn,$qry10);
														?>	
														<span class="like-count"><?php echo mysqli_num_rows($rs10); ?></span>
													</form>
												</div>

												<div class="feedback-group pr-xl-4 pr-lg-4 pr-md-4 pr-sm-5 pr-5">
													<button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" class="feedback-btn" id="comment-btn"><i class="far fa-comment-alt"></i></button>
														<?php
										 					$postid=$row['id'];
										 					$posttitle=$row['title'];
															$qry11 = "SELECT * from comments_tbl where post_id=$postid and status='Active'  ";
															$rs11  = mysqli_query($conn,$qry11);
														?>	
														<span class="comment-count"><?php echo mysqli_num_rows($rs11); ?></span>
														
													<div class="dropdown-menu comment-dropdown" aria-labelledby="comment-btn">
														<?php
															$postid=$row['id'];
															$qry12 = "SELECT * FROM comments_tbl WHERE post_id='$postid' and status='Active' ORDER BY id DESC LIMIT 5";
															$rs12  = mysqli_query($conn,$qry12);
															if (mysqli_num_rows($rs12)>0) 
															{
																while ($row1=mysqli_fetch_assoc($rs12)) 
																{
														?>
														<span class="dropdown-item">
															<h6><?php echo $row1['user_name'] ?></h6>
															<p class="mb-0 pl-3" style="font-size: 14px;"><?php echo $row1['comment'] ?></p>
														</span>
														<?php
																}
															}
														?>
														<hr class="comment-hr">
														<span class="dropdown-item">
															<form method="post" class="form-inline">
																<div class="row">
																	<div class="col">
																		<input type="hidden" name="userid" value="<?php echo $id; ?>">
																		<input type="hidden" name="postid" value="<?php echo $postid; ?>">
																		<input type="hidden" name="posttitle" value="<?php echo $posttitle; ?>">
																		<input type="hidden" name="username" value="<?php echo $fullname; ?>">
																		<input type="text" name="comment-txtbox" class="form-control theme-txtbox text-left" placeholder="Comment">
																	</div>
																	<div class="col pl-0">
																		<button type="submit" name="comment-submit" class="btn theme-btn">Comment</button>
																	</div>
																</div>
															</form>
														</span>
													</div>
												</div>
												<div class="feedback-group pr-xl-4 pr-lg-4 pr-md-4 pr-sm-5 pr-5">
													<button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" class="feedback-btn" id="share-btn"><i class="far fa-share-square"></i></button>
													<div class="dropdown-menu" aria-labelledby="share-btn">
														<span class="dropdown-item text-center">
															<a href="https://www.facebook.com/sharer/sharer?u=" class="share-icon" style="font-size: 22px;"><i class="fab fa-facebook-f"></i></a>
															<a href="https://twitter.com/home?status=" class="share-icon"><i class="fab fa-twitter"></i></a>
															<a href="whatsapp://send?text=https://technotify.in/blog-link" data-action="share/whatsapp/share" class="share-icon"><i class="fab fa-whatsapp"></i></a>
														</span>
													</div>
												</div>
												<div class="feedback-group pr-0">
													<form method="post" style="display: inline;">
														<?php
															if (isset($_SESSION['userid'])) 
															{
																$id = $_SESSION['userid'];
																$postid=$row['id'];

																$qry16 = "SELECT * FROM bookmark_tbl WHERE user_id=$id and  post_id=$postid ";
																$rss = mysqli_query($conn,$qry16);
																if (mysqli_num_rows($rss)>0)
    															{	
																	echo '<button type="submit" name="disbookmark" class="feedback-btn" id="bookmark-btn"><i class="fa-bookmark fas far"></i></button>';
																}
																else
																{
																	echo '<button type="submit" name="bookmark" class="feedback-btn" id="bookmark-btn"><i class="fa-bookmark far"></i></button>';
																}
															}
															else
															{
																echo '<button type="submit" name="bookmark" class="feedback-btn" id="bookmark-btn"><i class="fa-bookmark far"></i></button>';
															}
														?>
														<input type="hidden" name="userid" value="<?php echo $id; ?>">
														<input type="hidden" name="postid" value="<?php echo $postid; ?>">
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
											}
										}
									}
								?>
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
<?php	
	
	if (isset($_POST['comment-submit'])) 
	{
		if (isset($_SESSION['userid'])) 
		{
			$id = $_SESSION['userid'];
		}
		else
		{
			echo '<script>window.location.href = "sign-in"</script>';
		}

		$user_id = $_POST['userid'];
		$post_id = $_POST['postid'];
		$post_title =$_POST['posttitle'];
		$username = $_POST['username'];
		$comment = $_POST['comment-txtbox'];
		$doi     =  date("y-m-d H:i:s");

		$sql = "INSERT INTO comments_tbl (user_id,user_name,post_id,post_title,comment,doi,status) VALUES('".$user_id."','".$username."','".$post_id."','".$post_title."','".$comment."','".$doi."','Active')";
		$res = mysqli_query($conn,$sql);
		if ($res) 
		{
			echo '<script>window.onload = timedRefresh(1);</script>';
		}
		else
		{
			header("location:javascript:history.go(-1)");
			exit();
		}
	}
?>
<?php
	if (isset($_POST['like'])) 
	{
		$user_id = $_POST['userid'];
		$post_id = $_POST['postid'];
		$doi     = 	date("y-m-d H:i:s");

		if (isset($_SESSION['userid'])) 
		{
			$id = $_SESSION['userid'];

			$query = "SELECT * FROM likes_tbl WHERE user_id=$user_id AND post_id=$post_id";
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)>0)
    		{
    		}
    		else
    		{
				$sql1 = "INSERT INTO likes_tbl (user_id,post_id,doi) VALUES('".$user_id."','".$post_id."','".$doi."')";
				$res1 = mysqli_query($conn,$sql1);
				if ($res1) 
				{
					echo '<script>window.location.reload();</script>';
				}
				else
				{
				}
			}
		}
		else
		{
			echo '<script>window.location.href = "sign-in"</script>';
		}
	}
?>
<?php
	if (isset($_POST['dislike'])) 
	{
		$user_id = $_POST['userid'];
		$post_id = $_POST['postid'];
		$doi     = 	date("y-m-d H:i:s");

		if (isset($_SESSION['userid'])) 
		{
			$id = $_SESSION['userid'];

			$query = "SELECT * FROM likes_tbl WHERE user_id=$user_id AND post_id=$post_id";
			$result = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)>0)
    		{
    			$sql2 = "DELETE FROM likes_tbl WHERE user_id=$user_id AND post_id=$post_id";
				$res2 = mysqli_query($conn,$sql2);
				if ($res2) 
				{
					echo '<script>window.location.reload();</script>';
				}
				else
				{
				}
    		}
    		else
    		{
				
			}
		}
		else
		{
			echo '<script>window.location.href = "sign-in"</script>';
		}
	}
?>
<?php
	if (isset($_POST['bookmark'])) 
	{
		$user_id = $_POST['userid'];
		$post_id = $_POST['postid'];
		$doi     = 	date("y-m-d H:i:s");

		if (isset($_SESSION['userid'])) 
		{
			$id = $_SESSION['userid'];

			$query1 = "SELECT * FROM bookmark_tbl WHERE user_id=$user_id AND post_id=$post_id";
			$result1 = mysqli_query($conn,$query1);
			if (mysqli_num_rows($result1)>0)
    		{
    		}
    		else
    		{
				$sql3 = "INSERT INTO bookmark_tbl (user_id,post_id,doi) VALUES('".$user_id."','".$post_id."','".$doi."')";
				$res3 = mysqli_query($conn,$sql3);
				if ($res3) 
				{
					echo '<script>window.location.reload();</script>';
				}
				else
				{
				}
			}
		}
		else
		{
			echo '<script>window.location.href = "sign-in"</script>';
		}
	}
?>
<?php
	if (isset($_POST['disbookmark'])) 
	{
		$user_id = $_POST['userid'];
		$post_id = $_POST['postid'];
		$doi     = 	date("y-m-d H:i:s");

		if (isset($_SESSION['userid'])) 
		{
			$id = $_SESSION['userid'];

			$query1 = "SELECT * FROM bookmark_tbl WHERE user_id=$user_id AND post_id=$post_id";
			$result1 = mysqli_query($conn,$query1);
			if (mysqli_num_rows($result1)>0)
    		{
    			$sql4 = "DELETE FROM bookmark_tbl WHERE user_id=$user_id AND post_id=$post_id";
				$res4 = mysqli_query($conn,$sql4);
				if ($res4) 
				{
					echo '<script>window.location.reload();</script>';
				}
				else
				{
				}
    		}
    		else
    		{
				
			}
		}
		else
		{
			echo '<script>window.location.href = "sign-in"</script>';
		}
	}
?>