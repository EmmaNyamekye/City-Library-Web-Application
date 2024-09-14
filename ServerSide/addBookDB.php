<?php
include '../HTML/header.html';

function getNextBookID() {
    $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', '');

    $sql = "SELECT MAX(BookID) FROM Books";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch();

    if ($row === false) {
        //start with A0000000
        return "A0000000";
    }

    $currentMaxID = $row[0];

    $prefix = $currentMaxID[0];
    $numericPart = substr($currentMaxID, 1);
    $numericValue = intval($numericPart);

    if ($numericValue < 9999999) {
        $numericValue++;
    } else {
        $numericValue = 0;
        $prefix++;
        if ($prefix > 'Z') {
            throw new RuntimeException("Maximum book ID has been reached.");
        }
    }

    return $prefix . str_pad($numericValue, 7, '0', STR_PAD_LEFT);
}

if (isset($_POST['submitdetails'])) {

    try {
        $bISBN = $_POST['bISBN'];
        $bTitle = $_POST['bTitle'];
        $bAuthor = $_POST['bAuthor'];
        $bGenre = $_POST['bGenre'];
        $bPublication = $_POST['bPublication'];
        $bDescription = $_POST['bDescription'];
        $bLibraryID = $_POST['bLibraryID'];

        $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Generate new book ID
        $bookID = getNextBookID();

        $sql = "INSERT INTO books (bookID, isbn, title, author, genre, 
                  publication, description, status, LibraryID)
                VALUES (:bookID, :bISBN, :bTitle, :bAuthor, :bGenre, :bPublication,
                  :bDescription, 'A', :bLibraryID)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':bookID', $bookID);
        $stmt->bindValue(':bISBN', $bISBN);
        $stmt->bindValue(':bTitle', $bTitle);
        $stmt->bindValue(':bAuthor', $bAuthor);
        $stmt->bindValue(':bGenre', $bGenre);
        $stmt->bindValue(':bPublication', $bPublication);
        $stmt->bindValue(':bDescription', $bDescription);
        $stmt->bindValue(':bLibraryID', $bLibraryID);
        $stmt->execute();

        ?>

        <div class="center-text">
            <p>Book added successfully!</p>
        </div>

        <?php
    } catch (PDOException $e) {
        $output = "Error adding book: " . $e->getMessage();
        ?>

        <div class="center-text">
            <p><?php echo $output ?></p>
        </div>

        <?php
    } catch (RuntimeException $e) {
        $output = "Error: Maximum book ID reached.";
        ?>

        <div class="center-text">
            <p><?php echo $output ?></p>
        </div>

        <?php
    }
}

include '../HTML/footer.html';
?>
