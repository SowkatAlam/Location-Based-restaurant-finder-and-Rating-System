<?php

		// step 1 --------- database connection established--------
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

here is the code for user check 
*/


	session_start();
	$userpk=$_SESSION['userpk'];
	
	$sql_super = "SELECT * FROM res_user where res_pk='".$userpk."'";
	$result_super = $connection->query($sql_super);
	$row_detail = $result_super->fetch_assoc();	



		
		//$destination=$_FILES["image_image"]["name"];

		if(isset($_POST["update_offer"]))
		{
			
			

			$temp = explode(".", $_FILES['image_image']['name']);
			$newfilename = 'offer1' . '.jpg';

			
			if(move_uploaded_file($_FILES['image_image']['tmp_name'],"img/restaurant/".$_SESSION["username"]."/" . $newfilename))
			{
				header("Location: res_update_offers.php");
			}	
		}
		else if(isset($_POST["update_logo"]))
		{
			
			$temp = explode(".", $_FILES['image_image1']['name']);
			$newfilename = 'restaurant_logo' . '.jpg';
			//$newfilename = 'restaurant_logo' . '.' . end($temp);

			/*
			echo $newfilename."<br> <br> <br>";
			echo $_FILES['image_image1']['tmp_name']."    ". "img/restaurant/".$_SESSION["username"]."/" . $newfilename;
			*/

			
			if(move_uploaded_file($_FILES['image_image1']['tmp_name'],"img/restaurant/".$_SESSION["username"]."/" . $newfilename))
			{
				header("Location: res_update_offers.php");
			}	
		}

		if(isset($userpk))
		{
				$sql_super_area = "SELECT * FROM res_area where res_user_id='".$userpk."'";
				$result_super_area = $connection->query($sql_super_area);
				$row_detail_area = $result_super_area->fetch_assoc();			
		}
	

	
	
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>

<!--
css code 
-->

	<style>
		body	
		{
			margin:0 auto;
		}
		.header
		{
			width:100%;	
			margin: 0 auto;
			height: 70px;
			background-color: #158A43;
			
		}
		.header_logo
		{
			position: absolute;
			left: 10%;
			top: 2%;
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
		    background-color: #555;
		    color: white;
		}

		.right_area
		{
			position: absolute;

			left: 32%;
			top:30%;
			width: 60%;
			height: 165%;
			padding-left: 1%;
			background-color: #f1f1f1;
		}

	
input[type="text"] {
  display: block;
  margin: 0;
  
  font-family: sans-serif;
  font-size: 22px;
  appearance: none;
  box-shadow: none;
  border-radius: none;
}
input[type="text"]:focus {
  outline: none;
}

		/* Dropdown Button */
.dropbtn {


	


    background-color: #158A43;
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
    position: fixed;
	right: 10%;
	top: 3%;

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

	<!--
Javascript code for header dropdown menu and user login button
-->



	</style>

	<script type="text/javascript">
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
	Html Header code here
	-->

	<div class="header">
		<div  class="header_logo" >
		 	<img src="img/logo1.png" height="50" width="60">
		 	<a href="home.php" class="logo_link"></a>
		</div>
	</div>

	

<!--
	Html dropdown code here
	-->


	<div class="dropdown">
  		<button onclick="myFunction()" class="dropbtn">My Account</button>
  		<i class="fa sort-desc" class="dropbtn"></i>
  		<div id="myDropdown" class="dropdown-content">
		    <a href="profiler.php">My Profile</a>
		    <a href="logout.php">Log Out</a>
  		</div>
	</div>

<!--
	Html profile_vertical_menu code here
	-->
	<div class="profile_vertical_menu">
		<ul>
		  <li><a href="res_profile.php"><strong>Restaurant Account</strong></a></li>
		  <li><a class="active" href="res_update_offers.php"><strong>Update Offers and Area</strong></a></li>
		  <li><a href="res_update_menu.php"><strong>Update Menu</strong></a></li>
		  <li><a    href="res_change_password.php"><strong>Change Password</strong></a></li>
		</ul>
	</div>


	<div class="right_area">

		<!--
	Profile update offer code here
	-->

		<form action="res_update_offer_update.php" method="post">

			<h3>We want your suggestion on your Restaurant Location</h3>
			<p>Enter some area name :</p>
			<input type="text" placeholder="area i" name="area_1" value="<?php echo $row_detail_area['area_1'];?>" required>
			<input type="text" placeholder="area ii" name="area_2" value="<?php echo $row_detail_area['area_2'];?>" >
			<input type="text" placeholder="area iii" name="area_3" value="<?php echo $row_detail_area['area_3'];?>"  >
			<input type="text" placeholder="area iv"  name="area_4" value="<?php echo $row_detail_area['area_4'];?>" >
			<hr>
			<h1>Here give your Restaurant's google map embed code</h1>

			<input type="text"  name="map" >

		
		<input type="submit">

		</form>
			<hr>

			<h3 >Update Restaurant Logo</h3>
			<div class ="update_menu1" >

			
				<img src="<?php echo "img/restaurant/".$_SESSION["username"]."/restaurant_logo.jpg" ?>" alt="No logo has selected" style="width:304px;height:228px;">

				

				<form action="" method="POST" enctype="multipart/form-data" >

					<input type="file" name="image_image1" />
					<input type="submit" name="update_logo" value="Submit">
				
				</form>
			</div>

			<hr>

			<h3 >Update New Offer</h3>

			<div class ="update_menu">

			
				<img src="<?php echo "img/restaurant/".$_SESSION["username"]."/offer1.jpg" ?>" alt="Currently no offer is given" style="width:304px;height:228px;">

				

				<form action="" method="POST" enctype="multipart/form-data" >

					<input type="file" name="image_image" />
					<input type="submit" name="update_offer" value="Submit">
				</form>
			</div>


			

	</div>


</body>
</html>

<script type="text/javascript">

</script>