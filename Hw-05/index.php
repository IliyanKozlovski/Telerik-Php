<?php
session_set_cookie_params(3600,"/",'localhost',
false,true);
session_start();
include 'includes/header.php';
echo 'login page'.'<br/>';

if(isset($_SESSION['isLogged'])){
	header('Location: posts.php');
}
else {
	if($_POST) {
		$myusername = trim($_POST['username']);
		$mypass = trim($_POST['pass']);	
		$myusername = mysqli_real_escape_string($connection, $myusername);
		$mypass = mysqli_real_escape_string($connection, $mypass);
		$sql ="SELECT * FROM users 
		WHERE username='$myusername' 
		AND password= '$mypass'";
		$result = mysqli_query($connection, $sql);
		$count = mysqli_num_rows($result);
		if($count == 1){
			$_SESSION['isLogged'] = true;
			$_SESSION['username'] = $myusername;
			header('Location: welcome.php');
		}
		else 
			echo "Грешно потребителско име или парола";
	}
	echo '<a href="register.php">'.'Регистрирай се!'.'</a>';
	echo '<div><a href="welcome.php">'.'Продължи без да се регистрираш'.'</a></div>';
}
include 'includes/form.php';	
include 'includes/footer.php';
?>
