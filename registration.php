<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>


<!--
css code
-->
	<style type="text/css">
		.mid
		{
			position: absolute;
			left: 30%;
			top:20%;
			width:40%;
			background-color:#f1f1f1;
			opacity:.9;
			
		}
		.mid_f
		{
			position: absolute;
			left: 50%;
			top:20%;
			width:45%;
			height:20%;
			background-color: #4CAF50;
			border: 2px solid green;			
			text-align:center;
			font-family: 'Open Sans', sans-serif;
			font-size: 20px;
			font-color: #e6ffe6;
			color: #ffffff;
			
		}
		.mid_l
		{
			position: absolute;
			left: 50%;
			top:55%;
			width:45%;
			height:20%;
			background-color: #4CAF50;
			border: 2px solid green;			
			text-align:center;
			font-family: 'Open Sans', sans-serif;
			font-size: 20px;
			font-color: #e6ffe6;
			color: #ffffff;
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
			height: 10%;
    		width: 30%;

    		left:37%;
    		top: 30%;
    		color: powderblue;
    		font-family: 'Open Sans', sans-serif;
    		
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



<!-- header code starts here -->


	<div class="header">
		<div  class="header_logo" >
		 	<img src="img/logo1.png" height="50" width="60">
		 	<a href="home.php" class="logo_link"></a>
		</div>
	</div>

	


	









<div class="mid">


	<div class="mid_img">
	<img src="img/register.jpg"></img>
	</img>
	
	
	
	
	<a href="user_registration.php">
	<div class="mid_f">
	<p>User Account</p>
	
	</div>
	</a>
	
	
	<a href="res_registration.php">
	<div class="mid_l">
	<p>Restaurant Account</p>
	
	</div>
	</a>
	
	
</div>
</body>
</html>