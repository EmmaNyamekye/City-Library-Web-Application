<?php

include '../HTML/header.html';

try { 
    $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE BOOKS SET Status = "R" WHERE BookID = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_POST['id']); 
    $result->execute();

    echo "<p class='center-text'>You just removed Book number: " . $_POST['id'] . "</p>";              
} 
catch (PDOException $e) {
  if ($e->getCode() == 23000) {
      echo "<p class='center-text'>Unfortunately, for some reason, this Book cannot be deteted.</p>";
  }
}

include '../HTML/footer.html';

?>
