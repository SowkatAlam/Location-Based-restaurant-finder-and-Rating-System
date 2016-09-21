
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
		
	?>

	
	
<?php
// step 2 ---------  perform database query---------
	
	/*

User registraion validation codeing 
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


	if(isset($_POST["username"])&&isset($_POST["rn"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["phone"])&&isset($_POST["address"])&&$result->num_rows<=0)
	{
		
		$username=$_POST["username"];
		$first_name=$_POST["rn"];
		
		$email=$_POST["email"];
		$password=$_POST["password"];
		$phone=$_POST["phone"];
		$address=$_POST["address"];

		
/*

user registration insert
*/


		$query="INSERT INTO res_user (res_id,res_pass,res_name, res_address,res_email,res_phone) VALUES ('$username', '$password','$first_name','$address','$email','$phone')";


		$result=mysqli_query($connection,$query);

		// ------- test query for any error---------

		if(!$result)die("Database query faileded");
		else
			{

				$query="select *from res_user where res_id='".$username."'";
				$result=mysqli_query($connection,$query);
				$row = $result->fetch_assoc();
				
				$userpk=$row["res_pk"];
				
				$area_1="";
				$area_2="";
				$area_3="";
				$area_4="";
				$map="";
				$query="INSERT INTO res_area (res_user_id,area_1,area_2,area_3,area_4,res_map) VALUES ('$userpk', '$area_1','$area_2','$area_3','$area_4','$map')";


				$result=mysqli_query($connection,$query);


				if (!file_exists('img/restaurant/'.$username)) {
					    mkdir('img/restaurant/'.$username, 0777, true);

					    mkdir('img/restaurant/'.$username.'/menu', 0777, true);
					}
	    		header("Location: success.php");
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
				left: 40%;
				top:15%;				
				height: 580px;
				width: 350px;
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
			top: 0%;
			background-color: #158A43;
			position: fixed;
			 z-index:99;
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
		
		</style>

		<script>
		
//onsubmit="return validation()" 
		function validation()
		{
			var flag=true;
			
			var x = document.forms["myForm"]["rn"].value;
			if (x == null || x == "") {


				flag=false;
			}
			
			
			
			
			
			
			
			var pass = document.getElementById("password").value;
			var cpass = document.getElementById("cpassword").value;
					

			
			
		
			
			
			if(flag==false)
			{
				alert("Input Invalid fill all area with valid information");
				return false;
			}
			
			
			
			x = document.forms["myForm"]["phone"].value;
			
			if(x.length==0)
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
	Html Form code for user registration 
	-->
	<form name="myForm"  onsubmit="return validation()" action="" method="post">

		<div class="form_area">
			<div class="form_inner_area">

<br>
				  <input type="text" name="username"  id="uuser_name" size="30" placeholder="username">
	  
			<br>
			
				  <input type="text" name="rn" size="30" placeholder="Restaurant Name">
				<br>
				
				  <input type="email"  placeholder="example@abc.com" name="email" size="30">
				<br>
				
				  <input type="password" id="password" placeholder="Password" name="password" size="30">
				<br>
			
				  <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword"  size="30">
				<br>

				

				<input type="text" name="phone" id="pphone" placeholder="Phone" size="30">
				</br>

				  <input type="text" name="address" size="30" placeholder="Address">
				<br>

				<input type="submit" value="Submit" >
			
			</div>
		</div>
	</form>
	

<br>

<!--
		<img src="https://restaurantfinderapp.files.wordpress.com/2013/02/cropped-restaurant_finder_1024_banner1.png" height="300px" width="700px">
-->
		
	</div>
	</body>
</html>


<?php
// step 5  --------------database connection Close -------------

mysqli_close($connection);

?>