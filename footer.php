<?php 
    $footer_email = $_POST["footer_email"];
    $date = date('Y-m-d H:i:s');
    echo "Email entered at footer: ".$footer_email; 

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

    $sql = "INSERT INTO tblfooteremail (email, date)
    VALUES ('".$footer_email."','".$date."')";

    if (mysqli_query($conn, $sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: Thank_you.php?flag=footer_email");
    exit();
?>