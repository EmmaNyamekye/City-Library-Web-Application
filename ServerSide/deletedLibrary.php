<?php

include '../HTML/header.html';

try { 
    $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM Libraries WHERE LibraryID = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_POST['id']); 
    $result->execute();

    echo "<p class='center-text'>You just deleted Library number: " . $_POST['id'] . "</p>";              
} 
catch (PDOException $e) {
  if ($e->getCode() == 23000) {
      echo "<p class='center-text'>Unfortunally this Library cannot be deteted.<br>At least one boook is located in this library.</p>";
  }
}

include '../HTML/footer.html';

?>
