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

here is the code for user check  and area check
*/
session_start();
echo $_SESSION['userpk'];
if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		$userpk=$_SESSION['userpk'];
		$area_1=$_POST["area_1"];
		$area_2=$_POST["area_2"];
		$area_3=$_POST["area_3"];
		$area_4=$_POST["area_4"];
		$map=$_POST["map"];

		if(strlen($map)>2)
		{
			$query="update res_area set area_1='$area_1',area_2='$area_2',area_3='$area_3',area_4='$area_4',res_map='$map' where res_user_id=$userpk";	
		}
		else
		{
			$query="update res_area set area_1='$area_1',area_2='$area_2',area_3='$area_3',area_4='$area_4' where res_user_id=$userpk";
		}

		


		


		$result=mysqli_query($connection,$query);



		header("Location: res_update_offers.php");		
	}


 ?>