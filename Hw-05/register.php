<?php

include 'includes/header.php';
echo "Регистрация!!!";
echo '<p></p>';
include 'includes/form.php';	



if($_POST){
	$username = trim($_POST['username']);
	$pass = trim($_POST['pass']);
	if((strlen($username)<=3 || strlen($pass)<=3)){
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