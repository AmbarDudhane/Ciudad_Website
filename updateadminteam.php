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

if($_POST["operation"] == "edit" && isset($_POST["fullname"])){
    $fullname = $_POST["fullname"];
    $country = $_POST["country"];

    echo "Member name:".$_POST["fullname"].", country: ".$_POST["country"]."<br><br>";
    
    $mid = $_POST["memberid"];

    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE tblteam SET fullname='".$fullname."'";
    $sql = $sql . ", country='".$country."' WHERE member_id=".$mid;
    echo $sql."<br><br>";
    if (mysqli_query($conn, $sql)) {
        echo "Team member updated successfully<br><br>";
        echo "<a href='Admin_team.php'>Click Here</a> to go to admin team.php<br>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
else if($_POST["operation"] == "add" && isset($_POST["fullname"])){   //add event operation
    $fullname = $_POST["fullname"];
    $country = $_POST["country"];
    $sql = "INSERT INTO tblteam (fullname, country, teamtype, imgsrc) VALUES ('".$fullname."'";
    $sql = $sql. ", '".$country."', 'multidiscipline', '')";

    echo "ADD Query:". $sql. "<br><br>";

    if ($conn->query($sql) === TRUE) {
        echo "New member created successfully<br><br>";
        echo "<a href='Admin_team.php'>Click Here</a> to go to admin team<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{   //delete event
    $mid = $_POST["memberid"];
    // sql to delete a record
    $deleteQuery = "DELETE FROM tblteam WHERE member_id=".$mid;

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Team member deleted successfully<br><br>";
        echo "<a href='Admin_team.php'>Click Here</a> to go to admin team<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>