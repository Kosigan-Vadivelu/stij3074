function validation(){
    var email = document.getElementById("email").value;
    var text = document.getElementById("emailText");
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (email.match(pattern)) {
        text.style.color = "#57af51"
        text.innerHTML = "Valid Email"
    }else{
        text.style.color = "#ff0000"
        text.innerHTML = "Invalid Email"
    }

    if (email == "") {
        text.innerHTML = "Please Enter Valid Email Address"
        text.style.color = "#ff0000"
    }

}

function telValidation(){
    var telText = document.getElementById("tel").value;
    var text = document.getElementById("telText");
   
    if(isNaN(telText)){                
        text.innerHTML = "Numbers only"
        text.style.color = "#ff0000"
    }else{
        if(telText.length < 11){
            text.innerHTML = "Phone No. Should Be At Least 10 Digits"
            text.style.color = "#ff0000"
        }else{
            text.style.color = "#57af51"
            text.innerHTML = "Valid Phone No."
        }

    }

    if(telText == ""){
        text.innerHTML = "Please Enter Valid Phone Number"
        text.style.color = "#ff0000"
    }


}

var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}