

<?php


/*
	• Search option (user can search area)
	• Creat Account (restaurant or person can creat own account for login)
	• Login with valid username & password

*/



/*

here is the code to connect with database
*/

session_start();

$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="restaurant_database";

		$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		if(mysqli_connect_errno())
		{
			die("Database Connection Failed ");
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

			
			background: url("img/cover.jpg") no-repeat;
			background-size: 100%;

			background-position: 0% -8%;	

		 
		  
		 
		  
		  font-family: 'Open Sans', sans-serif;
		  

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


		.user_info
		{
			position: absolute;
			height: 10%;
    		width: 30%;

    		right: 5%;
    		top: 5%;

    		background-color: powderblue;
		}

		.search_box
		{
			position: absolute;
			height: 20%;
    		width: 60%;

    		left:30%;
    		top: 40%;
    		color: powderblue;
    		font-family: 'Open Sans', sans-serif;
    		
		}


		
		form {
                width:700px;
                margin:50px auto;
			}
			

		.search {
		                padding:12px 35px;
		                /*background:rgba(50, 50, 50, 0.3);
		                */
		                background:rgba(55, 55, 55, 0.3);
		                border:0px solid #dbdbdb;
		                
		              font-size: 15px;
		             	
		}
		.button {
		                position:relative;
		                padding:6px 15px;
		                left:-8px;
		                border:2px solid #207cca;
		                background-color:#207cca;
		                color:#fafafa;
		}
		.button:hover  {

		                background-color:#fafafa;
		                color:#207cca;
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

	function helpline()
	{
		alert("HelpLine : 01620853872");
	}
	</script>

</head>
<body>

	
<!-- header code starts here -->


	<div class="header">
		<div  class="header_logo" >
		 	<img src="img/logo1.png" height="50" width="60">
		 	<a href="home.php" class="logo_link"></a>
		</div>
	</div>

	


	

<?php
	/*

here is the code for user check 
*/
//onclick="location.href='http://www.example.com'"
    if(!isset($_SESSION["usertype"]))
    {
        	echo '<div class="dropdown">
        	<a href="registration.php"><button  class="dropbtn">Create Account</button></a>
  		<a href="login.php"><button  class="dropbtn">Login</button></a>

  
	</div>';
    }
    else
    {

    	echo '<div class="dropdown">
  		<button onclick="myFunction()" class="dropbtn">My Account</button>
  		<i class="fa sort-desc" class="dropbtn"></i>
  		<div id="myDropdown" class="dropdown-content">
		    <a href="profiler.php">My Profile</a>
		    <a href="logout.php">Log Out</a>
  		</div>
	</div>';


    }
?>

	<!--
Here is the code for Help for user
-->
	
	<div class ="help" style="color:white;

	position: absolute;
			right: 30%;
			top: 5%;
	">
		


		<button style="font-size:15px; color:purple padding: 0;
		border:none;
		color: white;
background-color: #339933; border-radius:10px;" onclick="helpline()"">Help ?</button>
		
	</div>



<!--
Here is the code for Search box 
-->
	

	<div class="search_box">
		
		<form action="search.php" method="post">
                                <input type="text" placeholder="Search..."  size="50" name="search" class="search">
                                <input type="submit" value="Search" class="search">
		</form>

	</div>



	
	
	

	
</body>


</html>