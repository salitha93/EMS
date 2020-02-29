<?php 
	include('../db.php');

	$errors = [];

	// receive all input values from the form
	$username    =  $_POST['username'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];
	$user_type 	 =	$_POST['user_type'];

	if(isset($_POST['register_btn']))
	{
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) 
		{
			$password = md5($password_1);//encrypt the password before saving in the database

			if ($user_type == 'admin') 
			{
				$query = "INSERT INTO users (username, user_type, password) 
						  VALUES('$username', '$user_type', '$password')";
				mysqli_query($conn, $query);
				header('location: home.php');
			}
			else
			{
				$query = "INSERT INTO users (username, user_type, password) 
						  VALUES('$username', '$user_type', '$password')";
				mysqli_query($conn, $query);

				header('location: ../pay_sheet.php');				
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
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Create user</h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> Create user</button>
			<button type="submit" class="btn" name="back_btn"> Back</button>
		</div>
	</form>
</body>
</html>