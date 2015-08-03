<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>View ADD</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
     <link href="css/maptheme.css"  rel="stylesheet" type="text/css">
      <link href="css/signin.css" rel="stylesheet" type="text/css">
        <style>
		.map_canvas { 
  width: 700px; 
  height: 500px; 
  margin: 10px 20px 10px 0;
}
		</style>
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
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
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
</nav>

<div id="map-canvas"></div>
<div class="container-fluid" id="main">

  <div class="row">
  	<div class="col-xs-8" id="left">
    
      <h3>Add Description:</h3>
      
      <!-- item list -->
      <div class="panel panel-default">
	  
	  
<?php
$conn = new mysqli('localhost', 'root', 'yellehs24', 'craigslist_data');
if($conn->connect_error) {
  $this->last_error = 'Cannot connect to database. ' . $conn->connect_error;
}

	
	//if(isset($_GET['post'])){ $postid == $GET['post']; }
if(isset($_POST['post'])){ $postid = $_POST['post']; }

	
	
	$query1 = "SELECT * FROM PostDetails where postId='$postid'"; 
 
	$resultSet = $conn->query($query1, MYSQLI_STORE_RESULT);

	while ($row = $resultSet->fetch_assoc()) 
	{ 
	
	
$category=$row["category"];
$subcat=$row["subCategory"];
$posttitle=$row["postTitle"];
$postdetails=$row["postDetails"];
$zipcode=$row["zipcode"];
$country=$row["country"];
$state=$row["state"];
$locality=$row["locality"];
$price=$row["Price"];
$date=$row["Date"];
$poststatus=$row["Status"];
$userid=$row["userId"];

	echo'<div class="panel-heading"><a href=""><h4># '.$postid.':'.' '.$posttitle.'</h4></a></div>
      </div>';
	
	$query2 = "SELECT photopath FROM photos_postdetails where postId='$postid'"; 
	$resultSet2 = $conn->query($query2, MYSQLI_STORE_RESULT);
		$row_cnt = $resultSet2->num_rows;
	
		if($row_cnt == 0)
		{
		echo'<div class="row"><div class="col-md-6 col-sm-4 col-xs-4 ">
                <div class="product-img">
                   <img class="img-responsive" src="" alt="not available" />
      </div></div>
			
			
	  <div class="col-md-6 col-sm-2 col-xs-6 ">
	  <div class="panel-heading"><h4>Date: '.$date.'</h4></div>
		<div class="panel-heading"><h4>Price: '.$price.'$</h4></div>';
		
		$query3 = "SELECT * FROM usertable where userId='$userid'"; 
		$resultSet3 = $conn->query($query3, MYSQLI_STORE_RESULT);
		while ($row = $resultSet3->fetch_assoc()) {
			$fn = $row["fullName"];
			$phone=$row["contactNumber"];
			$email=$row["emailAddress"];
		
		
		echo'<div class="panel-heading"><h4>Posted By: '.$fn.'</h4></div>
		<div class="panel-heading"><h4>Contact: '.$phone.'</h4></div>
		
  
	  </div></div><hr>
		
		<h4> Add Detail: </h4>';
		
		echo'<p>'.$postdetails.'  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
        Aliquam in felis sit amet augue.</p>';
      
		echo'<p>Category: '.$category.'</p>
      <p>Sub Category: '.$subcat.'</p>
      <p>Location: '.$locality.','.' '.$state.','.' '.$country.'</p>
      <hr>';
	  
	  echo'<p>
      <a href="mailto:'.$email.'?Subject=Hello" target="_ext" class="center-block btn btn-primary">Contact Me</a>
      </p>
        
      <hr>';
		}
		}
		while ($row = $resultSet2->fetch_assoc()) {
			
			
			$c = $row["photopath"];
			
			echo'<div class="row"><div class="col-md-6 col-sm-4 col-xs-4 ">
                <div class="product-img">
                   <img class="img-responsive" src="'.$c.'" alt="not available" />
      </div></div>
			
			
	  <div class="col-md-6 col-sm-2 col-xs-6 ">
	  <div class="panel-heading"><h4>Date: '.$date.'</h4></div>
		<div class="panel-heading"><h4>Price: '.$price.'$</h4></div>';
		
		$query3 = "SELECT * FROM usertable where userId='$userid'"; 
		$resultSet3 = $conn->query($query3, MYSQLI_STORE_RESULT);
		while ($row = $resultSet3->fetch_assoc()) {
			$fn = $row["fullName"];
			$phone=$row["contactNumber"];
			$email=$row["emailAddress"];
		
		
		echo'<div class="panel-heading"><h4>Posted By: '.$fn.'</h4></div>
		<div class="panel-heading"><h4>Contact: '.$phone.'</h4></div>
	  </div></div><hr>
		
		<h4> Add Detail: </h4>';
		
		echo'<p>'.$postdetails.'  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
        Aliquam in felis sit amet augue.</p>';
      
		echo'<p>Category: '.$category.'</p>
      <p>Sub Category: '.$subcat.'</p>
      <p>Location: '.$locality.','.' '.$state.','.' '.$country.'</p>
      <hr>';
	  
	  echo'<p>
      <a href="#" target="_ext" class="center-block btn btn-primary">Contact Me</a>
      </p>
        
      <hr>';
	
		}}}?>
</div>
</div>

<div class="col-xs-4"><!--map-canvas will be postioned here--></div>
    </div>
  


        
        
        <script type='text/javascript' src="js/bootstrap.min.js"></script>
		<script type='text/javascript' src="//maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
		<script src="js/jquery.geocomplete.js" /></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js'></script>
		
  
    <script>
      $(function(){
    	 
    	  $("#geocomplete").geocomplete({
          map: ".map-canvas",
          details: "form",
          types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
		alert("Hi");
          $("#geocomplete").trigger("geocode");
        });
      });
    </script>
  
    </body>
</html>