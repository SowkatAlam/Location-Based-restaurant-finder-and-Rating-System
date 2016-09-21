
<?php

/*
		• User Account information (updateable)
	• Password Change option
	• Logout and Home button
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
		
		$sql_super = "SELECT * FROM user where user_pk='".$userpk."'";
		$result_super = $connection->query($sql_super);
		$row_detail = $result_super->fetch_assoc();
	?>




<?php
// step 2 ---------  perform database query---------


/*

here is the code for user profile information retrive
*/

	if(isset($_POST["username"]))
	{

	$user_user_name_temp=$_POST["username"];

 	$query=" select *from user where user_name like '".$_POST['username']."' ";

	$result=mysqli_query($connection,  $query);	

	
	if($result->num_rows>0)
	{
		echo "<script>alert('user name taken , try with another one')</script>";
	}
	if($result->num_rows<=0)
	{
		$query=" select *from user where user_email like '".$_POST['email']."' ";		

		$result=mysqli_query($connection,  $query);	


		if($result->num_rows>0)
		{
			echo "<script>alert('email is used , try with another one')</script>";
		}
	}
	


		if($result->num_rows<=0)
		{
			$query=" select *from res_user where res_id like '".$_POST['username']."' ";

			$result=mysqli_query($connection,  $query);	

			
			if($result->num_rows>0)
			{
				echo "<script>alert('user name taken , try with another one')</script>";
			}




			if($result->num_rows<=0)
			{
				$query=" select *from res_user where res_email like '".$_POST['email']."' ";		

				$result=mysqli_query($connection,  $query);	


				if($result->num_rows>0)
				{
					echo "<script>alert('email is used , try with another one')</script>";
				}
			}

		}



	}
	
	/*

here is the code for user profile information update
*/

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{




		


		
		$first_name=$_POST["fn"];
		$last_name=$_POST["ln"];
		$email=$_POST["email"];
	
		$phone=$_POST["phone"];
		$address=$_POST["address"];



		$query="update user set user_first_name='$first_name',user_last_name='$last_name',user_address='$address',user_email='$email',user_phone='$phone' where user_pk=$userpk";



		


		$result=mysqli_query($connection,$query);

		// ------- test query for any error---------

		if(!$result)die("Database query faileded");
		else
			{
				header("Location: user_profile.php");
			
			}
	


	}
	


	
?>





<!DOCTYPE html>
<html>
	<head>
<!--
css code 
-->
		<style>

			.form_area
			{

				

				
				position: absolute;
				left: 35%;
				top:30%;
				
				height: 800px;
				width: 58%;
				position: absolute;				
				background-color:#f1f1f1;
				opacity:.9;
				

			}
			.form_inner_area
			{
				
				height: 200px;
				width: 250px;
				position: absolute;
				left: 50px;
							
			}
			.img_all
			{
				position: absolute;
				left:160px;
				bottom: 100px;
			}

		</style>

		<!--
	Javascript code for validation 
	-->

		<script>
	
		function validation()
		{
			var flag=true;
			
			var x = document.forms["myForm"]["fn"].value;
			if (x == null || x == "") {


				flag=false;
			}
			
			
			x = document.forms["myForm"]["ln"].value;
			if (x == null || x == "") {
			flag=false;
			}
			
			
			
			
			var pass = document.getElementById("password").value;
			var cpass = document.getElementById("cpassword").value;
					

			
			var gender_validation=true;
			
			if(document.getElementById("gmale").checked) {
				}
				else if(document.getElementById('gfmale').checked) {
					//Female radio button is checked
				}
				else if(document.getElementById('gomale').checked) {
				
				}
				else
				{
					gender_validation=false;				
				}
				
			
		
			
			
			if(flag==false)
			{
				alert("Input Invalid fill all area with valid information");
				return false;
			}
			
			
			
			x = document.forms["myForm"]["phone"].value;
			
			if(isNaN(x)||x.length==0)
			{
				alert("Invalid Phone");
				return false;
			}
			
			
			var formEmail=document.forms["myForm"]["email"].value;
			
			var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			
			var email_valid=true;
			if(formEmail==null||formEmail=="")
			{
				email_valid=false;
			}
			
			if(pattern.test(formEmail))
			{
			
			}
			else
			{
			
			email_valid=false;
			}
			
			if(email_valid==false)
			{
				alert("Email Pattern invalid");
				return false;
			}
			
			if(pass!=cpass||pass.length==0||cpass.length==0)
			{
				alert(" Password Does not match or empty field . Try again");
				return false;
			}
			
			
			if(gender_validation==false)
			{
				alert("Gender not selected");
				return false;
			}
			
						
		var em = document.forms["myForm"]["email"].value;
			var atpos = em.indexOf("@");
			var dotpos = em.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length) {
				alert("Not a valid e-mail address");
				return false;
			}


			x = document.forms["myForm"]["address"].value;
			if (x == null || x == "") {
				alert("Empty Address Field");
				return false;
			}
			
			

			var xxx = document.forms["myForm"]["username"].value;
			if (xxx == null || xxx == "") {

				alert("username Invalid");
				return false;
			}
			
		}
		

		

