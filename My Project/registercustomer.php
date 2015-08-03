<?php

$conn = new mysqli('localhost', 'root', 'yellehs24', 'craigslist_data');
if($conn->connect_error) {
  $this->last_error = 'Cannot connect to database. ' . $conn->connect_error;
}

$fullName=($_POST["fullName"]);
	$username=($_POST["username"]);
	$emailAddress=($_POST["email"]);
	$password=($_POST["password"]);
	$phoneNumber=($_POST["contact"]);
	$sellerInformation=($_POST["type"]);

	

	mysqli_query($conn, "INSERT INTO usertable (`username`, `password`, `emailAddress`,`fullName`,`contactNumber`,`roles`,`sellerInformation`) VALUES ('$username','$password','$emailAddress','$fullName','$phoneNumber','customer','$sellerInformation')");
	

?>	