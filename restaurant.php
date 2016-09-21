<?php

	
	
	
/*

• Restaurant Profile View
	• Restaurant Details with phon number and address
	• Find location with Google Map
	• Can see menus of restaurant
	• Exclusive offer
	• User can submit review for this restaurant
	• Direct Login, Sign Up and back to Home button
	
	

here is the code to connect with database
*/
		session_start();

		$usertype=null;
		$userpk=null;
		if(isset($_SESSION['usertype']))
		{
			$usertype=$_SESSION['usertype'];
			$userpk=$_SESSION['userpk'];
		}
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="restaurant_database";

		$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		if(mysqli_connect_errno())
		{
			die("Database Connection Failed ");
		}
						/*

							Restaurant get code here and information  retrive here
							*/


		$res_id=$_GET["id"];


		$sql_query = "SELECT * FROM res_user where res_id='".$res_id."'";
		$result_query_duper = $connection->query($sql_query);
		$row_detailname = $result_query_duper->fetch_assoc();
		
		$tempresname=$row_detailname['res_name'];
		$temppk=$row_detailname['res_pk'];
		$tempaddress=$row_detailname['res_address'];
		$tempemail=$row_detailname['res_email'];
		$tempphone=$row_detailname['res_phone'];



		$sql_query = "SELECT * FROM res_area where res_user_id='".$temppk."'";
		$result_query_duper = $connection->query($sql_query);
		$area_detailname = $result_query_duper->fetch_assoc();
		$tempmap=$area_detailname['res_map'];




		// for to get menu list
		$sql_super = "SELECT image_path FROM restaurant_menu where restaurant_id='".$temppk."'";
		$result_img = $connection->query($sql_super);
?>

<?php

/*

							Rating code here (php)
							*/

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$rating=0.0;

		if(isset($_POST["star1"]))
		{
			
			$rating=1;
		}
		else if(isset($_POST["star2"]))
		{
			
			$rating=2;
		}
		else if(isset($_POST["star3"]))
		{
			
			$rating=3;
		}
		else if(isset($_POST["star4"]))
		{
			
			$rating=4;
		}
		else if(isset($_POST["star5"]))
		{
			
			$rating=5;
		}
		$query="select * from rating where res_id='".$temppk."' and user_id='".$userpk."'";
		


		$result = $connection->query($query);

		$temp=$result->num_rows;
		//echo "<script>alert($result->num_rows)</script>";
		if($temp>0)
		{
			$query="update rating set rating='$rating' where res_id=$temppk and user_id=$userpk";
		

			$result=mysqli_query($connection,$query);

			
		}
		else
		{
			//$result_query_rating->num_rows==0
			$query="INSERT INTO rating (user_id,res_id,rating) VALUES ('$userpk','$temppk','$rating')";
			$result=mysqli_query($connection,$query);	
		}

		

	}
?>



<!--
rating code
-->
<?php

/*

							Rating calculation and count code here
							*/

							
if(isset($temppk))
{
	$sql_query = "SELECT * FROM rating where res_id='".$temppk."'";
		$result_query_rating = $connection->query($sql_query);
		$res_rating=0.0;
		$total_rating_given=0;
		$total_rating_given=$result_query_rating->num_rows;
		$isuserrated=false;
		for($x=0;$x<$result_query_rating->num_rows;$x++)
				{
						$row_detail = $result_query_rating->fetch_assoc();	
						
						$res_rating+=$row_detail["rating"];
				}
				if($total_rating_given>0)
				{
				$res_rating/=$total_rating_given;			
				}
		$res_rating=floor($res_rating);

}
		

		if(isset($userpk))
		{
			$sql_query = "SELECT * FROM rating where res_id='".$temppk."' AND user_id='".$userpk."'";
			$result_query_rating = $connection->query($sql_query);

			if($result_query_rating->num_rows>0)
			{
				
				$isuserrated=true;
			}
		}

		
?>
<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
	
<!--
css code 
-->

<style>
.header_down
{
	width: 100%;
	height: 60px;
	
	background-color: #e6f3ff;
}
.res_cover
{
	width: 100%;
	height: 250px;
	margin:0 auto;


background: url("../img/cover1.jpg") no-repeat;
background-size: 100%;

}
.res_cover_img
{
	position: absolute;
	left: 10%;
	top:18%;
	background-color: white;
	padding: 7px;
}
.res_cover_name
{
	position: absolute;
	left: 27%;
	top: 27%;
}
.res_cover_contact
{
		
}
.google_map
{
	position: absolute;
	top: 130%;
	left: 5%;
	width: 32%;
	height: 400px;
	background-color: white;

	padding: 10px;
	box-shadow: 1px 1px 1px grey;
	
}


