<?php

$conn = new mysqli('localhost', 'root', 'yellehs24', 'craigslist_data');
if($conn->connect_error) {
  $this->last_error = 'Cannot connect to database. ' . $conn->connect_error;
}

$cat=($_POST["json-one"]);
$subcat=($_POST["json-two"]);

	
	$country=($_POST["country"]);
	$state=($_POST["administrative_area_level_1"]);
	$locality=($_POST["locality"]);
	$zip=($_POST["postal_code"]);


	$query1 = "SELECT * FROM Postdetails where country = '$country' and state = '$state' and locality = '$locality' and zipcode='$zip' and category = '$cat' and subCategory = '$subcat'"; 
 
	$resultSet = $conn->query($query1, MYSQLI_STORE_RESULT);

	while ($row = $resultSet->fetch_assoc()) 
	{ 
	$a = $row["postId"];
	
	
	$query2 = "SELECT photopath FROM photos where postId='$a'"; 
	$resultSet2 = $conn->query($query2, MYSQLI_STORE_RESULT);
		while ($row = $resultSet2->fetch_assoc()) {
			$c = $row["photopath"];
			echo '<img src='.$c.'>';
		}
	
		echo $a;
	
	
       //array($row["postTitle"], $row["postDetails"], $row["locality"], $row["category"], $row["subCategory"]),ssss
	 }