function nameValidate(textbox){
    if (textbox.value === '') { 
        textbox.setCustomValidity 
              ('Nombre is mandatory field!'); 
    }
    else if(textbox.validity.tooLong){
        textbox.setCustomValidity('Nombre should exceed 70 characters!');
    } else { 
        textbox.setCustomValidity(''); 
    } 

    return true; 
}

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

function closeWindow(){
    var modal = document.getElementById("modal_container");
    modal.style.visibility = "hidden";
    window.location = "contact_us.php";
}

function check(){
    alert("User is already logged in!");
    return false;
}