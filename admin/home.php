<?php 
	include('../functions.php');

	/*if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}*/

	if (isset($_POST['submit_logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	if (isset($_POST['submit_create_user_btn'])) {
		header("location: create_user.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<form method="post" action="home.php">
		<div class="input-group2">
			<button type="submit" class="btn_home" name="submit_create_user_btn"> Create User</button>
		</div>
		<div class="input-group2">
			<button type="submit" class="btn_home" name="submit_employee_info_btn"> Employee Information</button>
		</div>
		<div class="input-group2">
			<button type="submit" class="btn_home" name="submit_leave_btn"> Leaves</button>
		</div>
		<div class="input-group2">
			<button type="submit" class="btn_home" name="submit_loan_btn"> Loans</button>
		</div>
		<div class="input-group2">
			<button type="submit" class="btn_home" name="submit_ot_btn"> Over Time</button>
		</div>
		<div class="input-group2">
			<button type="submit" class="btn_home" name="submit_logout"> Logout</button>
		</div>
	</form>
		
</body>
</html>