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
	<title>Employee Information</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Employee Information</h2>
	</div>
	
	<form method="post" action="leave_management.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="ot-date">
		</div>
		<div class="input-group">
			<label>Date of Employment</label>
			<input type="date" name="ot-date">
		</div>
		<div class="input-group">
			<label>Position</label>
			<select name="user_type" id="user_type" >
				<option value="management-assistant">Mangement Assistant</option>
				<option value="development-officer">Development Officer</option>
				<option value="user">Management Assistant</option>
			</select>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>