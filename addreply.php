<?php
	session_start();

	include ('dbconn.php');

	$comment = nl2br(addslashes($_POST['comment']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$tid = $_GET['tid'];

	echo $comment."<br />".$cid."<br />".$scid."<br />".$tid;

	$insert = mysqli_query($con, "INSERT INTO `replies` (`category_id`, `subcategory_id`, `topic_id`, `author`, `comment`, `date_posted`) VALUES ('".$cid."', '".$scid."', '".$tid."', '".$_SESSION['username']."', '".$comment."', NOW());");
	
	if ($insert) {
		header("Location: /forum/readtopic/".$cid."/".$scid."/".$tid."");
	}
?>