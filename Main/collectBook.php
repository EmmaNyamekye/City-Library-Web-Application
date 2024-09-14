<?php
include '../HTML/header.html';
include '../ServerSide/collectBookDB.php';
?>

<h1 class="view">Collect Book</h1>
<div id="member-section">
    <form action="collectBook.php" method="post" id="member-id">
        <label for="memberID">MemberID</label>
        <input type="text" name="bMemberID" id="bMemberID" maxlength="7" value="<?php echo $memberID; ?>">
        <input type="submit" name="submitMemberID" value="SEARCH"> 
    </form>

    <div>
        <p>Member Info</p>
        <p name="bMemberInfo" id="bMemberInfo"><?php echo $mInfo; ?></p>
    </div>
</div>

<form action="collectBook.php" method="post" id="check-out" style="visibility: <?php echo $outVisibility; ?> ;">
    <table>
        <tr>
            <th>BookID</th>
            <th>Title</th>
        </tr>
        <?php echo $addedBooks; ?>
    </table>
    <input type="submit" name="collect" value="COLLECT">
</form>

<div class="row">
    <form action="collectBook.php" method="post" id="title-section" style="visibility: <?php echo $Tvisibility; ?> ;">
        <label for="title">Title</label>
        <input type="text" name="bTitle" id="bTitle" value="<?php echo $title; ?>">
        <input type="submit" name="submitTitle" value="SEARCH">
    </form>

    <form action="collectBook.php" method="post" id="Done" style="visibility: <?php echo $done; ?> ;">
        <input type="submit" name="done" value="DONE">
    </form>
</div>

<form action="collectBook.php" method="post" id="table-select" style="visibility: <?php echo $tableVisibility; ?> ;" onsubmit="return checkAnySelected()">
    <table>
        <tr>
            <th>BookID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Location</th>
            <th>Select</th>
        </tr>
        <?php echo $titleResults ?>
    </table>
    <input type="submit" name="submitBook" value="ADD BOOK">
</form>


<?php
include '../HTML/footer.html';
?>