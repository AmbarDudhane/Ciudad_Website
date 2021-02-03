<?php
session_start();
// echo "in login php<br>";
$email = $_SESSION['post-login']['email'];
$pwd = $_SESSION['post-login']['psw'];
// echo $email. " ". $pwd;
$res = false;
$usertype = "";
$fullname = "";
$tele;
$country;
//echo "Email is ".$email. " Password: ". $pwd. "<br>";
session_start();
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
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tblregister";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        if($row["email"]==$email && $row["password"]==$pwd){
            //echo "Credentials are correct<br>";
            $res = true;
            $tele = $row["telephone"];
            $country = $row["country"];
            $usertype = $row["usertype"];
            $fullname = $row["fullname"];
           // echo "user type:". $usertype."<br>";
            break;
        }
    }
} else {
    echo "0 results";
}

if($res && $usertype == "visitor") {
    //echo "<br> in visior if condition<br>";
    $_SESSION["username"] = $fullname;
    header("Location: user.php?name=".$fullname."&email=".$email."&password=".$pwd."&telephone=".$tele."&country=".$country);
    exit();
}
else if($res && $usertype == "admin"){
   // echo "in admin else";
    //session_start();
    $_SESSION["username"] = "admin";
    header("Location: Admin_team.php");
    exit();
}
else{
    echo "Credentials are incorrect<br>";
    echo "<a href='objectivos.php'>Click Here</a> to redirect to homepage.";
}
mysqli_close($conn);

?>