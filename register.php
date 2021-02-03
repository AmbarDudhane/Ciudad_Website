<?php
    session_start();
    echo "Inserting data to database<br><br>";
    // $fullname = $_POST['name'];
    // $email = $_POST['email'];
    // $pwd = $_POST['pwd'];
    // $telephone = $_POST['phone'];
    // $country = $_POST['countries'];
    
    $fullname = $_SESSION['post-register']['name'];
    $email = $_SESSION['post-register']['email'];
    $pwd = $_SESSION['post-register']['pwd'];
    $telephone = $_SESSION['post-register']['phone'];
    $country = $_SESSION['post-register']['countries'];
    //echo $fullname." ".$email. " ". $pwd. " ". $telephone. " ". $country. "<br><br>";

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

    $sql = "INSERT INTO tblregister (fullname, email, password, telephone, country, usertype)
    VALUES ('".$fullname."','".$email."','".$pwd."','".$telephone."','".$country."', 'visitor')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        // the message
        $msg = "Hello ".$fullname."\nYou have been successfully registered.";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        $success = mail("asdpand@gmail.com","User Registration Successful",$msg, "From: ambarsd12345@hotmail.com");
        if (!$success) {
            $errorMessage = error_get_last()['message'];
            echo $errorMessage;
        }
        echo "<br><br>Email Sent";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: Thank_you.php?flag=register");
    exit();
?>