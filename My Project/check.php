<?php
session_start();

$conn = new mysqli('localhost', 'root', 'yellehs24', 'craigslist_data');
if($conn->connect_error) {
$this->last_error = 'Cannot connect to database. ' . $conn->connect_error;
}
$username=($_POST["username"]);
$password=($_POST["password"]);



$query1 = "SELECT * FROM usertable where username = '$username' and password = '$password'"; 

   $resultSet = $conn->query($query1, MYSQLI_STORE_RESULT);

while ($row = $resultSet->fetch_assoc()) 
{ 
$a = $row["username"];
$b = $row["userId"];
$c = $row["roles"];
echo $a;

if($c == 'customer')
{

$query1 = "SELECT * FROM PostDetails where userId = '$b'"; 

$resultSet1 = $conn->query($query1, MYSQLI_STORE_RESULT);

while ($row = $resultSet1->fetch_assoc()) 
{ 
$d = $row["postId"];
echo $d;
}
}
else
{
$query1 = "SELECT * FROM PostDetails"; 

$resultSet1 = $conn->query($query1, MYSQLI_STORE_RESULT);

while ($row = $resultSet1->fetch_assoc()) 
{ 
$d = $row["postId"];
echo $d;
}
}
}
?>