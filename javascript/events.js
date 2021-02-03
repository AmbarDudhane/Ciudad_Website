function edit(id_event, id_desc, eventid){
    document.getElementById("popupname").innerHTML = "Edit Event";

    console.log(document.getElementById(id_event).innerHTML+" "+document.getElementById(id_desc).innerHTML);
    var event = document.getElementById(id_event);
    var desc = document.getElementById(id_desc);

    document.getElementById("ename").value = document.getElementById(id_event).innerHTML;
    document.getElementById("edesc").value = document.getElementById(id_desc).innerHTML;
    console.log("Event id is:"+eventid);
    document.getElementById("eid").value = eventid;
    document.getElementById("opt").value = "edit";
}

function changeName(){
    document.getElementById("popupname").innerHTML = "Add Event";
    document.getElementById("opt").value = "add";

    
}

function deleteEvent(eventid, id_event, id_desc){
    document.getElementById("popupname").innerHTML = "Delete Event";
    console.log("Deleting event "+eventid);

    document.getElementById("eid").value = eventid;
    document.getElementById("opt").value = "delete";

    document.getElementById("ename").value = document.getElementById(id_event).innerHTML;
    document.getElementById("edesc").value = document.getElementById(id_desc).innerHTML;

    //disabaling input fields
    document.getElementById("ename").disabled = true;
    document.getElementById("edesc").disabled = true;

}