function edit(id_name, id_coun, memberid){
    document.getElementById("popupname").innerHTML = "Edit Team Member";

    console.log(document.getElementById(id_name).innerHTML+" "+document.getElementById(id_coun).innerHTML);
    // var event = document.getElementById(id_event);
    // var desc = document.getElementById(id_desc);

    document.getElementById("fname").value = document.getElementById(id_name).innerHTML;
    document.getElementById("coun").value = document.getElementById(id_coun).innerHTML;
    console.log("member id is:"+memberid);
    document.getElementById("mid").value = memberid;
    document.getElementById("opt").value = "edit";
}

function changeName(){
    document.getElementById("popupname").innerHTML = "Add New Member";
    document.getElementById("opt").value = "add";

}

function deleteMember(memberid, id_name, id_coun) {
    document.getElementById("popupname").innerHTML = "Delete Team Member";
    console.log("Deleting team member "+memberid);

    document.getElementById("mid").value = memberid;
    document.getElementById("opt").value = "delete";

    document.getElementById("fname").value = document.getElementById(id_name).innerHTML;
    document.getElementById("coun").value = document.getElementById(id_coun).innerHTML;

    //disabaling input fields
    document.getElementById("fname").disabled = true;
    document.getElementById("coun").disabled = true;

}