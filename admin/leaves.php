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
	$date 	 	 =  $_POST['leave-date'];
	$reason  	 =  $_POST['reason'];

	if(isset($_POST['submit_btn']))
	{
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($date)) { 
			array_push($errors, "Date is required"); 
		}
		if (empty($reason)) {
			array_push($errors, "Reason of Birth is required");
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
					
					$query1 = "SELECT * FROM leaves WHERE leave_date='$date' LIMIT 1";
					
					if ($results1 = mysqli_query($conn, $query1)) 
					{
						if (mysqli_num_rows($results1) == 1)
						{
							$query2 = "UPDATE leaves SET emp_id='$emp_id', leave_reason='$reason'
							WHERE date='$date'";
							if (!(mysqli_query($conn, $query2))) 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						else
						{
							$query3 = "INSERT INTO leaves (emp_id, leave_date, leave_reason) 
								VALUES('$emp_id', '$date', '$reason')";
							
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
	<title>Leaves</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Leaves</h2>
	</div>
	
	<form method="post" action="leaves.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Leave Date</label>
			<input type="date" name="leave-date">
		</div>
		<div class="input-group">
			<label>Reason</label>
			<input type="text" name="reason" value="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>