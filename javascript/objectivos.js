function emailValidate(textbox) { 
    
    if (textbox.value === '') { 
        textbox.setCustomValidity 
              ('Email ID is mandatory field!'); 
    } else if (textbox.validity.typeMismatch) { 
        textbox.setCustomValidity 
              ('Email address is invalid!'); 
    } else { 
        textbox.setCustomValidity(''); 
    } 

    return true; 
}

function phoneValidate(textbox){

    if (textbox.value === '') { 
        textbox.setCustomValidity 
              ('Telephone is mandatory field!'); 
    } else if (textbox.validity.patternMismatch) { 
        textbox.setCustomValidity 
              ('Telephone must not begin with 0 and length must be 10!'); 
    } else { 
        textbox.setCustomValidity(''); 
    } 

    return true;     
}

function checkPassword(input){

    if (input.value != document.getElementById('clave').value) {
        input.setCustomValidity('Password Must be Matching.');
    } else {
        input.setCustomValidity('');
    }

    return true;
}

function closeWindow(){
    var modal = document.getElementById("modal_container");
    modal.style.visibility = "hidden";
    window.location = "objectivos.php";
}

function check(){
    alert("User is already logged in!");
    return false;
}