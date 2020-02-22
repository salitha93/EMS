<?php
$con = mysqli_connect("localhost","admin","admin4321","EMS");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
