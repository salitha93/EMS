<?php 
	include('../functions.php');
	/*
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
	*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Over Time</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Over Time</h2>
	</div>
	
	<form method="post" action="leave_management.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Date</label>
			<input type="date" name="ot-date">
		</div>
		<div class="input-group">
			<label>Hours</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>