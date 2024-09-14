<?php

include '../HTML/header.html';

   try { 
   $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = 'SELECT * FROM Libraries';
   $result = $pdo->query($sql); 
   ?>

   <h1 class="view">A Quick View Of Libraries</h1>
   <div class='table-library'>
      
   <table>
   <tr><th>LibraryID</th><th>Name</th><th>Address</th><th>Phone Number</th><th>Email</th><th>Supervisor</th>
   <th>Delete</th><th>Update</th></tr>

   <?php 
   while ($row = $result->fetch())  {
   ?>

   <tr>
      <td> <?php echo $row['LibraryID'] ?> </td><td>  <?php echo $row['LibraryName'] ?></td>
      <td> <?php echo $row['Street'] . ', ' . $row['Town'] . ', Co. ' . $row['County'] . ', ' . $row['Eircode'] ?></td>
      <td> <?php echo $row['Phone'] ?></td><td>  <?php echo $row['Email'] ?></td><td>  <?php echo $row['Supervisor'] ?></td>
      <td><a href="../ServerSide/deleteLibraryOption.php?LibraryID= <?php echo $row['LibraryID'] ?>">Remove</a></td>
      <td><a href="../ServerSide/updateLibraryOption.php?LibraryID= <?php echo $row['LibraryID'] ?>">Update</a></td>
   </tr>

   <?php } ?>

   </table>
   </div>

   <?php
   }
   catch (PDOException $e) { 
   $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
   }

include '../HTML/footer.html';

?>