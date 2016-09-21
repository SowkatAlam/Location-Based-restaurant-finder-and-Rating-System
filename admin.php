<?php

/*
	• Different page for admin login
	• Admin can delete both restaurant and personal account permanently
	• Log out and home button
*/

	/*

here is the code to connect with database
*/
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

		Code to select user type and delete user 
		*/

		$total_user;
		$total_res_user;
		$sql_super = "SELECT * from user";

		$result_super = $connection->query($sql_super);

		$total_user=$result_super->num_rows;
		

		$sql_super = "SELECT *from res_user";

		$result_super = $connection->query($sql_super);

		$total_res_user=$result_super->num_rows;

		
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$username=$_POST["id"];

				$sql_super = "SELECT * from user where user_name='".$username."'";

				$result_super = $connection->query($sql_super);
				

				if($result_super->num_rows>0)
				{

					$temp=$result_super->fetch_assoc();
					$userpk=$temp["user_pk"];

					

					$sql_super = "DELETE  from user where user_pk='".$userpk."'";
					$result_super = $connection->query($sql_super);

					$sql_super = "delete  from rating where user_id='".$userpk."'";
					$result_super = $connection->query($sql_super);

					/*
					$sql_super = "select * from rating where user_id='".$username."'";
					$result_super = $connection->query($sql_super);


					for($x=1;$x<=$result_super->num_rows;$x++)
					{

						$row_img = $result_super->fetch_assoc();

						$row_img["image_path"]

						
					}
					*/

					//echo "<script>alert('found');</script>";
				}
				else
				{
					$sql_super = "SELECT * from res_user where res_id='".$username."'";

					$result_super = $connection->query($sql_super);

					if($result_super->num_rows>0)
					{
						$temp=$result_super->fetch_assoc();
						$userpk=$temp["res_pk"];

						


						$sql_super = "DELETE  from res_user where res_pk='".$userpk."'";
						$result_super = $connection->query($sql_super);

						$sql_super = "DELETE  from rating where res_id='".$userpk."'";
						$result_super = $connection->query($sql_super);


						$sql_super = "DELETE  from res_area where res_user_id='".$userpk."'";
						$result_super = $connection->query($sql_super);


						$sql_super = "DELETE  from restaurant_menu where restaurant_id='".$userpk."'";
						$result_super = $connection->query($sql_super);


						//echo "<script>alert('found res');</script>";

														function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}

				$dir="img/restaurant/".$username."";

				rrmdir($dir);

					}
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
	body	
		{
			margin:0 auto;
			background-color: #e6f3ff;
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
		.all
		{
			border: 1px solid;
			position: absolute;
			width: 60%;
			height: 60%;
			background-color: white;
			left: 20%;
			top: 25%;
			border-color: #e6f3ff;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}
		.user
		{
			border: 1px solid;
			position: absolute;
			left: 2%;
			top: 5%;
			width: 30%;
			height: 43%;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			border-color: #e6f3ff;
			color: #66c2ff;
		}

		.restaurant
		{
			border: 1px solid;
			position: absolute;
			width: 30%;
			height: 43%;
			top: 53%;
			left:2%;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			border-color: #e6f3ff;
			color: #66c2ff;
		}
		.login
		{
			border: 1px solid;
			position: absolute;
			width: 55%;
			height: 75%;
			top: 20%;

			
			left: 40%;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			border-color: #e6f3ff;
			
			color: #66c2ff;

		}
		.login-header,
		.login p {
		  margin-top: 0;
		  margin-bottom: 0;
		}

		/* The triangle form is achieved by a CSS hack */
		.login-triangle {
		  width: 0;
		  margin-right: auto;
		  margin-left: auto;
		  border: 12px solid transparent;
		  border-bottom-color: #28d;
		}

		

		.login-container {
		  background: #ebebeb;
		  padding: 12px;
		}

		/* Every row inside .login-container is defined with p tags */
		.login p {
		  padding: 12px;
		}

		.login input {
		  box-sizing: border-box;
		  display: block;
		  width: 80%;
		  border-width: 1px;
		  border-style: solid;
		  padding: 16px;
		  outline: 0;
		  font-family: inherit;
		  font-size: 0.95em;
		}

		.login input[type="text"],
		.login input[type="password"] {
		  background: #fff;
		  border-color: #bbb;
		  color: #555;
		}

		/* Text fields' focus effect */
		.login input[type="email"]:focus,
		.login input[type="password"]:focus {
		  border-color: #888;
		}

		.login input[type="submit"] {
		  background: #28d;
		  border-color: transparent;
		  color: #fff;
		  cursor: pointer;
		}

		.login input[type="submit"]:hover {
		  background: #18c;
		}

		/* Buttons' focus effect */
		.login input[type="submit"]:focus {
		  border-color: #05a;
		}
		
	</style>
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
	User details and admin desh board code
	-->
	
	<div class="all">
		<div class="user">

			<img src="img/user.jpg" height="80%" width="100%">

			
			<?php 
				echo "Total User : ".$total_user;
			 ?>
		</div>
		<div class="restaurant" >
		<img src="img/res_user.jpg" height="80%" width="100%">
			<?php 
				echo "Total Restaurant : ".$total_res_user;
			 ?>

		</div>
		
		<!--
	Html admin code
	-->
	
	
		<div class="login">
			<h4 >ADMIN:</h4>
			<hr>
			<br>
			<br>
			<form method="post" action="">
				<input type="text" name="id" placeholder="Enter Username to delete" style="position:absolute;left:10%;">
				<br>
				<br>
				<br>
				<br>
				<br>
				<input type="submit" value="Delete" style="position:absolute;left:10%;">
			</form>
			
		</div>
	</div>
</body>
</html>>