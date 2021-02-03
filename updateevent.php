<?php
// $servername = "localhost";
// $username = "root";
// $password = "root123";
// $dbname = "wdmproject";
$servername = "167.99.105.36";
            $username = "asd6592_ambar";
            $password = "]?g}7h8C]qqK";
            $dbname = "asd6592_wdmproject";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($_POST["operation"] == "edit" && isset($_POST["eventname"])){    //Edit Event
    $eventname = $_POST["eventname"];
    $eventdesc = $_POST["description"];

    echo "Event name:".$_POST["eventname"].", desc: ".$_POST["description"]."<br><br>";
    
    $eid = $_POST["eventid"];

    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE tblevent SET eventname='".$eventname."'";
    $sql = $sql . ", eventdesc='".$eventdesc."' WHERE eventid=".$eid;
    echo $sql."<br><br>";
    if (mysqli_query($conn, $sql)) {
        echo "Event updated successfully<br><br>";
        echo "<a href='events.php'>Click Here</a> to go to events.php<br>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

else if($_POST["operation"] == "add" && isset($_POST["eventname"])){   //add event operation
    $eventname = $_POST["eventname"];
    $eventdesc = $_POST["description"];
    $sql = "INSERT INTO tblevent (eventname, eventdesc, date, location, noofparticipants) VALUES ('".$eventname."'";
    $sql = $sql. ", '".$eventdesc."', '2020-09-12', 'Texas', 33)";

    echo "ADD Query:". $sql. "<br><br>";

    if ($conn->query($sql) === TRUE) {
        echo "New Event created successfully<br><br>";
        echo "<a href='events.php'>Click Here</a> to go to events.php<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else{   //delete event
    $eid = $_POST["eventid"];
    // sql to delete a record
    $deleteQuery = "DELETE FROM tblevent WHERE eventid=".$eid;

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Event deleted successfully<br><br>";
        echo "<a href='events.php'>Click Here</a> to go to events.php<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

}

mysqli_close($conn);
?>