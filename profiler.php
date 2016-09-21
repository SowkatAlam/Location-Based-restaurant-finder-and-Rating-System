<?php

/*

session start and user identity
*/

session_start();
if(isset($_SESSION["usertype"]))
{
	if($_SESSION["usertype"]=='user')
	{
		header("Location: user_profile.php");
	}
	else if($_SESSION["usertype"]=='res_user')
	{
		header("Location: res_profile.php");

	}
}
?>