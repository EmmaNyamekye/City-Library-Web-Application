<?php

include '../HTML/header.html';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Books WHERE Status = 'A'";
    $result = $pdo->query($sql); 
    ?>

    <h1 class="view">A Quick View Of Books</h1>
        <a href="AddBook.php">
            <button type="button" id="add-book-btn">
                Add Book
            </button>
        </a>

    <div class='table-book'>
        <table>
            <tr>
                <th>BookID</th><th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th>
                <th>Publication</th><th>Description</th><th>Delete</th>
            </tr>

    <?php 
    while ($row = $result->fetch())  {
    ?>

    <tr>
        <td> <?php echo $row['BookID'] ?> </td><td> <?php echo $row['ISBN'] ?> </td>
        <td> <?php echo $row['Title'] ?> </td><td> <?php echo $row['Author'] ?> </td>
        <td> <?php echo $row['Genre'] ?> </td><td> <?php echo $row['Publication'] ?> </td>
        <td> <?php echo $row['Description'] ?> </td>
        <td><a href="../ServerSide/deleteBookOption.php?BookID=<?php echo $row['BookID'] ?>">Remove</a></td>
    </tr>

    <?php } ?>

    </table>
    </div>

    <?php
    }
    catch (PDOException $e) { 
        echo 'Unable to connect to the database server: ' . $e->getMessage();
    }
include '../HTML/footer.html';

?>