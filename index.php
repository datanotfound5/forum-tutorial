<?php
	include ('dbconn.php');
	include ('layout-manager.php');
	include ('category-functions.php');
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
		</div>
		<div class="content">
			<?php dispcategories(); ?>
		</div>
	</div>
</body>
</html>