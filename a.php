<?php

/*
	• Different page for admin login
	• Admin can delete both restaurant and personal account permanently
	• Log out and home button
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

Menu delete code here
*/



	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		foreach ($_POST['name'] as $key => $value)
		{
			echo $key;
			$sql_super = "DELETE  from restaurant_menu where image_path='".$key."'";
			$result_super = $connection->query($sql_super);
			unlink($key);
			header("Location: res_update_delete_menu.php");
		}
	}
?>		