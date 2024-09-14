<?php
include '../HTML/header.html';

try { 
    $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE Libraries 
            SET LibraryName=:name, Street=:street, Town=:town, County=:county,  
            Eircode=:eircode, phone=:phone, email=:email, supervisor=:supervisor  
            WHERE LibraryID = :id';
    $result = $pdo->prepare($sql);
    $result->bindValue(':id', $_POST['ud_id']); 
    $result->bindValue(':name', ucwords($_POST['ud_name'])); 
    $result->bindValue(':street', ucwords($_POST['ud_street'])); 
    $result->bindValue(':town', ucwords($_POST['ud_town'])); 
    $result->bindValue(':county', ucwords($_POST['ud_county'])); 
    $result->bindValue(':eircode', $_POST['ud_eircode']); 
    $result->bindValue(':phone', $_POST['ud_phone']); 
    $result->bindValue(':email', $_POST['ud_email']); 
    $result->bindValue(':supervisor', ucwords($_POST['ud_supervisor'])); 
    $result->execute();

    $count = $result->rowCount();
    if ($count > 0){
        ?>

        <div class="center-text">
            <p>Here are the details of the updated Library: <br>
                Name: <?php echo ucwords($_POST['ud_name']) ?> <br>
                Address: <?php echo ucwords($_POST['ud_street']) ?>, <?php echo ucwords($_POST['ud_town']) ?>, 
                Co. <?php echo ucwords($_POST['ud_county']) ?>, <?php echo $_POST['ud_eircode'] ?> <br>
                Email: <?php echo $_POST['ud_email'] ?> <br>
                Phone: <?php echo $_POST['ud_phone'] ?> <br>
                Supervisor: <?php echo ucwords($_POST['ud_supervisor']) ?> <br>
            </p>
        </div>

        <?php
    }
    else{
        ?>

        <div class="center-text">
            <p>Nothing Has Been Updated</p>
        </div>

        <?php
    }
}
 
catch (PDOException $e) {
    $output = 'Unable to process query : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

include '../HTML/footer.html';
?>