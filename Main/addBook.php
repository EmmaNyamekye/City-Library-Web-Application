<?php
include '../HTML/header.html';
?>

    <h1 class="view">Add A New Book</h1>
        <form action="../ServerSide/AddBookDB.php" method="post" id="addBook" onsubmit="return validateBook()">
        <!-- Title: Validate a custom form with js and php
            Author: gladys
            Site ownwer/sponcer: wordpress.stackexchange
            Date: Jun 1, 2023
            Availability: https://stackoverflow.com/questions/41464079/submit-to-same-php-page-via-javascript 
            (Accessed 28/04/2024) 
        -->
            <div class = "box">
                <div class="column">
                    <div>
                        <label for="ISBN">ISBN: </label><br>
                        <input type="text" name="bISBN" id="bISBN" maxlength="10">
                    </div>

                    <div>
                        <label for="Title">Title: </label><br>
                        <input type="text" name="bTitle" id="bTitle" maxlength="80">
                    </div>

                    <div>
                        <label for="Author">Author: </label><br>
                        <input type="text" name="bAuthor" id="bAuthor" maxlength="35">
                    </div>

                    <div>
                        <label for="Genre">Genre: </label><br>
                        <select name="bGenre" id="bGenre">
                            <option value="Adventure">Adventure</option>
                            <option value="Adventure Fiction">Adventure Fiction</option>
                            <option value="Autobiography">Autobiography</option>
                            <option value="Biography">Biography</option>
                            <option value="Biographical Fiction">Biographical Fiction</option>
                            <option value="Classic">Classic</option>
                            <option value="Crime">Crime</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Gothic Fiction">Gothic Fiction</option>
                            <option value="Historical Fiction">Historical Fiction</option>
                            <option value="Horror">Horror</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Murder Mystery">Murder Mystery</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Novel">Novel</option>
                            <option value="Philosophy">Philosophy</option>
                            <option value="Romance">Romance</option>
                            <option value="Science">Science</option>
                            <option value="Thriller">Thriller</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="Publication">Publication: </label><br>
                        <input type="date" name="bPublication" id="bPublication">
                    </div>
                </div>
               
                <div class="column">
                    <div>
                        <label for="LibraryName">LibraryName: </label><br>
                        <select name="bLibraryID" id="bLibraryID">
                            <?php
                                try {
                                $pdo = new PDO('mysql:host=localhost;dbname=CityLibrarySYS; charset=utf8', 'root', ''); 
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                $sql = 'SELECT * FROM Libraries';
                                $result = $pdo->query($sql);
                                $Lnum = 0;

                                    while ($row = $result->fetch()) {
                                        
                                        $Lname = $row["LibraryName"];
                                        $Lnum++;
                                        
                                        echo "<option value=$Lnum>" . $Lname . '</option>';
                                    }
                                }
                                catch (PDOException $e) { 
                                $output = 'Unable to connect to the database server: ' . $e;
                                }
                            ?>
                        </select>
                    </div>

                    
                    <div>
                        <label for="Description">Description: </label><br>
                        <textarea name="bDescription" id="bDescription" cols="30" rows="10" maxlength="300"></textarea>
                    </div>
                </div>
                                
            </div>
            <input type="submit" name="submitdetails" value="SUBMIT">
        </form>

 <?php
include '../HTML/footer.html';
?>