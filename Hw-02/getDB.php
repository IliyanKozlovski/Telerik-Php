
<?php
//getDB


$connection = mysqli_connect('localhost','telerikninja','qwerty','homework3');
if(!$connection){
	echo 'no database';	
}
mysqli_set_charset($connection, 'utf8');
/*
$sql = 'SELECT * FROM USERS
WHERE username="'.mysqli_real_escape_string($connection, $_GET['username']).'"AND pass="'.
mysqli_real_escape_string($connection, $_GET['pass']).'"' ;
echo $sql;

$q= mysqli_query($con, $sql);
while($row= mysqli_fetch_assoc($q)){
	echo '<pre>'.print_r($row, true).'</pre>';
}
*/
$sql = 'SELECT * FROM users';



$q = mysqli_query($connection, $sql) ;
while($row = mysqli_fetch_assoc($q)){
echo '<pre>'.print_r($row, true).'</pre>';
}

?>