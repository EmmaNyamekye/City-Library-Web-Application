<?php
include '../HTML/header.html';

try { 
  $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql="SELECT count(*) FROM Libraries WHERE LibraryID=:id";
  $result = $pdo->prepare($sql);
  $result->bindValue(':id', $_GET['LibraryID']); 
  $result->execute();

  if($result->fetchColumn() > 0) {
    $sql = 'SELECT * FROM Libraries where LibraryID = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_GET['LibraryID']);  
    $result->execute();

    $row = $result->fetch() ;
    $id = $row['LibraryID'];
    $name = $row['LibraryName'];
    $street = $row['Street'];
    $town = $row['Town'];
    $county = $row['County'];
    $eircode = $row['Eircode'];
    $phone = $row['Phone'];
    $email = $row['Email'];
    $supervisor = $row['Supervisor'];
  }
  else {
    print "No rows matched the query. try again click<a href='selectupdate.php'> here</a> to go back";
  }
} 
catch (PDOException $e) { 
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

include '../HTML/libraryDetails.html';
?>


