<?php

include '../HTML/header.html';

    try { 
        $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT count(*) FROM Libraries where LibraryID = :LibraryID';
        $result = $pdo->prepare($sql);
        $result->bindValue(':LibraryID', $_GET['LibraryID']); 
        $result->execute();

        if($result->fetchColumn() > 0) 
        {
            $sql = 'SELECT * FROM Libraries where LibraryID = :LibraryID';
            $result = $pdo->prepare($sql);
            $result->bindValue(':LibraryID', $_GET['LibraryID']); 
            $result->execute();
            
            while ($row = $result->fetch()) { ?>
                <div class='center-text'>
                    <p>Are you sure you want to delete <?php echo $row['LibraryName'] ?>?</p>
                    <form action="deletedLibrary.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['LibraryID'] ?>">
                        <input type="submit" value="DELETE" name="delete">
                    </form>
                </div>
                    
                <?php      
            }
        }
        else {
            ?>
                <div class='center-text'>
                    <p>No rows matched the query</p>
                </div>
            <?php
        }
    } 

    catch (PDOException $e) { 
        $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
    }

include '../HTML/footer.html';

?>