/* left details

*/

.left_details
{
	position: absolute;
	left: 5%;	
	top: 50%;

	width: 30%;
	height: 400px;

	padding: 20px;
	
	/*text-shadow: 2px 2px 5px black;*/

    box-shadow: 1px 1px 1px grey;

	background-color: white;
	
	

}

/*
menu image showing here
*/
.menu_show
{
	position: absolute;
	top:50%;
	left: 40%;
	width: 55%;
	height: 100%;
	background-color: white;
}
.container
{
	position: absolute;
	
	
	max-width: 100%;
	padding-top: 5px;
	padding-left: 10px;

	/*background:#f0f0f0;*/
	background:white;
	margin: 0 auto;
}
.gallery
{
	width: 100%;
}
.gallery-item
{
	float: left;
	background:#E9EBEE;
	width: 42%;
	margin: 1%;
	padding:2%;
	

}
.gallery-item img
{
	width: 100%;
}

.starcss
{
	background-color: #ffb3b3; 
    border: none;
    color: white;
    padding: 7px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 50%;
}
.starcss1
{
	background-color: #ffb3b3; 
    border: none;
    color: white;
    padding: 4px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 50%;
}
.starfade
{
	background-color: #E9EBEE; 
    border: none;

    color: white;
    padding: 7px 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 50%;
}
iframe
{
	width: 100%;
	height: 100%;
}
.res_offer
{
	position: absolute;
	top: 210%;
	left: 5%;
	width: 32%;
	height: 300px;
	background-color: white;

	padding: 10px;
	box-shadow: 1px 1px 1px grey;
}
</style>


<style type="text/css">
	
	

	body	
		{
			margin:0 auto;

			

		 
		  
		 
		  
		  font-family: 'Open Sans', sans-serif;
		  background-color: #E9EBEE;

		}
		.header
		{
			width:60px;	
			margin: 0 auto;
			height: 50px;

			background-color: #158A43;
			position: absolute;
			top: 38%;
			right: 0%;

		}
		.header_logo
		{
			position: absolute;
			left: 10%;
			top: 15%;
		}
		.logo_link
		{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}


		.profile_vertical_menu
		{
			position: absolute;
			left: 10%;
			top: 30%;
		}

		.profile_vertical_menu ul
		{
			list-style-type: none;
		    margin: 0;
		    padding: 10%;
		    width: 230px;
		    background-color: #f1f1f1;
		    border: 1px solid #555;
		}
		li a
		{
			display: block;
		    color: #000;
		    padding: 8px 16px;
		    text-decoration: none;
		}


		li a.active {
		    background-color: #4CAF50;
		    color: white;
		}

		li {
		    text-align: center;
		    border-bottom: 1px solid #555;
		}
		li a:hover:not(.active) {
		    background-color: black;
		    color: white;
		}


		/* Dropdown Button */
.dropbtn {


	


    background-color: black;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: absolute;
	right: 50px;
	top: 30%;
 z-index: 1;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">

/*
$(document).ready(function(){
	alert("start");
    $("#start1").hover(function(){
        alert("start1");
        });
});
*/
	<!--
Javascript code for header dropdown menu and user login button
-->

		function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}







	</script>


</head>
<body>






	<!--
user session checking code here
-->	

<?php



//onclick="location.href='http://www.example.com'"
    if(!isset($_SESSION["usertype"]))
    {
        	echo '<div class="dropdown">
        	<a href="../home.php"><button  class="dropbtn">Home</button></a>
        	<a href="../registration.php"><button  class="dropbtn">Create Account</button></a>
  		<a href="../login.php"><button  class="dropbtn">Login</button></a>

  
	</div>';
    }
    else
    {
    	echo '<div class="dropdown">
  		<button onclick="myFunction()" class="dropbtn">My Account</button>
  		<i class="fa sort-desc" class="dropbtn"></i>
  		<div id="myDropdown" class="dropdown-content">
  			<a href="../home.php">Home</a>
		    <a href="../profiler.php">My Profile</a>
		    <a href="../logout.php">Log Out</a>
  		</div>
	</div>';


    }
?>



	<!--
cover image code here
-->

<div class="res_cover">

	<div class="res_cover_img">

		<?php

			echo "

			<img src='../img/restaurant/$res_id/restaurant_logo.jpg' alt='No logo has selected' style='width:190px;height:140px; '>
			";
		?>
	</div>

	<div class="res_cover_name" style='color:white;'>
		<?php
		echo "
		<h2 >$tempresname</h2>
		
		";
		?>
	</div>

	
