<html>
<head>
<title>ninja</title>
<meta charset="UTF-8">
</head>
<body>

<?php
//Please Change your Username and Password
$connection = mysqli_connect('localhost','telerikninja','qwerty','homework3');
		if(!$connection){
			echo 'no database';	
		}
		mysqli_set_charset($connection, 'utf8');

function getAuthors($db) {
    $q = mysqli_query($db, 'SELECT * FROM authors');
    if (mysqli_error($db)) {
        return false;
    }
    $ret = array();
    while ($row = mysqli_fetch_assoc($q)) {
        $ret[] = $row;
    }
    return $ret;
}

function isAuthorIdExists($db, $ids) {
    if (!is_array($ids)) {
        return false;
    }
    $q = mysqli_query($db, 'SELECT * FROM authors WHERE 
        author_id IN(' . implode(',', $ids) . ')');
    if (mysqli_error($db)) {
        return false;
    }
    
    if (mysqli_num_rows($q) == count($ids)) {
        return true;
    }
    return false;
}



?>