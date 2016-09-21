<?php

/*
	• Restaurant Account Information (can update)
	• Offers and Area (can update delete replace offer and area)
	• Update Menu (menu update with image)
	• Password Change (can change Password) 
	• Log out and Home button
*/


/*

here is the code to connect with database
*/


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
	//$row_img = $result_super->fetch_assoc();
	//echo $row_img["image_path"];
	
			/*

here is the code for post mehod 
*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		if(isset($_POST["update_offer"]))
		{
			echo "<script>alert('afgsadfghdhdghfg')</script>";
		}
		if(isset($_POST["rn"])&&isset($_POST["email"])&&isset($_POST["phone"])&&isset($_POST["address"]))
	{
		

		
		$first_name=$_POST["rn"];
		
		$email=$_POST["email"];
		
		$phone=$_POST["phone"];
		$address=$_POST["address"];

		

		$query="update res_user set res_name='$first_name',res_address='$address',res_email='$email',res_phone='$phone' where res_pk=$userpk";
		

		$result=mysqli_query($connection,$query);

		// ------- test query for any error---------

		if(!$result)die("Database query faileded");
		else
			{
	    		header("Location: res_profile.php");
			}
	}
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
			position: fixed;
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
		    background-color: #555;
		    color: white;
		}

		.right_area
		{
			position: absolute;

			left: 32%;
			top:30%;
			width: 60%;
			height: 70%;
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
    position: absolute;
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
	Html dropdown code here
	-->

	<div class="header">
		<div  class="header_logo" >
		 	<img src="img/logo1.png" height="50" width="60">
		 	<a href="home.php" class="logo_link"></a>
		</div>
	</div>

	


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
		  <li><a class="active" href="res_profile.php"><strong>Restaurant Account</strong></a></li>
		  <li><a href="res_update_offers.php"><strong>Update Offers and Area</strong></a></li>
		  <li><a href="res_update_menu.php"><strong>Update Menu</strong></a></li>
		  <li><a href="res_change_password.php"><strong>Change Password</strong></a></li>
		</ul>
	</div>
<!--
	Html code for restaurant profile 
	-->
	<div class="right_area">

		<form action="" method="post">

				<h2>Restaurant Information<h2>
				<hr>
				
				<strong>Restaurant name:</strong>
				<br>
						  <input type="text" name="rn" size="30" value="<?php echo $row_detail["res_name"];?>" required>
				<br>

				<strong>Email ID:</strong>
		<br>				
						
						  <input type="email"   name="email"  value="<?php echo $row_detail["res_email"];?>" required>
		<br>

				<strong>Phone:</strong>			

						<br>

						<input type="text" name="phone" id="pphone"  size="30" value="<?php echo $row_detail["res_phone"];?>" required>
						<br>
				<strong>Address:</strong>
						<br>
						  <input type="text" name="address" size="30"  value="<?php echo $row_detail["res_address"];?>" required>

				<button>Update</button>
		</form>
	</div>

</body>
</html>