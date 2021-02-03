<?php
    $servername = "167.99.105.36";
            $username = "asd6592_ambar";
            $password = "]?g}7h8C]qqK";
            $dbname = "asd6592_wdmproject";

    //content variables
    $mission = "";
    $vision = "";
    $BRINDAMOS = "";
    $DESARROLLAMOS = "";
    $TRABAJAMOS = "";
    $calidad = "";
    $confianza = "";
    $COHERENCIA = "";
    $COMPROMISO = "";
    $COOPERACIÓN = "";
    $TRANSPARENCIA = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM tblhtmlcontent where sourcepage='mission.html'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo $row["content"].'<br>';
            }
        }else {
            echo "0 results";
        }
        
        mysqli_close($conn);
?>