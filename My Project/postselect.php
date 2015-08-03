<?php

session_start();


?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>Post your Add</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

       
		<style type="text/css">
      body {
			padding-top: 50px;
			}
   
	  
	  #errmsg
		{
		color: red;
		}
		
		fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
		}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
		}
    </style>
		
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a class="navbar-brand" href="#">Brand</a>
			</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</div><!--/.nav-collapse -->
			</div>
		</div>

	<div class="container">
  
	<div class="text-center">
 
	<form action="request.php" enctype="multipart/form-data" method="POST">
	<fieldset class="scheduler-border">
    <legend class="scheduler-border">Post A FREE CLASSIFIED ADD</legend>
	
	<p>
    <div class="row">
        <div class="col-xs-4"><h5>User ID</h5></div>
		<?php $var_value = $_SESSION['userIdsession']; 
		echo '<div class="col-xs-8"><input name="userId" class="form-control" type="text" value="'.$var_value.'"></div>
    </div></p>';?>
	
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Date</h5></div>
		<div class="col-xs-8"><input name="date" id="date" class="form-control" type="text" value=""></div>
    </div></p>
	
	
	
	<p>
	<div class="row">
		<div class="col-xs-4"><h5>Select Category</h5></div>
      <div class="col-xs-4"><select id="json-one" class="form-control input-sm" class="input-small" name="json-one">
			<option selected value="base"><span class="glyphicon glyphicon-search"></span>Please Select</option>
			<option value="ForSale">ForSale</option>
			<option value="Community">Community</option>
			<option value="Vehicles">Vehicles</option>
			<option value="RealEstate">RealEstate</option>
			<option value="Jobs">Jobs</option>
			<option value="Classes">Classes</option>
		</select>
	</div></div></p>
	
		<p>
    <div class="row">
        <div class="col-xs-4"><h5>Select Sub-Category</h5></div>
		<div class="col-xs-4"><select id="json-two" class="form-control input-sm" class="input-large" name="json-two">
			<option>Please choose from above</option>
	</select>
	</div></div></p>
	
	<p>
	<div class="row">
		<div class="col-xs-4"><h5>Select Location</h5></div>
      <div class="col-xs-4"><input id="geocomplete" class="form-control" type="text" placeholder="Type the Zipcode" value="" onkeypress="return isNumberKey(event)"/></div>
      <div class="col-xs-2"><input type="button" value="find" class="btn btn-default id="find"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp; 
	 </div>
	</div></p>
	<p>
    <div class="row">
        <div class="col-xs-4"><h5>Postal Code</h5></div>
		<div class="col-xs-8"><input name="postal_code" class="form-control" type="text" value=""></div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Locality</h5></div>
		<div class="col-xs-8"><input name="locality" class="form-control" type="text" value=""></div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Country</h5></div>
		<div class="col-xs-8"><input name="country" class="form-control" type="text" value=""></div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Country Code</h5></div>
		<div class="col-xs-8"><input name="country_short" class="form-control" type="text" value=""></div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>State</h5></div>
		<div class="col-xs-8"><input name="administrative_area_level_1" class="form-control" type="text" value=""></div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Add Address</h5></div>
		<div class="col-xs-8"><input name="addaddress" class="form-control" type="text" value=""></div>
    </div></p>
    <p>
	<div class="row">
        <div class="col-xs-4"><h5>Add Title</h5></div>
		<div class="col-xs-8"><input name="addtitle" class="form-control" type="text" value=""></div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Photos</h5></div>
		<div class="col-xs-8"><input type="hidden" name="MAX_FILE_SIZE" value="512000" /><div class="form-group">
		<input type="file" id="exampleInputFile" name="uploadedfile" title="The uploaded file shouldn't increase 500KB">
		</div>
	</div>
    </div></p>
	<p>
	<div class="row">
        <div class="col-xs-4"><h5>Describe what makes your ADD unique</h5></div>
		<div class="col-xs-8"><textarea class="form-control" rows="3" name="postdetail"></textarea></div>
    </div></p>
	
	</fieldset>
	<fieldset class="scheduler-border">
    <legend class="scheduler-border">SELLER INFORMATION</legend>
		<p>
		<div class="row">
        <div class="col-xs-4"><h5>I am</h5></div>
		<div class="col-xs-3"><div class="radio">
		<label>
		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
		An Individual
		</label>
		</div>
		<div class="radio">
		<label>
		<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
		A Professional/Business
		</label>
		</div>
		</div></div></p>
		<p><div class="row">
		<div class="form-group">
		<label for="inputEmail3" class="col-xs-4 control-label">Email</label>
		<div class="col-xs-8">
		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
		</div></div></div></p>
		<p>
		<div class="row">
        <div class="col-xs-4"><h5>Phone Number</h5></div>
		<div class="col-xs-8"><input name="addphone" class="form-control" type="text" value=""></div>
		</div></p>
		<p>
		<input class="btn btn-primary btn-lg" type="submit" value="POST">
		</p>
	
	</fieldset>
	   </form>
	</div>
  
</div>
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type='text/javascript' src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
   
		<script type='text/javascript' src="js/jquery.geocomplete.js"></script>

        <script>

		
			$(function(){
			
			
			$('input[title]').tooltip({placement:'bottom'});
			
        $("#geocomplete").geocomplete({
          details: "form",
          types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
		
		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

			return true;
		}
		
		
		
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
	
<script>
$(function() {


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd;
} 

if(mm<10) {
    mm='0'+mm;
} 

today = mm+'/'+dd+'/'+yyyy;
document.getElementById("date").value = today;
});	
	</script>
		
    </body>
</html>