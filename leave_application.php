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

    <form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $_SESSION['user']['username'] ?>" disabled >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
            <button type="submit" class="btn" name="leave_submit_btn">Login</button>
            <button type="submit" class="btn" name="back_btn">Back</button>
		</div>
	</form>

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