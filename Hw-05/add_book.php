<?php
include 'includes/header.php';
?>
<a href="welcome.php">Списък</a>

<form method="post" action="add_book.php">
    Име: <input type="text" name="book_name" />

    <?php
    $authors = getAuthors($connection);
    if ($authors === false) {
        echo 'грешка';
    }
    ?>
    <div>Автори:<select name="authors[]" multiple style="width: 200px">
            <?php
            foreach ($authors as $row) {
                echo '<option value="' . $row['author_id'] . '">
                    ' . $row['author_name'] . '</option>';
            }
            ?>

        </select></div>
    <input type="submit" value="Добави" />    

</form>

<?php
if ($_POST) {

    $book_name = trim($_POST['book_name']);
    if (!isset($_POST['authors'])) {
        $_POST['authors'] = '';
    }
    $authors = $_POST['authors'];
    $er = array();
    if (mb_strlen($book_name) < 2) {
        $er[] = '<p>Невалидно име</p>';
    }
    if (!is_array($authors) || count($authors) == 0) {
        $er[] = '<p>Грешка</p>';
    }
    if (!isAuthorIdExists($connection, $authors)) {
        $er[] = 'невалиден автор';
    }

    if (count($er) > 0) {
        foreach ($er as $v) {
            echo '<p>' . $v . '</p>';
        }
    } else {
        mysqli_query($connection, 'INSERT INTO books (book_title) VALUES("' .
                mysqli_real_escape_string($connection, $book_name) . '")');
        if (mysqli_error($connection)) {
            echo 'Error';
            exit;
        }
        $id = mysqli_insert_id($connection);
        foreach ($authors as $authorId) {
            mysqli_query($connection, 'INSERT INTO books_authors (book_id,author_id)
                VALUES (' . $id . ',' . $authorId . ')');
            if (mysqli_error($connection)) {
                echo 'Error: ';
                echo mysqli_error($connection);
                exit;
            }
        }
        echo 'Книгата е добавена';
        
    }
}
?>


<?php
include 'includes/footer.php';
?>