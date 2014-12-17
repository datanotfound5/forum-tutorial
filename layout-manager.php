<?php
	function loginform() {
		echo "<form action='/forum/validatelogin.php' method='POST'>
			  <p>Username</p>
			  <input type='text' id='usernameinput' name='usernameinput' />
			  <p>Password</p>
			  <input type='password' id='passwordinput' name='passwordinput' />
			  <input type='submit' value='Login' />
			  <button type='button' onclick='location.href=\"/forum/register\";'>Register</button>
			  </form>";
	}

	function logout() {
		echo nl2br("<p>Welcome ".$_SESSION['username']."!\nLooking good today!</p>
			  <form action='/forum/logout.php' method='GET'>
			  <input type='submit' value='Logout' /></form>");
	}

	function addnewtopicform() {
		echo '<form action="/forum/addnewtopic.php?cid='.$_GET['cid'].'&scid='.$_GET['scid'].'" method="POST">
			  <p>Title: </p>
			  <input type="text" id="topic" name="topic" size="100" />
			  <p>Content: </p>
			  <textarea id="content" name="content"></textarea><br />
			  <input type="submit" value="add new post" />
			  </form>';
	}
?>