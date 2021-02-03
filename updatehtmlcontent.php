<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "root123";
    // $dbname = "wdmproject";

    $servername = "167.99.105.36";
            $username = "asd6592_ambar";
            $password = "]?g}7h8C]qqK";
            $dbname = "asd6592_wdmproject";

    echo "Value:".$_POST["41"]."<br>";
    // print_r($_POST);
    echo "<br><br>";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql_update = "UPDATE tblhtmlcontent SET content=";
        $text = ""; $source = ""; $contentid = 0;
        if(isset($_POST["objectivos_html_GENTE_Y_CIUDAD"])){
          $text = $_POST["1"];
          $contentid = 1;
          
          //header("Refresh:0");
        }
        else if(isset($_POST["objectivos_html_OBJECTIVOS"])){
          $text = $_POST["2"]; $contentid = 2;
          
        }
        else if(isset($_POST["objectivos_html_CALIDAD"])){
          $text = $_POST["3"]; $contentid = 3;
          
        }
        else if(isset($_POST["objectivos_html_CONFIANZA"])){
          $text = $_POST["4"]; $contentid = 4;
         
        }
        else if(isset($_POST["objectivos_html_COHERENCIA"])){
          $text = $_POST["5"]; $contentid = 5;
         
        }
        else if(isset($_POST["objectivos_html_COMPROMISO"])){
          $text = $_POST["6"]; $contentid = 6;
          
        }
        else if(isset($_POST["objectivos_html_COOPERACIÓN"])){
          $text = $_POST["7"]; $contentid = 7;
          
        }
        else if(isset($_POST["objectivos_html_TRANSPARENCIA"])){
          $text = $_POST["8"]; $contentid = 8;
          
        }
        else if(isset($_POST["mission_html_Nuestra_MISIÓN"])){
          $text = $_POST["9"]; $contentid = 9;
          
        }
        else if(isset($_POST["mission_html_Nuesta_VISIÓN"])){
          $text = $_POST["10"]; $contentid = 10;
         
        }
        else if(isset($_POST["mission_html_QUÉ_BRINDAMOS?"])){
          $text = $_POST["11"]; $contentid = 11;
          
        }
        else if(isset($_POST["mission_html_QUÉ_DESARROLLAMOS?"])){
          $text = $_POST["12"]; $contentid = 12;
          
        }
        else if(isset($_POST["mission_html_PARA_QUÉ_TRABAJAMOS?"])){
          $text = $_POST["13"]; $contentid = 13;
          
        }
        else if(isset($_POST["mission_html_CALIDAD"])){
          $text = $_POST["14"]; $contentid = 14;
          
        }
        else if(isset($_POST["mission_html_CONFIANZA"])){
          $text = $_POST["15"]; $contentid = 15;
          
        }
        else if(isset($_POST["mission_html_COHERENCIA"])){
          $text = $_POST["16"]; $contentid = 16;
          
        }
        else if(isset($_POST["mission_html_COMPROMISO"])){
          $text = $_POST["17"]; $contentid = 17;
          
        }
        else if(isset($_POST["mission_html_COOPERACIÓN"])){
          $text = $_POST["18"]; $contentid = 18;
          
        }
        else if(isset($_POST["mission_html_TRANSPARENCIA"])){
          $text = $_POST["19"]; $contentid = 19;
         
        }
        else if(isset($_POST["contact_us_html_instagram"])){
          $text = $_POST["38"]; $contentid = 38;
          
        }
        else if(isset($_POST["contact_us_html_twitter"])){
          $text = $_POST["39"]; $contentid = 39;
          
        }
        else if(isset($_POST["contact_us_html_phone"])){
          $text = $_POST["40"]; $contentid = 40;
          
        }
        else if(isset($_POST['contact_us_html_mail'] )){
          $text = $_POST["41"]; $contentid = 41;
          $contentid = 41;
          
          
        }
        else if(isset($_POST["contact_us_html_last section"])){
          $text = $_POST["42"]; $contentid = 42;
          
        }

        $sql_update = $sql_update."'". $text . "' WHERE contentid=" .$contentid;
        echo $sql_update;
        if($text != "" && $contentid!=0){
            if (mysqli_query($conn, $sql_update)) {
                echo "<br>Record updated successfully<br><br>";
                echo "<a href='aboutus.php'>Click Here</a> to redirect to admin about us page.";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
          //header("Refresh:0");
          
        }
        mysqli_close($conn);
?>