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
	$username    =  $_POST['username'];
	$emp_id		 =	$_POST['emp_id'];
	$full_name 	 =  $_POST['full_name'];
	$dob  		 =  $_POST['dob'];
	$doe 	 	 =	$_POST['doe'];
	$emp_positon =	$_POST['emp_positon'];

	if(isset($_POST['submit_btn']))
	{
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($full_name)) { 
			array_push($errors, "Full Name is required"); 
		}
		if (empty($dob)) {
			array_push($errors, "Date of Birth is required");
		}
		if (empty($doe)) {
			array_push($errors, "Date of Employment is required");
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
					
					$query1 = "SELECT * FROM employees WHERE emp_id='$emp_id' LIMIT 1";
					
					if ($results1 = mysqli_query($conn, $query1)) 
					{
						if (mysqli_num_rows($results1) == 1)
						{
							$query2 = "UPDATE employees SET emp_name='$full_name', emp_date='$doe', birth_date='$dob', position='$emp_positon'
							WHERE emp_id='$emp_id'";
							if (!(mysqli_query($conn, $query2))) 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						else
						{
							$query3 = "INSERT INTO employees (emp_id, emp_name, emp_date, birth_date, position) 
								VALUES('$emp_id', '$full_name', '$dob', '$doe', '$emp_positon')";
							
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
	<title>Employee Information</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Employee Information</h2>
	</div>
	
	<form method="post" action="employee_information.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="full_name" value="">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="dob">
		</div>
		<div class="input-group">
			<label>Date of Employment</label>
			<input type="date" name="doe">
		</div>
		<div class="input-group">
			<label>Position</label>
			<select name="emp_positon" id="emp_positon" >
				<option value="management-assistant">Mangement Assistant</option>
				<option value="development-officer">Development Officer</option>
				<option value="teacher">Teacher</option>
				<option value="principal">Principal</option>
				<option value="vice-principal">Vice Principal</option>
			</select>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>