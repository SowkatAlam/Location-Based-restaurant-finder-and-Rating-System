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
	/*

here is the code for user check 
*/
	if(isset($_POST["username"])&&isset($_POST["password"]))
	{
		//$query=" select *from user where user_name like '".$_POST['username']."' ";

		$query=" select *from user where user_name ='".$_POST['username']."' AND user_pass='".$_POST['password']."' ";

		$result=mysqli_query($connection,  $query);	

		
		if($result->num_rows>0)
		{
			$row = $result->fetch_assoc();
			session_start();
			$_SESSION["usertype"]="user";
			$_SESSION["username"]=$_POST['username'];
			$_SESSION["userpk"]=$row["user_pk"];
			
			header("Location: home.php");
		}
		else
		{
			$query=" select *from res_user where res_id ='".$_POST['username']."' AND res_pass='".$_POST['password']."' ";	
			
			$result=mysqli_query($connection,  $query);	

			if($result->num_rows>0)
			{
				$row = $result->fetch_assoc();
				session_start();
				$_SESSION["usertype"]="res_user";
				$_SESSION["username"]=$_POST['username'];
				$_SESSION["userpk"]=$row["res_pk"];

				header("Location: home.php");
			}
			else
			{
				echo "<script>alert('username not found');</script>";
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




		form {
                width:500px;
                margin:50px auto;
			}
		.search {
		                padding:8px 15px;
		                background:rgba(50, 50, 50, 0.2);
		                border:0px solid #dbdbdb;
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


		.item_list
		{
			position: absolute;
			top: 45%;
			height: 55%;
    		width: 100%;


    		
    		
    		
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


		/* Reset top and bottom margins from certain elements */
		
		
		.login
		{
			position:absolute;
			left:35%;
			top:25%;
			background-color:#f1f1f1;
			opacity: 0.9;
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

		.login-header {
		  background: #28d;
		  padding: 20px;
		  font-size: 1.4em;
		  font-weight: normal;
		  text-align: center;
		  text-transform: uppercase;
		  color: #fff;
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
		  width: 100%;
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
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
 -->
	<!--
Login account code here
-->


		<div class="login">
		 
		  
		 

		  <form class="login_form" method="post" action="">
			
			<p><input type="text" name="username" placeholder="Username" required="required"></p>
			<p><input type="password" name="password" placeholder="Password" required="required"></p>
			<p><input type="submit" value="Log in"></p>
		  </form>
		</div>
		
		
	
</body>
</html>


<?php
// step 5  --------------database connection Close -------------

mysqli_close($connection);

?>