<?php

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

	session_start();
	$userpk=$_SESSION['userpk'];
	
	
		/*

here is the code for user check 
*/
	
	//$row_img = $result_super->fetch_assoc();
	//echo $row_img["image_path"];
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$sql_super = "SELECT * FROM res_user where res_pk='".$userpk."'";
		$result_super = $connection->query($sql_super);
		$row_detail = $result_super->fetch_assoc();

		$result=1;

		if($row_detail["res_pass"]!=$_POST["oldpassword"]&&$_POST["password"]!=$_POST["cpassword"])
		{
			echo "<script>alert('Password Mismatch , Check again');</script>";
			$result=0;
		}
		if(isset($_POST["password"])&&isset($_POST["cpassword"])&&isset($_POST["oldpassword"])&&$result==1)
	{
		
		
		$password=$_POST["password"];

		

		$query="update res_user set res_pass='$password' where res_pk=$userpk";
		

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

	
input[type="password"] {
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





	</style>

	<!--
Javascript code for header dropdown menu and user login button
-->


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
		  <li><a href="res_update_offers.php"><strong>Update Offers and Area</strong></a></li>
		  <li><a href="res_update_menu.php"><strong>Update Menu</strong></a></li>
		  <li><a  class="active"  href="res_change_password.php"><strong>Change Password</strong></a></li>
		</ul>
	</div>

	
	
	
		<!--
	Profile password change  code here
	-->

	
	<div class="right_area">

		<form action="" method="post">

				<h2>Restaurant Information<h2>
				<hr>
				
				<strong>New Password:</strong>
				<br>
						  
						  <input type="password" id="password" placeholder="Password" name="password"  required="">
				<br>

				<strong>Confirm Password:</strong>
		<br>				
						
						  <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword"   required="">
		<br>

					<strong>Old Password:</strong>
		<br>				
						
						  <input type="password" id="cpassword" placeholder="Old Password" name="oldpassword" required="">
		<br>

				<button>Update</button>
		</form>
	</div>

</body>
</html>