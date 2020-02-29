<?php 
	include('functions.php');

	/*if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>PAY_SHEET</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Pay Sheet</h2>
	</div>
	<div class="content">
		<!-- logged in user information -->
		<div class="abcd">
			<label>Employee Name</label><br>
			<input type="text" name="employee-name" >
		</div>
		<div class="abcd">
			<label>Employee ID</label><br>
			<input type="text" name="employee-id">
		</div>
		<div class="abcd">
			<label>Month</label><br>
			<input type="text" name="month">
		</div>
		<div class="abcd">
			<label>Basic Salary(Rs)</label><br>
			<input type="text" name="basic-salary">
		</div>
		<div class="abcd">
			<label>Overtime Payment(Rs)</label><br>
			<input type="text" name="over-time-hours">
		</div>
		<div class="abcd">
			<label>Allowances(Rs)</label><br>
			<input type="text" name="allowance">
		</div>
		<div class="abcd">
			<label>Leave Deduction(Rs)</label><br>
			<input type="text" name="leave-deduction">
		</div>
		<div class="abcd">
			<label>Loan Deduction(Rs)</label><br>
			<input type="text" name="loan-deduction">
		</div>
		<div class="abcd">
			<label>Total Salary(Rs)</label><br>
			<input type="text" name="total-salary">
		</div>
		<div class="abcd">
			<button type="submit" class="btn" name="login_btn">Back</button>
		</div>
		</div>
	</div>
</body>
</html>