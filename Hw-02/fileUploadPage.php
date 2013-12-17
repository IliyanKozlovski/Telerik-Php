<?php
include 'includes/header.php';
session_start();

if(isset($_SESSION['isLogged'])) {
    include 'includes/uploadForm.php';
    if(count($_FILES)>0){
        if(move_uploaded_file($_FILES['picture']['tmp_name'], 
        	'dir'.DIRECTORY_SEPARATOR.$_FILES['picture']['name'])) {
            echo 'файла е качен успешно';
        }
        else {
        	echo 'грешка';
        }   
    }
    include 'includes/myUploadedFilesLink.php';

}
else header('Location: index.php');  
include 'includes/footer.php';
?>