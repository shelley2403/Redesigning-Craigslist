<?php
include 'library.php'; // include the library for database connection
if(isset($_POST['action']) && $_POST['action'] == 'username_availability'){ // Check for the username posted
	$username = htmlentities($_POST['username']); // Get the username values
	$check_query= mysql_query('SELECT username FROM usertable WHERE username = "'.$username.'"'); // Check the database
	echo mysql_num_rows($check_query); // echo the num or rows 0 or greater than 0
}

if(isset($_POST['action']) && $_POST['action'] == 'email_availability'){ // Check for the username posted
	$email = htmlentities($_POST['email']); // Get the username values
	
	$check_query= mysql_query('SELECT emailAddress FROM usertable WHERE emailAddress = "'.$email.'"'); // Check the database
	echo mysql_num_rows($check_query); // echo the num or rows 0 or greater than 0
}

?>