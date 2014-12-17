<?php
	include ('dbconn.php');
	include ('layout-manager.php');
	include ('topic-functions.php');
	include ('reply-functions.php');
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
				if (isset($_SESSION['username'])) {
					replylink($_GET['cid'], $_GET['scid'], $_GET['tid']); 	
				}
			?>
		</div>
		<?php 
			disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']); 
			echo "<div class='content'><p>All Replies (".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")</p></div>";
			dispreplies($_GET['cid'], $_GET['scid'], $_GET['tid']); 
		?>
	</div>
</body>
</html>