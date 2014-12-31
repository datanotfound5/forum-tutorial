<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<head><title>Inki's PHP Forum Tutorial</title></head>
<link href="/forum-tutorial/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
		<div class="header"><h1><a href="/forum-tutorial">PHP and MySQL Forum Tutorial</a></h1></div>
		<div class="loginpane">
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg_success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
						} else if ($_GET['status'] == 'login_fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
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