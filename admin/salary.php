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
	<title>Salary Information</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Salary Information</h2>
	</div>
	
	<form method="post" action="salary.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Month</label>
			<input type="text" name="month" value="">
		</div>
		<div class="input-group">
			<label>Basic Salary(Rs)</label>
			<input type="text" name="basic-salary" value="">
		</div>
		<div class="input-group">
			<label>Allowances(Rs)</label>
			<input type="text" name="allowances" value="">
		</div>
		<div class="input-group">
			<label>OT Hours</label>
			<input type="text" name="ot-hours" value="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>