<?php
	//       ----Please change username and password----
	$connection = mysqli_connect('localhost','telerikninja','qwerty','books');
	if(!$connection){
		echo 'no database';	
	}
	mysqli_set_charset($connection, 'utf8');
?>