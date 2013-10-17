<?php
session_start();

if(isset($_SESSION['isLogged'])) {
    include 'includes/header.php';
    if ($handle = opendir('dir/')) {
         while (false !== ($entry = readdir($handle))) {
             if ($entry != "." && $entry != "..") {
            echo "<a href='dir/".$entry."'>".$entry."</a><br/>";
            }
        }
    closedir($handle);
    }
    echo '<p></p>';
    echo '<div><a href="fileUploadPage.php">обратно към качване на файлове</a></div>';
   
}
else header('Location: index.php');

include 'includes/footer.php';
?>