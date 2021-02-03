<?php
    session_start(); 
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact US</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/contact_us.js"></script>
    <?php
		ini_set('default_charset', 'windows-1252');
	?>
    <style>
         .error {color: #FF0000;}
    </style>
    </head>

    <body>
        <!-- server validation starts -->
        <?php 
            // define variables and set to empty values
         $nameErr = $emailErr = $asuntoErr = $asuntoDetailsErr = "";
         $name = $email = $asunto = "";

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
             }else {
                $name = test_input($_POST["name"]);
                $nameRegex = "/^([a-zA-Z' ]+)$/";
                if (!preg_match($nameRegex, $name)) {
                 $nameErr = "name must contain only letters"; 
                }
                else{
                    $nameErr = "";
                }
             }

             if (empty($_POST["email"])) {
                $emailErr = "Email is required";
             }else {
                $email = test_input($_POST["email"]);
                
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   $emailErr = "Invalid email format"; 
                }
                else{
                    $emailErr = "";
                }
             }

             if(empty($_POST["affair"])){
                 $asuntoErr = "Asunto is required!";
             }

             if(empty($_POST["affair_details"])){
                $asuntoDetailsErr = "Asunto Details are required!";
             }

             if($nameErr == "" && $emailErr == "" && $asuntoErr == "" && $asuntoDetailsErr == ""){
                $_SESSION['post-contact'] = $_POST;
                header('Location: register_contact.php');
                exit();
             }
         }  //post method ends

         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
        
        ?>
        <!-- server validation ends -->
        <div id="content-wrap">
        <?php
            
            if(isset($_SESSION['username'])){
                echo "<form method='post'><p id='userline'>Welcome ".$_SESSION["username"]."&nbsp;&nbsp;&nbsp;";
                echo "<input type='Submit' name='logout' value='Log Out'/></p></form>";
            
            }

            if(isset($_POST["logout"])){
                session_destroy();
                header("Refresh:0");
            }
        
        ?>
        <div class="navigation-bar">

            <div id="navigation-container">
        
              <img src="images/Logotipo.png" width="200" height="80">
        
              <ul>
                <li><a href="objectivos.php">Inicio&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="mission.php">Nosostros&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="equipos.php">Equipos&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="https://asd6592.uta.cloud/">Blog&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a class="active" href="contact_us.php">Contacto&nbsp;&nbsp;&nbsp;/</a></li>
                <?php 
                    if(isset($_SESSION['username']))
                        echo "<li><a href='#modal_container' onclick='return check();'>Incio de Session&nbsp;&nbsp;&nbsp;/</a></li>";
                    else
                        echo "<li><a href='#modal_container'>Incio de Session&nbsp;&nbsp;&nbsp;/</a></li>";
                ?>
                <!-- <li><a href="#modal_container">Incio de Session&nbsp;&nbsp;&nbsp;/</a></li> -->
                <li><a href="objectivos.php#col2_form">Sign Up/Registrarse</a></li>
              </ul>
            </div>
      
          </div>
          <!-- Menu div ends here -->
          <div id="modal_container" class="overlay">
            <iframe scrolling="no" src="login.php" id="loginframe" width="304" height="337" frameBorder="0"></iframe>
        </div>
          <!-- NOSOTROS DIV Tag-->  
        <div id="heroImage">
            <div id="hero-text">
                <h2>CONTACT US</h2>
                <p>HOME > CONTACT US</p>
            </div>
        </div>

        <div>
            <table id="Contacto">
                <tr>
                    <td><h2>NUESTRAS <span>REDES<br> SOCIALES</span></h2></td>
                    <td><h2>FORMULARIO DE <br><span>CONTACTO</span></h2></td>
                </tr>
            </table>
        </div>
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
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $insta=""; $twitter=""; $phone=""; $mail = ""; $last_section="";
            $sql = "SELECT * FROM tblhtmlcontent where sourcepage='contact_us.html'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["section"] == "instagram") $insta = $row["content"];
                    else if($row["section"] == "twitter") $twitter = $row["content"];
                    else if($row["section"] == "phone") $phone = $row["content"];
                    else if($row["section"] == "mail") $mail = $row["content"];
                    else if($row["section"] == "last section") $last_section = $row["content"];
                }
            } else {
                echo "0 results";
            }
            
            mysqli_close($conn);
        ?>
        <div>
            <table id="media_handles">
                <tr>
                    <td>
                        <i class="fab fa-instagram"></i><br>
                        <?php echo $insta; ?>
                    </td>
                    <td>
                        <i class="fab fa-twitter"></i><br>
                        <?php echo $twitter; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fas fa-phone-alt"></i><br>
                        <!-- 001 346 714 3892<br>
                        058 414 8225881<br>
                        056 933948007 -->
                        <?php echo $phone; ?>
                    </td>
                    <td>
                        <i class="fas fa-envelope"></i><br>
                        <!-- info@genteyciudad.org -->
                        <?php echo $mail; ?>
                    </td>
                </tr>
            </table>

            <!-- <form action="register_contact.php" method="post"> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate method="post">
                <table id="contact_form">
                    <tr>
                        <td>
                            <label>Tu Nombre (requerido)</label><br>
                            <input class="contact-form-tags" type="text" name="name" maxLength="70" oninput="nameValidate(this);" placeholder="Tu Nombre" >
                            <span class = "error">* <?php echo $nameErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tu Correo (requerido)</label><br>
                            <input type="email" class="contact-form-tags" oninvalid="emailValidate(this);" 
                            oninput="emailValidate(this);" name="email" placeholder="Tu Correo">
                            <span class = "error">* <?php echo $emailErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Asunto</label><br>
                            <input type="text" class="contact-form-tags" name="affair" placeholder="Asunto">
                            <span class = "error">* <?php echo $asuntoErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Asunto</label><br>
                            <input id="asunto" type="text" class="contact-form-tags" name="affair_details" placeholder="Asunto">
                            <span class = "error">* <?php echo $asuntoDetailsErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input id="contact-us-enviar" type="submit" value="ENVIAR">
                        </td>
                    </tr>            
                </table>
            </form>
        </div>

        <div id="contact-us-fourth-sec">
            <p>
                <?php 
                    echo $last_section;
                ?>
            </p>
        </div>

        <!-- Footer Starts -->
        <div id="footer">
            <div id="contact-us-social_media">
                <a href="#"><i class="fas fa-envelope"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div id="footer_lastline">
                <span>DiazApps</span> &copy; 2020 All Rights Reserved <i class="far fa-caret-square-up"></i>
            </div>
          </div>
          <!-- Footer Ends -->

        </div>  <!-- Content wrap ends -->
    </body>
</html>