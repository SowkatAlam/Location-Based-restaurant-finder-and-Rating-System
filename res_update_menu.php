<?php
		session_start();
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
	
	$userpk=$_SESSION['userpk'];
	
	$sql_super = "SELECT image_path FROM restaurant_menu where restaurant_id='".$userpk."'";
	$result_super = $connection->query($sql_super);
	
	//$row_img = $result_super->fetch_assoc();
	//echo $row_img["image_path"];

	
	
			/*

here is the code for user check and menu update
*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		









		
		

		

		





		$destination="img/restaurant/".$_SESSION["username"]."/menu/".uniqid().date("Y-m-d-H-i-s").$_FILES['image_image']['name'];
		//$destination=$_FILES["image_image"]["name"];


		//echo $name."asfsdf";
		$filename=$_FILES['image_image']['tmp_name'];
		
		if(move_uploaded_file($filename, $destination))
		{
			
			$sql="INSERT INTO restaurant_menu (restaurant_id,image_path) values('$userpk','$destination')";

			mysqli_query($connection,$sql);	
			header("Location: res_update_menu.php");
		}


	}
	
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>



	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/gallery.css">



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

		.update_menu
		{
			position: absolute;
			
			
			
			
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
		  <li><a  href="res_profile.php"><strong>Restaurant Account</strong></a></li>
		  <li><a href="res_update_offers.php"><strong>Update Offers and Area</strong></a></li>
		  <li><a class="active" href="res_update_menu.php"><strong>Update Menu</strong></a></li>
		  <li><a href="res_change_password.php"><strong>Change Password</strong></a></li>
		</ul>
	</div>
<!--
	Html Menu update code here
	-->
	
	
	<div style="position:absolute;top:30%;right:3%;">
		<a href="res_update_delete_menu.php">
			<img src="img/delete.jpg" width="50px;" height="50px;">
		</a>
	</div>

	<div class="right_area">
		<h2>Add New Menu</h2>
		<hr>
		<div class ="update_menu">

			<form action="" method="POST" enctype="multipart/form-data">

				<input type="file" name="image_image" />
				<button>Submit</button>
			</form>

		</div>

		<div class="container">
			<div class="gallery">
			<h2>List of Menu</h2>
		<hr>
			<?php for($x=1;$x<=$result_super->num_rows;$x++): ?>
				<div class="gallery-item">

					<a href="<?php $row_img = $result_super->fetch_assoc(); echo $row_img["image_path"];?>" 

					data-lightbox="roadtrip" ><img src="<?php  echo $row_img["image_path"];?>" height="200px" width="200px"> </a>
					
				</div>
			<?php endfor; ?>
			</div>

		</div>
	</div>
	
<script src="js/lightbox-plus-jquery.js"></script>


</body>
</html>