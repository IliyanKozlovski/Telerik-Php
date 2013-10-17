
<?php
include 'includes/header.php';
include 'includes/connection.php';

echo '<a href ="newBook.php">Нова Книга</a>'.'    ';
echo '<a href ="newAuthor.php">Нов Автор</a>';
echo '<table border="1"><tr><th>Книга</th><th>Автори</th></tr>';
$sql = "SELECT * FROM books LEFT JOIN books_authors ON 
books.book_id=books_authors.book_id LEFT JOIN authors ON 
books_authors.author_id = authors.author_id";



$q = mysqli_query($connection, $sql) ;
while($row = mysqli_fetch_assoc($q)){
	echo '<tr><td>'.$row['book_title'].'</td><td> 
	<a href="author.php?id= '.$row['author_id'].'">'.$row['author_name'].'</a></td>
	</tr>';
	//echo '<pre>'.print_r($row).'</pre>'	;
	}
echo '</table>	';


 //<a href="author.php?id={$row['author_id']}">



include 'includes/footer.php';
?>

