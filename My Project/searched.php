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


?>	
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables Bootstrap 3 example</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">

		<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10-dev/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
		<link href="css/signin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
				
			} );
		</script>
		
		 <link rel="shortcut icon" href="assets/img/favicon.png">
  
		
		
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
		<script>
		$(function() {
			
			$("#json-one").change(function() {
				var $dropdown = $(this);
				
			
				$.getJSON("jsondata/data.json", function(data) {
				
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
          <a class="navbar-brand" href="#">Craigslist</a>
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
		<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
     <form action="searched.php" method="post">
	<ul class="nav nav-sidebar">
				<li><h4>Modify your search:</h4></li>
              <li><a href="#">Select Category</a></li>
              <li><select id="json-one" class="form-control input-sm" class="input-small" name="json-one">
			<option selected value="base"><span class="glyphicon glyphicon-search"></span>Please Select</option>
			<option value="ForSale">ForSale</option>
			<option value="Community">Community</option>
			<option value="Vehicles">Vehicles</option>
			<option value="RealEstate">RealEstate</option>
			<option value="Jobs">Jobs</option>
			<option value="Classes">Classes</option>
		</select></li>
			</ul>
            
			<ul class="nav nav-sidebar">
			<li><a href="#">Select a subCategory</a></li>
              <li><select id="json-two" class="form-control input-sm" class="input-large" name="json-two">
			<option>Please choose from above</option>
			</select>
	</li>
            </ul>
            <ul class="nav nav-sidebar">
			
			<li><a href="#">Select a Location</a></li>
              <li><input id="geocomplete" class="form-control" type="text" placeholder="Type the Zipcode" value="" onkeypress="return isNumberKey(event)"/>
			<li><button class="btn btn-default btn-sm type=" id="find" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp; Find</button></li>
            
			<li><input name="postal_code" class="form-control" type="text" value=""></li>
			<li><input name="locality" class="form-control" type="text" value=""></li>
			<li><input name="country" class="form-control" type="text" value=""></li>
			<li><input name="administrative_area_level_1" class="form-control" type="text" value=""></li>
			
			</ul>
			<input type="submit" value="Search">
          </form>
        </div><!--/span-->
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
			
	
          <h2 class="sub-header">View Related Posts</h2>
		  <h4>Search results in: <?php echo$cat.' '.'/'.' '.$subcat;?></h4>
          
		  <div class="table-responsive">
            <form action="viewad.php" method="post">
			<table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th>Select<span class="glyphicon glyphicon-chevron-down"></span></th>
				  <th>Posts<span class="glyphicon glyphicon-chevron-down"></span></th>
                  <th>Price<span class="glyphicon glyphicon-chevron-down"></span></th>
                  <th>Date<span class="glyphicon glyphicon-chevron-down"></span></th>

                </tr>
              </thead>
              <tbody>
            
                
				
<?php		
		$query1 = "SELECT * FROM PostDetails where country = '$country' and state = '$state' and locality = '$locality' and zipcode='$zip' and category = '$cat' and subCategory = '$subcat'"; 
 
	$resultSet = $conn->query($query1, MYSQLI_STORE_RESULT);

	while ($row = $resultSet->fetch_assoc()) 
	{ 

		
	$postid = $row["postId"];
	
	$posttitle=$row["postTitle"];
	$postdetails=$row["postDetails"];
	$price=$row["Price"];
	$date=$row["Date"];
        
	
			 echo'<tr><td><input type="radio" name="post" value="'.$postid.'"</td>';
			echo '<td><div class="row"><div class="col-md-3 col-sm-2 col-xs-3 ">
                <div class="product-img">';
                 echo  '<img class="img-responsive" src="" alt="not available" />';
                echo'</div></div><div class="col-xs-6 col-sm-6">'.$postid.':'.' '.$posttitle.'</div>
				<div class="col-xs-8 col-sm-4"><br/></div>';
				echo'<p><div class="col-xs-8 col-sm-6">'.$postdetails.'</div></p></div></td>';
                  echo'<td>'.$price.'$</div></td>';
                  echo'<td>'.$date.'</div></td></tr>';
				  
				  
		
		}
        
				
		?>		
                  
                
                
              </tbody>
            </table>
			<input type="submit" value="View Details">
			</form>
          </div>

      </div><!--/row-->
	</div>
</div><!--/.container-->
<footer>
  <p class="pull-right">©2014 Company</p>
</footer>
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js'></script>
		
    
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<script src="js/jquery.geocomplete.js"></script>

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
	</body>
</html>