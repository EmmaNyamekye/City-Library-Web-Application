<?php

include '../HTML/header.html';

    try { 
        $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT count(*) FROM Books where BookID = :BookID';
        $result = $pdo->prepare($sql);
        $result->bindValue(':BookID', $_GET['BookID']); 
        $result->execute();

        if($result->fetchColumn() > 0) 
        {
            $sql = 'SELECT * FROM Books where BookID = :BookID';
            $result = $pdo->prepare($sql);
            $result->bindValue(':BookID', $_GET['BookID']); 
            $result->execute();
            
            while ($row = $result->fetch()) { ?>
                <div class='center-text'>
                    <p>Are you sure you want to delete <?php echo $row['Title'] ?> by <?php echo $row['Author'] ?>?</p>
                    <form action="deletedBook.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['BookID'] ?>">
                        <input type="submit" value="DELETE" name="delete">
                    </form>
                </div>
                    
                <?php      
            }
        }
        else {
            ?>
                <div class='center-text'>
                    <p>No rows matched the query<?php echo $sql . $see; ?></p>
                </div>
            <?php
        }
    } 

    catch (PDOException $e) { 
        $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
    }

include '../HTML/footer.html';

?>

