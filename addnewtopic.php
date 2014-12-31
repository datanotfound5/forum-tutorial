<?php
	session_start();
	
	include ('dbconn.php');
	
	$topic = addslashes($_POST['topic']);
	$content = nl2br(addslashes($_POST['content']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	
	$insert = mysqli_query($con, "INSERT INTO topics (`category_id`, `subcategory_id`, `author`, `title`, `content`, `date_posted`) 
								  VALUES ('".$cid."', '".$scid."', '".$_SESSION['username']."', '".$topic."', '".$content."', NOW());");
								  
	if ($insert) {
		header("Location: /forum-tutorial/topics/".$cid."/".$scid."");
	}
?>