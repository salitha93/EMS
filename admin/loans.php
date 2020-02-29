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
	$amount		  =	 $_POST['amount'];
	$i_rate 	  =  $_POST['i_rate'];
	$installments =  $_POST['installments'];

	if(isset($_POST['submit_btn']))
	{
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($amount)) { 
			array_push($errors, "Amount is required"); 
		}
		if (empty($i_rate)) {
			array_push($errors, "Interest Rate is required");
		}
		if (empty($installments)) {
			array_push($errors, "Number of Installments is required");
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
					
					$query1 = "SELECT * FROM loans WHERE emp_id=$emp_id LIMIT 1";
					
					if ($results1 = mysqli_query($conn, $query1)) 
					{
						if (mysqli_num_rows($results1) == 1)
						{
							$query2 = "UPDATE loans SET amount=$amount, i_rate=$i_rate, installments=$installments
							WHERE emp_id=$emp_id";
							if (!(mysqli_query($conn, $query2))) 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						else
						{
							$query3 = "INSERT INTO loans (emp_id, amount, i_rate, installments) 
								VALUES($emp_id, $amount, $i_rate, $installments)";
							
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
	<title>Loans</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Loans</h2>
	</div>
	
	<form method="post" action="loans.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="">
		</div>
		<div class="input-group">
			<label>Amount(Rs)</label>
			<input type="text" name="amount" value="">
		</div>
		<div class="input-group">
			<label>Interest Rate(%)</label>
            <input type="text" name="i_rate" value="">
        </div>
        <div class="input-group">
			<label>Number of Installments(Months)</label>
            <input type="text" name="installments" value="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Submit</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>