<?php
	session_start();
	
	$conn = new mysqli('localhost', 'root', 'yellehs24', 'craigslist_data');
	if($conn->connect_error) {
	$this->last_error = 'Cannot connect to database. ' . $conn->connect_error;
	}
	
	$target_path = "uploads/";

	$target_path = $target_path . basename($_FILES['uploadedfile']['name']); 

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
	
	$path = ($target_path);
	$userId = 	($_POST["userId"]);
	$cat=($_POST["json-one"]);
	$subcat=($_POST["json-two"]);
	$title=($_POST["addtitle"]);
	$detail=($_POST["postdetail"]);
	$zip=($_POST["postal_code"]);
	$country=($_POST["country"]);
	$state=($_POST["administrative_area_level_1"]);
	$locality=($_POST["locality"]);
	$streetadd=($_POST["postdetail"]);
	$date = ($_POST["date"]);
$e = uniqid();

echo $e;
	echo $path;	
	mysqli_query($conn, "INSERT INTO postdetails (`category`, `subCategory`, `postTitle`,`postDetails`,`zipcode`,`country`,`state`,`locality`,`postRegNo`, `userId`, `Date`) VALUES ('$cat','$subcat','$title','$detail','$zip','$country','$state','$locality','$e','$userId','$date')");

	$query1 = "SELECT postId FROM postDetails where postRegNo = '$e'"; 
    $resultSet = $conn->query($query1, MYSQLI_STORE_RESULT);
	
	while ($row = $resultSet->fetch_assoc()) 
 { 
	$a = $row["postId"];
		mysqli_query($conn, "INSERT INTO photos (`postId`,`photoPath`) VALUES('$a','$path')");
 }
	} 
	
	elseif(empty($_FILES['uploadedfile']['name'])){
		echo "Success! You didn't upload any photo";
		
	$cat=($_POST["json-one"]);
	$subcat=($_POST["json-two"]);
	$title=($_POST["addtitle"]);
	$detail=($_POST["postdetail"]);
	$zip=($_POST["postal_code"]);
	$country=($_POST["country"]);
	$state=($_POST["administrative_area_level_1"]);
	$locality=($_POST["locality"]);
	$streetadd=($_POST["postdetail"]);
		
	mysqli_query($conn, "INSERT INTO postdetails (`category`, `subCategory`, `postTitle`,`postDetails`,`zipcode`,`country`,`state`,`locality`) VALUES ('$cat','$subcat','$title','$detail','$zip','$country','$state','$locality')");
	}
	else{
    echo "There was an error uploading the file, please try again!";
	}
	mysqli_close($conn);
?>