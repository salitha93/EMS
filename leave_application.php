<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leave Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Leave Application</h2>
	</div>
	<div class="content">
		<!-- logged in user information -->
		<div class="leave_application">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
                    <small>
                        <br>
						<a href="leave_application.php" style="color: red;">submit</a>
						<br>
						<a href="index.php" style="color: red;">back</a>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>