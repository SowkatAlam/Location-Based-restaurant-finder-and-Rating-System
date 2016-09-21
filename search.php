<?php

/*
	• Search option (user can search area without going home page again)
	• Left corner user can see Exclusive Restaurants list
	• User can select individual restaurant for details
	• Login and Creat account Still there
*/



// step 1 --------- database connection established--------
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
		
		
		/*

here is the code for Search resraurant from data
*/



		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$search=$_POST["search"];

			//select * from your_table where upper(your_column) like '%ANGEL%'


			/*
			$sql_super = "SELECT * FROM res_area where upper(area_1) like upper('%".$search."%') or upper(area_2) like upper('%".$search."%') or upper(area_3) like upper('%".$search."%') or upper(area_4) like upper('%".$search."%')";

			*/
			$sql_super = "SELECT * FROM res_area where upper(area_1) like upper('%".$search."%') or upper(area_2) like upper('%".$search."%') or upper(area_3) like upper('%".$search."%') or upper(area_4) like upper('%".$search."%')";
			



			$result_super = $connection->query($sql_super);
			//$row_detail = $result_super->fetch_assoc();

			for($x=1;$x<=$result_super->num_rows;$x++)
			{
				//$row_detail = $result_super->fetch_assoc();	
				//echo $row_detail["res_user_id"];
			}
			
			//echo $result_super->num_rows;
		}

?>


<!DOCTYPE html>
<html>
<head>
	
<link rel="stylesheet" type="text/css" href="css/temp.css">
<!--
css code 
-->



<style type="text/css">
	
	

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



		.starfade
{
	/*background-color: #E9EBEE; */
	background-color: #E9EBEE;
    border: none;

    color: white;
    padding: 4px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 2px 1px;
    cursor: pointer;
    border-radius: 50%;
}
.starcss
{
	background-color: #ffb3b3;

    border: none;
    color: white;
    padding: 4px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 2px 1px;
    cursor: pointer;
    border-radius: 50%;
}



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


<!-- header code starts here -->


	<div class="header">
		<div  class="header_logo" >
		 	<img src="img/logo1.png" height="50" width="60">
		 	<a href="home.php" class="logo_link"></a>
		</div>

		


	</div>

	
	
	<!--
	Html search box code here code here
	-->

	
<div class="search_box">
		
		<form action="search.php" method="post">
                                <input type="text" placeholder="Search..."  size="50" name="search" class="search">
                                <input type="submit" value="Search" class="search">
		</form>
		
	</div>

<!--
	user session checking code
	-->
		

<?php



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
	search item showing code here
	-->
	

	<div class="search_list">

		<?php
		
		/*

Based on search restaurant will be shown and this code for that
*/

	
				for($x=0;$x<$result_super->num_rows;$x++)
				{
						$row_detail = $result_super->fetch_assoc();	
						$tempname=$row_detail["res_user_id"];

						$sql_query = "SELECT * FROM res_user where res_pk=".$tempname."";
						$result_query_duper = $connection->query($sql_query);
						$row_detailname = $result_query_duper->fetch_assoc();
						$tempname=$row_detailname['res_id'];

						$tempresname=$row_detailname['res_name'];
						$tempaddress=$row_detailname['res_address'];
						$tempemail=$row_detailname['res_email'];
						$tempphone=$row_detailname['res_phone'];

						$temprespk=$row_detailname['res_pk'];

						$sql_query_query = "SELECT * FROM rating where res_id='".$temprespk."'";
							$result_query_rating = $connection->query($sql_query_query);
							$res_rating=0.0;
							$total_rating_given=0;
							$total_rating_given=$result_query_rating->num_rows;
							
							for($y=0;$y<$result_query_rating->num_rows;$y++)
									{
											$row_detail_rating = $result_query_rating->fetch_assoc();
											
											$res_rating+=$row_detail_rating["rating"];
									}
									if($total_rating_given>0)
									{
										$res_rating/=$total_rating_given;
									}
								$res_rating=floor($res_rating);

						$tempstring="";
						for($y=1;$y<=$res_rating;$y++)
							{
							$tempstring.="
							<button  type='button'class='starcss' disabled>$y</button>
								
							";
							}

							for($y=$res_rating+1;$y<=5;$y++)
							{

							if($y==5)
							{
								$tempstring.="
								<button  type='button'class='starfade' disabled>$y</button>
								";
								
							}
							else

							{
								$tempstring.="
								<button  type='button'class='starfade' disabled>$y</button>	
								";
								
							}
							}

							/*

							advertisement restaurant code here
							*/


						//echo "<a href='restaurant/$tempname' target='_blank'> <div class='search_item'>
						echo "<a href='restaurant/$tempname' target='_blank'>
						 <div class='search_item'>
						 	<div class='search_item_logo'>
							 	<img src='img/restaurant/$tempname/restaurant_logo.jpg' alt='No logo has selected' style='width:90%;height:125px; padding :5%;'>
							</div>
							<div class='search_item_name' >
								<h3>$tempresname</h3>
								<p>$tempphone</p>
								<p>$tempemail</p>
								<p> $tempaddress</p>
								
							</div>
							<br>
<div style='position:absolute;left:75%;  '>
								$tempstring
							</div>
							<br>
							<br>
							
							<div style='position:absolute;left:70%; '>
														<button style='background-color: #80c1ff; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer; border-radius: 12px;'>Click to show details</button>
							</div>

						</div>
						</a> <hr>";					

						//$row_detail = $result_super->fetch_assoc();	
						//echo $row_detail["res_user_id"];
				}
		?>

	</div>

	
	
	

