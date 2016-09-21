<?php

		// step 1 --------- database connection established--------
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="";
		$dbname="restaurant_database";

		$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		if(mysqli_connect_errno())
		{
			die("Database Connection Failed : ".mysqli_connect_error()."(".mysqli_connect_errno().")");
		}
		else
		{
			echo "Database connection established";
		}
	?>





<html>
<body>

<head>
	<script>			
		
		
	</script>
</head>

<body >


<?php
// step 2 ---------  perform database query---------

	$query="select *from user";

	$result=mysqli_query($connection,$query);

	// ------- test query for any error---------

	if(!$result)die("Database query failed");
	else echo "Database query established";
?>





 





<?php
	//step 3: use returns data (if any)-------------

	while ($row=mysqli_fetch_row($result)) {
		// output in row from each row in result
		var_dump($result);
		echo "<hr>";
	}
?>


<div>

<strong>Congretulation You have Registered yourself</strong>
<br>




<?php
// step 2 ---------  perform database query---------

	$username=$_POST["username"];
	$first_name=$_POST["fn"];
	$last_name=$_POST["ln"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$phone=$_POST["phone"];
	$address=$_POST["address"];

	$gender=$_POST["gender"];

	$query="INSERT INTO user (user_name,user_pass,user_first_name, user_last_name,user_address,user_email,user_phone,user_gender) VALUES ('$username', '$password','$first_name','$last_name','$address','$email','$phone','$gender')";
	
	





	$result=mysqli_query($connection,$query);

	// ------- test query for any error---------

	if(!$result)die("Database query faileded");
	else echo "Database query establisheded------";
?>




<br>
<br>
<br>
<br>
<hr>
<hr>
<hr>
<hr>

<!--
	code for showing details of user
	-->

Welcome : <?php  echo $_POST["fn"]."  ".$_POST["ln"]; ?><br>

Your email address is: <?php echo $_POST["email"]; ?><br>

Your phone Number is: <?php echo $_POST["phone"]; ?><br>

Your password is: <?php echo $_POST["password"]; ?><br>



Your Address is: <?php echo $_POST["address"]; ?><br>

Your Gender is: <?php echo $_POST["gender"]; ?><br>





</div>


</body>
</html>


<?php
// step 5  --------------database connection Close -------------

mysqli_close($connection);

?>		