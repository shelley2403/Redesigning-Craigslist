
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

$row_cnt = $resultSet->num_rows;
if($row_cnt == 0)
{
	header("Location: signinerror.html");
	
	
}

while ($row = $resultSet->fetch_assoc()) 
{ 
$a = $row["username"];

$b = $row["userId"];

$c = $row["roles"];

$_SESSION['userIdsession'] = $b;

?>

<!DOCTYPE html>

<html lang="en">
    <head>
       
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bootply.com - Dashboard with Off-canvas Sidebar</title>
        <meta name="generator" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
     <link href="css/signup.css"  rel="stylesheet" type="text/css">
      <link href="css/signin.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">

		<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10-dev/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
				
			} );
		</script>
		<style type="text/css">
            /*
 * Style tweaks
 * --------------------------------------------------
 */
body {
  padding-top: 50px;
  background-color: #f5f5f5;
}
footer {
  padding-left: 15px;
  padding-right: 15px;
  background-color: #fff;
}

/*
 * Off Canvas
 * --------------------------------------------------
 */
@media screen and (max-width: 768px) {
  .row-offcanvas {
    position: relative;
    -webkit-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
  }

  .row-offcanvas-left
  .sidebar-offcanvas {
    left: -33%;
  }

  .row-offcanvas-left.active {
    left: 33%;
  }

  .sidebar-offcanvas {
    position: absolute;
    top: 0;
    width: 33%;
    margin-left: 10px;
  }
}


/* Sidebar navigation */
.nav-sidebar {
  background-color: #f5f5f5;
  margin-right: -15px;
  margin-bottom: 20px;
  margin-left: -15px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a {
  color: #fff;
  background-color: #428bca;
}

/*
 * Main content
 */

.main {
  padding: 20px;
  background-color: #fff;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}

.product-img{
border-width:5px;	
border-style:inset;
}


        </style>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->    
    </head>
    <body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li>
			<li><a href="#"><?php
	echo $a;?></a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
		</nav>
		<div id="header">
	<div class="container">
	<?php
	echo'<h2>Hello '.$a.'</h2>';?>
				
	
			<h2 align="center">Post Details</h2>
	
			<form action="viewad.php" method="post" name="form" id="form">
			<div class="table-responsive">
			<table class="table table-hover table table-striped" id="example">
	<thead>
		<tr>
	<th>View Details</th>
    <th>Post ID</th>
    <th>Category</th>
    <th>Sub Category</th>
    <th>Post Title</th>
    <th>Zipcode</th>
    <th>Country</th>
    <th>State</th>
    <th>Locality</th>
    <th>Price</th>
    <th>Date</th>
		</tr>
	</thead>
	<tbody>			


<?php

if($c == 'users')
{
echo '<a href="postselect.php">Post Add</a>';
$query1 = "SELECT * FROM PostDetails where userId = '$b'"; 

$resultSet1 = $conn->query($query1, MYSQLI_STORE_RESULT);

while ($row = $resultSet1->fetch_assoc()) 
{ 
$d = $row["postId"];
$category=$row["category"];
$subcat=$row["subCategory"];
$posttitle=$row["postTitle"];
$zipcode=$row["zipcode"];
$country=$row["country"];
$state=$row["state"];
$locality=$row["locality"];
$price=$row["Price"];
$date=$row["Date"];

echo"
<tr>
<td><input type='radio' name='post' value='".$d."'></td>
<td>".$d."</td>
<td>".$category."</td>
<td>".$subcat."</td>
<td>".$posttitle."</td>
<td>".$zipcode."</td>
<td>".$country."</td>
<td>".$state."</td>
<td>".$locality."</td>
<td>".$price."</td>
<td>".$date."</td>
</tr>";
}
}



else
{
$query1 = "SELECT * FROM PostDetails"; 

$resultSet1 = $conn->query($query1, MYSQLI_STORE_RESULT);

while ($row = $resultSet1->fetch_assoc()) 
{ 

$d = $row["postId"];
$category=$row["category"];
$subcat=$row["subCategory"];
$posttitle=$row["postTitle"];
$zipcode=$row["zipcode"];
$country=$row["country"];
$state=$row["state"];
$locality=$row["locality"];
$price=$row["Price"];
$date=$row["Date"];

echo"
<tr>
<td><input type='radio' name='post' value='".$d."'></td>
<td>".$d."</td>
<td>".$category."</td>
<td>".$subcat."</td>
<td>".$posttitle."</td>
<td>".$zipcode."</td>
<td>".$country."</td>
<td>".$state."</td>
<td>".$locality."</td>
<td>".$price."</td>
<td>".$date."</td>
</tr>";
}
}
}
?> 
        
	</tbody>
</table>
<label id="count"></label>


  <input type="submit" name="request2" value="ViewAd" class="btn btn-theme" onclick="return chkform1()"/>

</form>

		</div>
		</div>
<br/>
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
					<p class="copyright">Copyright &copy; 2014 - Craigslist.com</p>
			</div>
		</div>		
	</div>	
	</div>
	
	<script>
		$(function() {
			
			
			$("#json-one").change(function() {
				var $dropdown = $(this);
					
				alert("${pageContext. request. contextPath}");
				$.getJSON("${pageContext. request. contextPath}/resources/jsondata/data.json", function(data) {
				
					var key = $dropdown.val();
					var vals = [];
					alert(key);	
					switch(key) {
					case 'ForSale':
							vals = data.ForSale.split(",");
							break;
						case 'Community':
							vals = data.Community.split(",");
							break;
						case 'Vehicles':
							vals = data.Vehicles.split(",");
							break;
						case 'RealEstate':
							vals = data.RealEstate.split(",");
							break;
						case 'Jobs':
							vals = data.Jobs.split(",");
							break;
						case 'Classes':
							vals = data.Classes.split(",");
							break;
						case 'base':
							vals = ['Please choose from above'];
					}
					
					var $jsontwo = $("#json-two");
					$jsontwo.empty();
					$.each(vals, function(index, value) {
						$jsontwo.append("<option>" + value + "</option>");
					});
			
				});
			});

		});
	</script>
	  	
	<script>
	function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

    </script>
	
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<script src="js/jquery.geocomplete.js" /></script>

    <script>
      $(function(){
        $("#geocomplete").geocomplete({
          details: "form",
          types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
      });
    </script>	

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>