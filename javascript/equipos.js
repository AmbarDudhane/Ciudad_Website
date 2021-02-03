function closeWindow(){
    var modal = document.getElementById("modal_container");
    modal.style.visibility = "hidden";
    window.location = "equipos.php";
}

function check(){
    alert("User is already logged in!");
    return false;
}