</div>

	<!--
user session checking code  and res_cover_contact here
-->

	<div class="left_details">
		<div class="res_cover_contact" >

		

			
		<?php
		if(isset($usertype) &&$usertype=="user"&&$isuserrated!=true)
		{

			echo "
			
			<h2>Rating</h2>
			<hr>
			<form action='' method='post'>
				<input type='submit' class='starcss' name='star1' value='1' />
				<input type='submit' class='starcss' name='star2' value='2' />
				<input type='submit' class='starcss' name='star3' value='3' />
				<input type='submit' class='starcss' name='star4' value='4' />
				<input type='submit' class='starcss' name='star5' value='5' />
			</form>
			";
		}
		else
		{
			/*

here is the code for user check and rating
*/

			
			if(isset($usertype) &&$usertype=="user"&&$isuserrated==true)
			{
				echo "
					<h2 >Rating</h2>
					<h4>Rated</h4>
					
					<hr>
				";
				for($x=1;$x<=$res_rating;$x++)
				{
				echo "
				<button  type='button'class='starcss' disabled>$x</button>
					
				";
				}
		/*

here is the code for user check and rating
*/

				for($x=$res_rating+1;$x<=5;$x++)
				{

				if($x==5)
				{
					echo "
					<button  type='button'class='starfade' disabled>$x</button>
					";
					
				}
				else

				{
					echo "
					<button  type='button'class='starfade' disabled>$x</button>	
					";
					
				}
				
					
			
				}
				echo "
				<h4  style='float:right; color:#ffcc66;'>($total_rating_given Reviews)</h4>
				";

				
			}
					/*

here is the code for user check and rating
*/

			else
			{
				echo "
					<h2 >Rating</h2>
					
					<hr>
				";
				for($x=1;$x<=$res_rating;$x++)
				{
				echo "
				<button  type='button'class='starcss' disabled>$x</button>
					
				";
				}

				for($x=$res_rating+1;$x<=5;$x++)
				{

				if($x==5)
				{
					echo "
					<button  type='button'class='starfade' disabled>$x</button>
					";
					
				}
				else

				{
					echo "
					<button  type='button'class='starfade' disabled>$x</button>	
					";
					
				}
				
					
			
				}
				echo "
				<h4  style='float:right; color:#ffcc66;'>($total_rating_given Reviews)</h4>
				";
			}
		}
		?>
		<br>
		

			<?php
			
					/*

here is the code for user check and rating
*/

			echo "

			<h1>Resturant Details</h1>
			<hr>
			<p>Location : $tempaddress</p>

			

			<p>Contact : $tempphone</p>
			
			<p>Email : $tempemail</p>
			
			
			";

			if(isset($usertype) &&$usertype=="user"&&$isuserrated==true)

			{
				echo "
			
			
			
			<form action='' method='post'>

				<input type='text' value='Update : ' disabled style='background-color:#ffffff; border:0px; width:50px;'>
				<input type='submit' class='starcss1' name='star1' value='1' />
				<input type='submit' class='starcss1' name='star2' value='2' />
				<input type='submit' class='starcss1' name='star3' value='3' />
				<input type='submit' class='starcss1' name='star4' value='4' />
				<input type='submit' class='starcss1' name='star5' value='5' />
			</form>
			";
			}
			?>

		</div>
	</div>
	<div class="google_map" >

		<?php
		
				/*

here is the code for map
*/

		echo "
			$tempmap
		";
		?>
	</div>

	<div class="res_offer" >

		<?php
		echo "
		<h3 >Current Offer </h3>
		<hr>
		<div style='padding:15px; background-color:#E9EBEE; position:absolute; left:15%; top:25%;'>

		<img src='../img/restaurant/$res_id/offer1.jpg' alt='No logo has selected' style='width:300px;height:200px; '>
		</div>
		";
		?>

	</div>

	
	<div class="menu_show">
		<div class="container">
			<div class="gallery">
			<h2 >List of Menu</h2>
			<hr>
			<?php for($x=1;$x<=$result_img->num_rows;$x++): ?>
				<div class="gallery-item">

					<a href="../<?php $row_img = $result_img->fetch_assoc(); echo $row_img["image_path"];?>" data-lightbox="roadtrip"><img src="../<?php  echo $row_img["image_path"];?>" height="200px" width="200px"> </a>
				<hr>
				</div>

			<?php endfor; ?>
			</div>

		</div>
	</div>


<script src="../js/lightbox-plus-jquery.js"></script>

</body>
</html>