<?php
    session_start();
    echo "Inserting data to database<br><br>";
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $affair = $_POST['affair'];
    // $affair_details = $_POST['affair_details'];

    $name = $_SESSION['post-contact']['name'];
    $email = $_SESSION['post-contact']['email'];
    $affair = $_SESSION['post-contact']['affair'];
    $affair_details = $_SESSION['post-contact']['affair_details'];

    $servername = "localhost";
    $username = "root";
    $password = "root123";
    $dbname = "wdmproject";

    // $servername = "167.99.105.36";
    //         $username = "asd6592_ambar";
    //         $password = "]?g}7h8C]qqK";
    //         $dbname = "asd6592_wdmproject";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO tblcontact_us (name, email, affair, affair_details)
    VALUES ('".$name."','".$email."','".$affair."','".$affair_details."')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: Thank_you.php?flag=contact");
    exit();
?>