function edit(id_event, id_desc){
    document.getElementById("popupname").innerHTML = "Edit Participant";

    console.log(document.getElementById(id_event).innerHTML+" "+document.getElementById(id_desc).innerHTML);
    var event = document.getElementById(id_event);
    var desc = document.getElementById(id_desc);

    document.getElementById("ename1").value = document.getElementById(id_event).innerHTML;
    document.getElementById("edesc1").value = document.getElementById(id_desc).innerHTML;
    document.getElementById("opt").value = "edit";
}

function changeName(){
    document.getElementById("popupname").innerHTML = "Add Participant";
    document.getElementById("opt").value = "add";   
}