<?php

						$sql_query = "SELECT * FROM res_user ";
						$result_query_duper = $connection->query($sql_query);
						


	?>


	<div class="item_list">
		<div class="item1" >
		<?php
		/*

							advertisement restaurant code here
							*/

							
						$row_detailname = $result_query_duper->fetch_assoc();
						$tempname=$row_detailname['res_id'];

						$tempresname=$row_detailname['res_name'];
						$tempaddress=$row_detailname['res_address'];
						$tempemail=$row_detailname['res_email'];
						$tempphone=$row_detailname['res_phone'];
						$temprespk=$row_detailname['res_pk'];
			echo "

				<img src='img/restaurant/$tempname/restaurant_logo.jpg' alt='No logo has selected' style='width:100%;height:110px; '>

				
				<h5 style='position:absolute;left:5%;bottom:-4px;color: #e6b3ff;'>$tempresname</h5>

				<h5 style='position:absolute;left:5%;bottom:-20px;color: #e6b3ff;'>Helpline : $tempphone</h5>


				<div style='position:absolute;right:5px; bottom:3px;'>
														<button style='background-color: #80c1ff; /* Green */
    border: none;
    color: white;
    padding: 2px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 1px;
    cursor: pointer; border-radius: 15px;'>show</button>
							</div>
			";
			
			?>
			
		</div>
		
		<div class="item2" >
			<?php
			
			/*

							advertisement restaurant code here
							*/

						$row_detailname = $result_query_duper->fetch_assoc();
						$tempname=$row_detailname['res_id'];

						$tempresname=$row_detailname['res_name'];
						$tempaddress=$row_detailname['res_address'];
						$tempemail=$row_detailname['res_email'];
						$tempphone=$row_detailname['res_phone'];
						$temprespk=$row_detailname['res_pk'];
			echo "

				<img src='img/restaurant/$tempname/restaurant_logo.jpg' alt='No logo has selected' style='width:100%;height:110px; '>

				<h5 style='position:absolute;left:5%;bottom:-4px; color: #e6b3ff;'>$tempresname</h5>

				<h5 style='position:absolute;left:5%;bottom:-20px; color: #e6b3ff;'>Helpline : $tempphone</h5>



				<div style='position:absolute;right:5px; bottom:3px;'>
														<button style='background-color: #80c1ff; /* Green */
    border: none;
    color: white;
    padding: 2px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 1px;
    cursor: pointer; border-radius: 15px;'>show</button>
							</div>



			";
			
			?>
			
		</div>
		
		<div class="item3"  >
			<?php
			
			/*

							advertisement restaurant code here
							*/

						$row_detailname = $result_query_duper->fetch_assoc();
						$tempname=$row_detailname['res_id'];

						$tempresname=$row_detailname['res_name'];
						$tempaddress=$row_detailname['res_address'];
						$tempemail=$row_detailname['res_email'];
						$tempphone=$row_detailname['res_phone'];
						$temprespk=$row_detailname['res_pk'];
			echo "

				<img src='img/restaurant/$tempname/restaurant_logo.jpg' alt='No logo has selected' style='width:100%;height:110px; '>

				<h5 style='position:absolute;left:5%;bottom:-4px;color: #e6b3ff;'>$tempresname</h5>

				<h5 style='position:absolute;left:5%;bottom:-20px;color: #e6b3ff;'>Helpline : $tempphone</h5>


					<div style='position:absolute;right:5px; bottom:3px;'>
														<button style='background-color: #80c1ff; /* Green */
    border: none;
    color: white;
    padding: 2px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 1px;
    cursor: pointer; border-radius: 15px;'>show</button>
							</div>

						</div>

			";
			
			?>
		</div>
	</div>


</body>

<style>
.item_list
{
	position: absolute;
	top: 27%;
	left: 2%;
	width: 20%;
	height: 480px;
	
	position: fixed;
}
.item1
{
	position: absolute;
	
	
	
	top: 0px;
width: 270px;
	border:1px solid;
	height: 150px;
	border-color: #e6b3ff;
	box-shadow: 1px 1px 1px #888888;
}
.item2
{
	position: absolute;
	top: 160px;
	width: 270px;
	
	border:1px solid;
	
	height: 150px;
	border-color: #e6b3ff;
	box-shadow: 1px 1px 1px #888888;
}
.item3
{
	position: absolute;
	top: 320px;
	width: 270px;
	
	border:1px solid;
	
	height: 150px;

	border-color: #e6b3ff;
	 box-shadow: 1px 1px 1px #888888;
}

</style>
</html>