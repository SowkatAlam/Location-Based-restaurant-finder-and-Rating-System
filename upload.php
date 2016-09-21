<?php
	/*

	code to upload image 
	*/

	if ($_FILES['image_image']['name'])
	{
		$name=$_FILES['image_image']['name'];
		//$destination=$_FILES["image_image"]["name"];


		echo $name."asfsdf";
		//$filename=$_FILES['image']['tmp_name'];

		//move_uploaded_file($filename, $destination);


	}
	
?>
