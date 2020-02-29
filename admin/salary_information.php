<?php 
	include('../db.php');
	/*
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
	*/
	$errors = [];

	// receive all input values from the form
	$username     =  $_POST['username'];
	$month		  =	 $_POST['month'];
	$basic_salary =  $_POST['basic_salary'];
	$allowances	  =  $_POST['allowances'];
	$ot_hours	  =  $_POST['ot_hours'];

	if(isset($_POST['submit_btn']))
	{
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($month)) { 
			array_push($errors, "Month is required"); 
		}
		if (empty($basic_salary)) {
			array_push($errors, "Basic Salary is required");
		}
		if (empty($allowances)) {
			array_push($errors, "Allowances field is required");
		}
		if (empty($ot_hours)) {
			array_push($errors, "OT Hours field is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) 
		{
			$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";

			if ($results = mysqli_query($conn, $query)) 
			{
				if (mysqli_num_rows($results) == 1) 
				{ // user found
					// check if user is admin or user
					$logged_in_user = mysqli_fetch_assoc($results);
					$emp_id			= $logged_in_user['emp_id'];
					
					$query1 = "SELECT * FROM salaries WHERE emp_id=$emp_id AND salary_month='$month' LIMIT 1";
					
					if ($results1 = mysqli_query($conn, $query1)) 
					{
						if (mysqli_num_rows($results1) == 1)
						{
							$query2 = "UPDATE salaries SET basic_salary=$basic_salary, allowances=$allowances, ot_hours=$ot_hours
							WHERE emp_id=$emp_id";
							if (!(mysqli_query($conn, $query2))) 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						else
						{
							$query3 = "INSERT INTO salaries (emp_id, salary_month, basic_salary, allowances, ot_hours) 
								VALUES($emp_id, '$month', $basic_salary, $allowances, $ot_hours)";
							
							if (!(mysqli_query($conn, $query3))) 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
					}
					else
					{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
	
				}
				else 
				{
					array_push($errors, "Incorrect username");
				}
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		
		}
	}

	if(isset($_POST['back_btn']))
	{
		header("location: home.php");
	}

	function display_error() 
	{
		global $errors;

		if (count($errors) > 0)
		{
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
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
	
	<form method="post" action="salary_information.php">

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
			<input type="text" name="basic_salary" value="">
		</div>
		<div class="input-group">
			<label>Allowances(Rs)</label>
			<input type="text" name="allowances" value="">
		</div>
		<div class="input-group">
			<label>OT Hours</label>
			<input type="text" name="ot_hours" value="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>