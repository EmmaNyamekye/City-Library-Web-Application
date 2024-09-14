<?php 
session_start();

if (isset($_POST['done'])) {
    //Reset Session and Variables
    $_SESSION['formData'] = array();
    $totCheckOut = 0;
    $_SESSION['list'] = array();
}

//Initialize formData from session or empty value
$formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
$list = isset($_SESSION['list']) ? $_SESSION['list'] : array();

$totCheckOut = isset($formData['totCheckOut']) ? $formData['totCheckOut'] : 0;
$mInfo = isset($formData['mInfo']) ? $formData['mInfo'] : "";
$memberID = isset($formData['memberID']) ? $formData['memberID'] : "";
$title = isset($_POST['submitTitle']) ? $_POST['bTitle'] : (isset($formData['bTitle']) ? $formData['bTitle'] : "");
$titleResults = isset($formData['titleResults']) ? $formData['titleResults'] : "";
$noBook = isset($formData['noBook']) ? $formData['noBook'] : "";
$addedBooks = isset($formData['addedBooks']) ? $formData['addedBooks'] : "";
$Tvisibility = isset($formData['Tvisibility']) ? $formData['Tvisibility'] : "hidden";
$tableVisibility = isset($formData['tableVisibility']) ? $formData['tableVisibility'] : "hidden";
$outVisibility = isset($formData['outVisibility']) ? $formData['outVisibility'] : "hidden";
$done = isset($formData['done']) ? $formData['done'] : "hidden";

if (isset($_POST['submitMemberID'])) {
    try { 
        $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Get Memmbers Details
        $sql = 'SELECT * FROM Members WHERE MemberID = :MemberID';
        $result = $pdo->prepare($sql);
        $result->bindValue(':MemberID', $_POST['bMemberID']);
        $result->execute();
        $row = $result->fetch();

        if ($row === false) {
            $mInfo = 'No Member has been found';
            $Tvisibility = "hidden";
        } else {
            $memberID = $row["MemberID"];
                $mInfo = 'Name: ' . $row["Forename"] . ' ' . $row["Surname"] . 
                    '&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Date of Birth: ' . $row["DoB"] . "<br>" . 
                    'Address: ' . $row["Street"] . ', ' . $row["Town"] . ', Co. ' . $row["County"] .', ' . $row["Eircode"] .
                    '<br>Email: ' . $row["Email"] . '&nbsp &nbsp &nbsp &nbsp &nbsp Phone: ' . $row["Phone"];

            if ($row['Status'] != 'A'){
                $mInfo .= '<br>Unfortunately, this member is not allowed to collect books because their membership is NOT ACTIVE.';
                $Tvisibility = "hidden";
            }
            else{
                $Tvisibility = "visible";
            }
        }
    }
    catch (PDOException $e) {
        echo "Error Message: " . $e->getMessage();
    }
}

if (isset($_POST['submitTitle'])) {
    if ($_POST['bTitle'] == "") {
        $noBook = 'No Book has been entered!';
        echo "<script>alert('$noBook');</script>";
    }
    else {
        try { 
            $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            //Get Books Details
            $sql = "SELECT * FROM Books WHERE Title LIKE :title AND Status = 'A'";
            $result = $pdo->prepare($sql);
            $result->bindValue(':title', "%" . $_POST['bTitle'] . "%");
            $result->execute();
            $row = $result->fetch();
    
            if ($row === false) {
                $noBook = 'No available book has been found with this Title';
                echo "<script>alert('$noBook');</script>";
                $tableVisibility = "hidden";
            } else {
                $tableVisibility = $Tvisibility = "visible";
                $titleResults = "";
                while ($row = $result->fetch()) {
                    $titleResults .= '<tr><td>' . $row["BookID"] . '</td>
                            <td>' . $row["ISBN"] . '</td>
                            <td>' . $row["Title"] . '</td>
                            <td>' . $row["Author"] . '</td>
                            <td>' . $row["LibraryID"] . '</td>
                            <td>
                                <input type="checkbox" 
                                    id="' . $row['BookID'] . '" 
                                    name="selectedBooks[]" 
                                    value="' . $row['BookID'] . '">
                            </td>
                        </tr>';
                }
            }
        }
        catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }    
}

if (isset($_POST['submitBook'])) {
    $outVisibility = "visible";
    $titleResults = "";
    $title = "";
    $tableVisibility = "hidden";

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach ($_POST['selectedBooks'] as $bookID) {
            $totCheckOut++;
            $sql = "SELECT * FROM Books WHERE BookID = :BookID";
            $result = $pdo->prepare($sql);
            $result->bindValue(':BookID', $bookID);
            $result->execute();
            $row = $result->fetch();

            if ($totCheckOut > 3) {
                $exceededLimit = true;
                $noBook = 'Max number of books you can collect: 3';
                echo "<script>alert('$noBook');</script>";
                $Tvisibility = "hidden";
            }
            else {
                $addedBooks .= "<tr><td>" . $row["BookID"] . "</td><td>" . $row["Title"] . "</td></tr>";
                $list[] = $row['BookID'];

                $sql = "UPDATE Books SET Status = 'C' WHERE BookID = :BookID";
                $result = $pdo->prepare($sql);
                $result->bindValue(':BookID', $bookID);
                $result->execute();
                $row = $result->fetch();
            }
        }
        $_SESSION['list'] = $list;
    } 
    catch (PDOException $e) {
        echo "Error Message: " . $e->getMessage();
    }
}

if (isset($_POST['collect'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $list = isset($_SESSION['list']) ? $_SESSION['list'] : array();

        //Dates
        $currentDate = new DateTime();
        $expDate = clone $currentDate; 
        $expDate->modify('+1 month');

        //Insert into Loans
        $result = $pdo->prepare("INSERT INTO loans (MemberID, LoanDate, ExpDate) VALUES (:memberID, :loanDate, :expDate)");
        $result->bindValue(':memberID', $memberID);
        $result->bindValue(':loanDate', $currentDate->format('Y-m-d'));
        $result->bindValue(':expDate', $expDate->format('Y-m-d'));
        $result->execute();

        //Get last LoanID from Loans
        $result = $pdo->query("SELECT MAX(LoanID) AS MaxLoanID FROM loans");
        $row = $result->fetch();
        $maxLoanID = $row['MaxLoanID'];

        //Insert into LoanItems
        $result = $pdo->prepare("INSERT INTO LoanItems (BookID, LoanID, Status) VALUES (:bookID, :loanID, 'O')");

        foreach ($list as $bookID){
            $result->bindValue(':bookID', $bookID);
            $result->bindValue(':loanID', $maxLoanID);
            $result->execute();
        }

        $done = "visible";
    } 
    catch (PDOException $e) {
        echo "Error Message: " . $e->getMessage();
    }
}


$_SESSION['formData'] = [
    'mInfo' => $mInfo,
    'memberID' => $memberID,
    'bTitle' => $title,
    'titleResults' => $titleResults,
    'noBook' => $noBook,
    'Tvisibility' => $Tvisibility,
    'tableVisibility' => $tableVisibility,
    'outVisibility' => $outVisibility,
    'totCheckOut' => $totCheckOut,
    'addedBooks' => $addedBooks
];

?>
