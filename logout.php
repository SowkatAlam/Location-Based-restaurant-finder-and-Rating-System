<?php

/*

log out code
*/

session_start();
session_destroy();
header("Location: home.php");
?>