<?php 
	include('db.php');

	/*if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}*/
	$employee_id  		 =  $_SESSION['user']['emp_id'];
	$employee_name  	 =  "Not Found";
	$month  			 =  $_POST['month'];
	$basic_salary   	 =  0;
	$over_time_payment   =  0;
	$allowances			 = 	0;
	$leave_deduction	 =	0;
	$loan_deduction	 	 =	0;
	$total_salary		 =	0;

	//Querying from DB
	$query1 = "SELECT * FROM employees WHERE emp_id=$employee_id LIMIT 1";
					
	if ($results1 = mysqli_query($conn, $query1)) 
	{
		if (mysqli_num_rows($results1) == 1)
		{
			$assoc1 = mysqli_fetch_assoc($results1);
			$employee_name = $assoc1['emp_name'];
		}
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	if (isset($_POST['submit_generate_btn'])) 
	{
		$query2 = "SELECT * FROM salaries WHERE emp_id=$employee_id AND salary_month='$month' LIMIT 1";
					
		if ($results2 = mysqli_query($conn, $query2)) 
		{
			if (mysqli_num_rows($results2) == 1)
			{
				$assoc2 			 = mysqli_fetch_assoc($results2);
				$basic_salary   	 = $assoc2['basic_salary'];
				$allowances			 = $assoc2['allowances'];
				$over_time_hours   	 = $assoc2['ot_hours'];
				$over_time_payment   = $over_time_hours * 500;
			}
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		$query2 = "SELECT * FROM leaves WHERE emp_id=$employee_id AND leave_month='$month'";
					
		if ($results2 = mysqli_query($conn, $query2)) 
		{
			$leave_count     = mysqli_num_rows($results2);
			$leave_deduction = ($basic_salary)*($leave_count)/30;
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	$total_earnings  = $basic_salary + $over_time_payment + $allowances;
	$total_deduction = $leave_deduction + $loan_deduction;

	$total_salary = $total_earnings - $total_deduction;


	if (isset($_POST['submit_logout_btn'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}

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
	<form method="post" action="pay_sheet.php">
		<!-- logged in user information -->
		<div class="abcd">
			<label>Employee Name</label><br>
			<input type="text" name="employee_name" value="<?php echo $employee_name ?>">
		</div>
		<div class="abcd">
			<label>Employee ID</label><br>
			<input type="text" name="employee_id" value="<?php echo $employee_id ?>">
		</div>
		<div class="abcd">
			<label>Month</label><br>
			<select name="month">
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="Augest">Augest</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
			</select>
		</div>
		</div>
		<div class="abcd">
			<label>Basic Salary(Rs)</label><br>
			<input type="text" name="basic_salary"  value="<?php echo $basic_salary ?>">
		</div>
		<div class="abcd">
			<label>Overtime Payment(Rs)</label><br>
			<input type="text" name="over_time_payment" value="<?php echo $over_time_payment ?>">
		</div>
		<div class="abcd">
			<label>Allowances(Rs)</label><br>
			<input type="text" name="allowances" value="<?php echo $allowances ?>">
		</div>
		<div class="abcd">
			<label>Leave Deduction(Rs)</label><br>
			<input type="text" name="leave_deduction" value="<?php echo $leave_deduction ?>">
		</div>
		<div class="abcd">
			<label>Loan Deduction(Rs)</label><br>
			<input type="text" name="loan_deduction" value="<?php echo $loan_deduction ?>">
		</div>
		<div class="abcd">
			<label>Total Salary(Rs)</label><br>
			<input type="text" name="total_salary" value="<?php echo $total_salary ?>">
		</div>
		<div class="abcd">
			<button type="submit" class="btn" name="submit_logout_btn">Logout</button>
			<button type="submit" class="btn" name="submit_generate_btn">Generate</button>
		</div>
		</div>
	</form>
</body>
</html>