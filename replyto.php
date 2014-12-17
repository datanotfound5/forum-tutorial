<?php
	include ('dbconn.php');
	include ('layout-manager.php');
	include ('reply-functions.php');
	include ('topic-functions.php');
?>

<html>
<head><title>Inki's PHP Forum Tutorial</title></head>
<link href="/forum/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
		<div class="header"><h1><a href="/forum">PHP and MySQL Forum Tutorial</a></h1></div>
		<div class="loginpane">
			<?php 
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						echo "<p style=\"color: red;\">Invalid username and/or password!</p>";
					}
					loginform();
				}
			?>
		</div>
		<div class="forumdesc">
			<p>Welcome to the world's coolest forum made with PHP and MySQL... for noobs just like you!</p>
			<?php
				if (!isset($_SESSION['username'])) {
					echo "<p>Please login first or <a href='/forum/register'>click here</a> to register";
				}
			?>
		</div>
		<?php 
			if (isset($_SESSION['username'])) {
				replytopost($_GET['cid'], $_GET['scid'], $_GET['tid']);
			}
		?>
		<div class="topic"><?php disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']); ?></div>
	</div>
</body>
</html>