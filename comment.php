
<?php
	require 'dbconnect.php';

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
		}
		else
		{
			header("location:javascript:history.go(-1)");
			exit();
		}
?>