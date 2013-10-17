<?php

include 'includes/header.php';
echo "Регистрация!!!";
echo '<p></p>';
include 'includes/form.php';	




$connection = mysqli_connect('localhost','telerikninja','qwerty','homework3');
if(!$connection){
	echo 'no database';
	exit;
}
mysqli_query($connection, 'SET NAMES uft8');

if($_POST){
	$username = trim($_POST['username']);
	$pass = trim($_POST['pass']);
	if((strlen($username)<=5 || strlen($pass)<=5)){
		echo 'кратко потребителско име или парола';

	}else{
	$username = mysqli_real_escape_string($connection, $username);
	$pass = mysqli_real_escape_string($connection, $pass);
	$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$pass')";
	if($qq = mysqli_query($connection, $sql)){
		echo 'регистрирахте се успешно '.$username;
		header('Location: index.php');
	}
	else echo 'грешка';
}
}




include 'includes/footer.php';

?>