//onsubmit="return validation()" 

		</script>
	<style>
		input[type=submit] {
			width: 100%;
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			top:55%;
			
			
		}
		
			input[type=submit]:hover {
			background-color: #45a049;
		}

		
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			
			
			font-family: inherit;
			font-size: 0.95em;
		}
		
			input[type=email], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-family: inherit;
			font-size: 0.95em;
		}
		
			input[type=password], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-family: inherit;
			font-size: 0.95em;
		}
		
		
		
	body	
		{
			margin:0 auto;

			
			/*background-color: #E9EBEE;
			*/
		 
		  
		 
		  
		  font-family: 'Open Sans', sans-serif;
		  

		}
		.header
		{
			width:100%;	
			margin: 0 auto;
			height: 70px;
			background-color: #158A43;
			position: fixed;
			z-index: 1;
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

    position: fixed;
    z-index: 1;
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

	<body >
	
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
	

	<div class="profile_vertical_menu">
		<ul>
		  <li><a class="active" href="user_profile.php"><strong>User Account</strong></a></li>
		  <li><a href="user_change_password.php"><strong>Change Password</strong></a></li>
		</ul>
	</div>

	
	<!--
	Html form code here
	-->

	
	<form name="myForm"  onsubmit="return validation()" action="" method="post">

		<div class="form_area" style="padding-left:50px;">
		<h2 >User Infromation </h2>
				<hr>
			<div class="form_inner_area">


				
			
				
			  
				  
				
				<h3>First Name : </h3>

				
				  <input type="text" name="fn" size="30" value="<?php echo $row_detail["user_first_name"];?>" style="width:400px;" placeholder="First Name"  required>
				<h3>Last Name : </h3>
				
				  <input type="text" name="ln" size="30" style="width:400px;" value="<?php echo $row_detail["user_last_name"];?>"  placeholder="Last Name" required>
				<h3>Email : </h3>
				
				  <input type="email"  placeholder="example@abc.com" value="<?php echo $row_detail["user_email"];?>" style="width:400px;"  name="email" size="30" required>
				
				
				

				<h3>Phone : </h3>

				<input type="text" name="phone" id="pphone" value="<?php echo $row_detail["user_phone"];?>" placeholder="Phone"  size="30" style="width:400px;" required>
				<h3>Address : </h3>
				
				  <input type="text" name="address" value="<?php echo $row_detail["user_address"];?>" size="30" placeholder="Address" style="width:400px;" required>
		
					<br>
					<br>
					<input type="submit" value="Update"  >
					</div>
				

				
			</div>
		</div>
	</form>
	

	
	</body>
</html>


<?php
// step 5  --------------database connection Close -------------

mysqli_close($connection);

?>