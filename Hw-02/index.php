<?php
session_set_cookie_params(3600,"/",'localhost',
false,true);
session_start();
include 'includes/header.php';
echo 'login page'.'<br/>';

if(isset($_SESSION['isLogged'])){
	header('Location: fileUploadPage.php');
}
else {
	if($_POST) {
		$myusername = trim($_POST['username']);
		$mypass = trim($_POST['pass']);
		/*
		if($username == 'user' && $pass == 'qwerty'){
			$_SESSION['isLogged'] = true;
			header('Location: fileUploadPage.php');	
		}
		else {
			echo 'Грешни данни';
		}
		*/	
	

	$connection = mysqli_connect('localhost','telerikninja','qwerty','homework3');
if(!$connection){
	echo 'no database';	
}
mysqli_set_charset($connection, 'utf8');
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypass = mysqli_real_escape_string($connection, $mypass);
	$sql ="SELECT * FROM users 
	WHERE username='$myusername' 
	AND password= '$mypass'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['isLogged'] = true;
		header('Location: fileUploadPage.php');
	}
	else 
		echo "Грешно потребителско име или парола";
}
}
include 'includes/form.php';	
include 'includes/footer.php';
?>
