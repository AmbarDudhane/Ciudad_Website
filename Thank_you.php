<html>
<head>
    <title>Thank You</title>
</head>    
<body>
    <h1>Thank you.</h1><br>
    <?php 
        $flag = $_GET['flag'];
        if($flag=="register")
            echo "You have been registered Successfully.<br>";
        else if($flag == 'contact')
            echo "Contact Details have been saved. You will be contacted soon.<br>";
        else if($flag == 'footer_email')
            echo "Your email id has been saved. You will be contacted soon.<br>"
    ?>
    <a href="objectivos.php">Click Here</a> to redirect to homepage.
</body>
</html>