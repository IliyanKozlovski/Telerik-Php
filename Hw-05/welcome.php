<?php
include 'includes/header.php';
?>
<a href="authors.php">Автори</a>
<a href="add_book.php">Нова книга</a>
<?php
if (isset($_GET['author_id'])) {
    $author_id = (int) $_GET['author_id'];
    $q = mysqli_query($connection, 'SELECT * FROM authors as a LEFT JOIN 
    books_authors as ba ON a.author_id=ba.author_id LEFT JOIN books as b
     ON b.book_id=ba.book_id WHERE a.author_id='.$author_id);
} else {
    $q = mysqli_query($connection, 'SELECT * FROM books as b INNER JOIN 
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN authors as a
     ON a.author_id=ba.author_id');
}

$result = array();
while ($row = mysqli_fetch_assoc($q)) {
    $result[$row['book_id']]['book_id'] = $row['book_id'];
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
}
echo '<table border="1"><tr><td>Книга</td><td>Автори</td></tr>';
foreach ($result as $row) {
    echo '<tr><td><a href="bookcomments.php?book_id=' .$row['book_id'].'">' . $row['book_title'] . '</a></td>
        <td>';
    $ar = array();
    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="welcome.php?author_id=' . $k . '">' . $va . '</a>';
    }
    echo implode(' , ', $ar) . '</td></tr>';
}
echo '</table>';
?>

<?php
include 'includes/footer.php';
?>
 
