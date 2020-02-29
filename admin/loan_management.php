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
	<title>Loans</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Loans</h2>
	</div>
	
	<form method="post" action="loan_management.php">

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