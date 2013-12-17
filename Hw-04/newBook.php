<?php
include 'includes/header.php';
include 'includes/connection.php';

echo '<p></p>';	
echo '<a href="index.php">'.'Книги'.'</a>';
include 'includes/newBookForm.php';

$sql = "SELECT * FROM authors ";
$q = mysqli_query($connection, $sql) ;
while($row = mysqli_fetch_assoc($q)){
	echo '<option value=' .$row['author_id']. '>' .$row['author_name'].'</option>'	;}
include 'includes/newBookFormClose.php';


if($_POST) {
	$myAuthors=@$_POST['authors'];
	$myBook = trim($_POST['bookName']);
	$bookId = mysqli_insert_id($connection);
	if(mb_strlen($myBook) < 3) {
        echo'<center><b><p>Името е прекалено кратко!</p></b></center>';
    } else { 

		$myBook = mysqli_real_escape_string($connection, $myBook);
		
	if ($qq = mysqli_query($connection, 'SELECT COUNT(*) FROM books 
		WHERE book_title="' . $myBook . '"')) {
    	$row = mysqli_fetch_assoc($qq);
    if ($row['COUNT(*)'] == 0) {
    	$addbook = mysqli_query($connection, "INSERT INTO books (book_id, book_title)
    	VALUES (NULL, '$myBook') " ) ;	
		$bookId = mysqli_insert_id($connection);
    	foreach($myAuthors as $element){
    		mysqli_query($connection, 
    		"INSERT INTO books_authors (book_id, author_id) 
    		VALUES ('$bookId', '$element')");
    	}
   	echo'<center><b><p>Успешно добавена книга!</p></b></center>';
   	header("refresh:1;url=index.php");
   	exit;
    } else {
    echo'<center><b><p>Книгата съществува!</p></b></center>';
    		}
    	}
    }
}

echo '<a href="index.php">'.'върни се'.'</a>';

include 'includes/footer.php';
?>


