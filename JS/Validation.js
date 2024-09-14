window.onload = function() {
    let selectElements = document.getElementsByTagName("select");
    for (let i = 0; i < selectElements.length; i++) {
        selectElements[i].selectedIndex = -1;
    }
}

function validateBook(){
    const isbn = document.getElementById("bISBN").value;
    const title = document.getElementById("bTitle").value;
    const author = document.getElementById("bAuthor").value;
    const genre = document.getElementById("bGenre").value;
    const publication = document.getElementById("bPublication").value;
    const description = document.getElementById("bDescription").value;
    const libraryName = document.getElementById("bLibraryID").value;

    //Validate if all fields are entered
    if(!allFieldsEntered(isbn, title, author, genre, publication, description, libraryName)) {
        /*Title: JavaScript Array Methods Tutorial – The Most Useful Methods Explained with Examples
        Author: Yogesh Chavan
        Site ownwer/sponcer: freecodecamp
        Date: 17 Feb 2021
        Availability: https://www.freecodecamp.org/news/complete-introduction-to-the-most-useful-javascript-array-methods/
        (Accessed 28/04/2024)
        Modified: No*/
        alert("All fields must be entered!");
        return false;
    }
    if(!isValidISBN(isbn)){
        alert("Invalid ISBN! ISBN must be a valid 10-digit ISBN!");
        document.getElementById("bISBN").focus();
        return false;
    }
    if(!isNaN(title)){ 
        alert("Invalid title! Title must not be numeric!");
        document.getElementById("bTitle").focus();
        return false;
    }
    if(!isNaN(author)){ 
        alert("Invalid author! Author must not be numeric!");
        document.getElementById("bAuthor").focus();
        return false;
    }
    if(!isNaN(description)){ 
        alert("Invalid description! Description must not be numeric!");
        document.getElementById("bDescription").focus();
        return false;
    }

    return true;

}

function allFieldsEntered(...fields){
    for (let i = 0; i < arguments.length; i++) {
        if (!arguments[i]) {
            return false;
        }
    }
    return true;
}

function isValidISBN(isbn) {
    let n = isbn.length; 
    if (n != 10) 
        return false;

    let sum = 0; 
    for (let i = 0; i < 9; i++) 
    { 
        let digit = isbn[i] - '0'; 
            
        if (0 > digit || 9 < digit) 
            return false; 
                
        sum += (digit * (10 - i)); 
    } 

    let last = isbn[9]; 
    if (last != 'X' && (last < '0' || last > '9')) 
        return false; 

    sum += ((last == 'X') ? 10 : (last - '0')); 

    return (sum % 11 == 0); 
}
/*Title: Program to check for ISBN
Author: dewangNautiyal
Site ownwer/sponcer: geeksforgeeks
Date: 17 Feb, 2023
Availability: https://www.geeksforgeeks.org/program-check-isbn/
(Accessed 28/04/2024)
Modified: No*/

function checkAnySelected() {
    let checkboxes = document.querySelectorAll("input[type='checkbox']");
    let checked = false;
    
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checked = true;
        }
    });

    if (!checked) {
        alert("No Books have been selected!");
        return false;
    }
}

function validateLibrary(){
    const Lname = document.getElementById("ud_name").value;
    const street = document.getElementById("ud_street").value;
    const town = document.getElementById("ud_town").value;
    const county = document.getElementById("ud_county").value;
    const eircode = document.getElementById("ud_eircode").value;
    const phone = document.getElementById("ud_phone").value;
    const email = document.getElementById("ud_email").value;
    const supervisor = document.getElementById("ud_supervisor").value;

    if(!allFieldsEntered(Lname, street, town, county, eircode, phone, email, supervisor)) {
        alert("All fields must be entered!");
        return false;
    }
    if(!isNaN(Lname)){ 
        alert("Invalid library name! Library name must not be numeric!");
        document.getElementById("ud_name").focus();
        return false;
    }
    if(!isNaN(street)){ 
        alert("Invalid street! Street must not be numeric!");
        document.getElementById("ud_street").focus();
        return false;
    }
    if(!isNaN(town)){ 
        alert("Invalid town! Town must not be numeric!");
        document.getElementById("ud_town").focus();
        return false;
    }
    if(!isNaN(county)){ 
        alert("Invalid county! County must not be numeric!");
        document.getElementById("ud_county").focus();
        return false;
    }
    if(!validateEmail(email)){
        alert("Invalid email address!");
        document.getElementById("ud_email").focus();
        return false;
    }
    if(!isNaN(supervisor)){ 
        alert("Invalid supervisor name! Supervisor name must not be numeric!");
        document.getElementById("ud_supervisor").focus();
        return false;
    }

    return true;
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
      alert("Invalid email format!");
      document.getElementById("ud_email").focus();
      return false;
    }
    return true;
  }
