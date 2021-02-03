<?php
    session_start();
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/objectivos.js"></script>
    <?php
		ini_set('default_charset', 'windows-1252');
	?>
    <style>
         .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
         // define variables and set to empty values
         $nameErr = $emailErr = $phoneErr = $pwd1Err = $pwd2Err = $pwdmatchErr = $countryErr = "";
         $name = $email = $phone = "";
         
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
            
            if (empty($_POST["phone"])) {
                $phoneErr = "telephone is required";
             }else {
                $phone = test_input($_POST["phone"]);
                $regex = "/^[1-9][0-9]{9}$/"; //"^[1-9]\d{9}$";
                // check if e-mail address is well-formed
                if (!preg_match($regex, $phone)) {
                   $phoneErr = "Phone number must be 10 digit"; 
                }
                else{
                    $phoneErr = "";
                }
             }
             
             if(empty($_POST["countries"])){
                $$countryErr = "Country is required!";
             }

             if(empty($_POST["pwd"])){
                $pwd1Err = "password is required!";
             }

             if(empty($_POST["confirm_pwd"])){
                $pwd2Err = "password is required!";
             }

             if($_POST["pwd"] != $_POST["confirm_pwd"]){
                 if($pwd1Err == "" && $pwd2Err == ""){   //both password erros are empty
                    $pwdmatchErr = "passwords are not matching.";
                 }
             }

             if($nameErr == "" && $phoneErr == "" && $emailErr == "" && $pwd1Err == "" && $pwd2Err == "" &&  $pwdmatchErr == ""){
                $_SESSION['post-register'] = $_POST;
                header('Location: register.php');
                exit();
             }

         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
      <!--PHP server side validation ends-->
    <!--Content wrap starts here--> 
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
    
    <!-- Menu div starts here -->
    <div class="navigation-bar">

      <div id="navigation-container">
  
        <img src="images/Logotipo.png" width="200" height="80">
  
        <ul>
          <li><a class="active" href="objectivos.php">Inicio&nbsp;&nbsp;&nbsp;/</a></li>
          <li><a href="mission.php">Nosostros&nbsp;&nbsp;&nbsp;/</a></li>
          <li><a href="equipos.php">Equipos&nbsp;&nbsp;&nbsp;/</a></li>
          <li><a href="https://asd6592.uta.cloud/">Blog&nbsp;&nbsp;&nbsp;/</a></li>
          <li><a href="contact_us.php">Contacto&nbsp;&nbsp;&nbsp;/</a></li>
          <!-- <li><a href="#" onclick="openLogin();">Incio de Session&nbsp;&nbsp;&nbsp;/</a></li> -->
          <?php 
            if(isset($_SESSION['username']))
                echo "<li><a href='#modal_container' onclick='return check();'>Incio de Session&nbsp;&nbsp;&nbsp;/</a></li>";
            else
                echo "<li><a href='#modal_container'>Incio de Session&nbsp;&nbsp;&nbsp;/</a></li>";
          ?>
          <!-- <li><a href="#modal_container" onclick="return check();">Incio de Session&nbsp;&nbsp;&nbsp;/</a></li> -->
          <li><a href="objectivos.php#col2_form">Sign Up/Registrarse</a></li>
        </ul>
      </div>

    </div>
    <!-- Menu div ends here -->
    <div id="modal_container" class="overlay">
        <iframe scrolling="no" src="login.php" id="loginframe" width="304" height="337" frameBorder="0"></iframe>
    </div>
    
    <!-- <script>

        function loadLoginPage() {
                var modal = document.getElementById('loginFrame');
                    modal.src = "login.html"; // Check exactly working path
                    //modal.id = "login_modal";
                    modal.frameBorder = "0";
                    
                    modal.width = "350";
                    modal.height = "350";
                    document.body.style.opacity = 0.5;
            }
        function openLogin(){
            var loginControl = document.getElementById("modal_container");
            loginControl.style.visibility = "visible";
        }
        //loadLoginPage();
        
    </script> -->
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

        $sql = "SELECT * FROM tblhtmlcontent where sourcepage='objectivos.html'";
        $result = mysqli_query($conn, $sql);
        //content variables
        $gente = "";
        $objectivos = "";
        $calidad = "";
        $confianza = "";
        $COHERENCIA = "";
        $COMPROMISO = "";
        $COOPERACIÓN = "";
        $TRANSPARENCIA = "";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if($row["section"] == "GENTE Y CIUDAD")
                    $gente = $row["content"];

                else if($row["section"] == "OBJECTIVOS")
                    $objectivos = $row["content"];

                else if($row["section"] == "CALIDAD")
                    $calidad = $row["content"];

                else if($row["section"] == "CONFIANZA")
                    $confianza = $row["content"];

                else if($row["section"] == "COHERENCIA")
                    $COHERENCIA = $row["content"];

                else if($row["section"] == "COMPROMISO")
                    $COMPROMISO = $row["content"];

                else if($row["section"] == "COOPERACIÓN")
                    $COOPERACIÓN = $row["content"];

                else if($row["section"] == "TRANSPARENCIA")
                    $TRANSPARENCIA = $row["content"];
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    ?>
    <div id="gente">
        <h1 id="firstLine">GENTE</h1>
        <h1 id="secondLine">Y CIUDAD</h1>
        <p>
            <?php
                echo $gente;
            ?>
        </p>
    </div>
    <div id="overlap_img"></div>
    <div id="objectivos">
        <h2>OBJECTIVOS</h2>
        <p>
            <?php 
                echo $objectivos;
            ?>
        </p>
    </div>
    <br>
    <table id="values_table">
        <caption id="valores">Nuestros <span>Valores</span></caption>
        <tr>
            <td>
                <h2 class="values">CALIDAD</h2>
                <p>
                    <?php 
                        echo $calidad;
                    ?>
                </p>
            </td>
            <td>
                <h2 class="values">CONFIANZA</h2>
                <p>
                    <?php 
                        echo $confianza;
                    ?>
                </p>
            </td>
            <td>
                <h2 class="values">COHERENCIA</h2>
                <p>
                    <?php 
                        echo $COHERENCIA;
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <h2 class="values">COMPROMISO</h2>
                
                <p>
                    <?php 
                        echo $COMPROMISO;
                    ?>
                </p>
            </td>
            <td>
                <h2 class="values">COOPERACIÓN</h2>
                
                <p>
                    <?php 
                        echo $COOPERACIÓN;
                    ?>
                </p>
            </td>
            <td>
                <h2 class="values">TRANSPARENCIA</h2>
                
                <p>
                    <?php 
                        echo $TRANSPARENCIA;
                    ?>
                </p>
            </td>
        </tr>
    </table>
    
    <!-- <iframe id="loginframe" name="mySource" src="login.html" style="display: none;"></iframe> -->
    <div class="row"> <!-- Fourth section of page -->
        <div class="column" style="background-color:#e65c00;">
            <table rules="all" id="icons_table">
                <tr>
                    <td>
                        <i class="fas fa-microphone" style="font-size:24px;color:white;"></i><br>
                        18 FOROS
                    </td>
                    <td>
                        <i class="fas fa-users" style="font-size:24px;color:white;"></i><br>
                        50+ PASTICIPANTES
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fas fa-book" style="font-size:24px;color:white;"></i><br>
                        30 EVENTOS
                    </td>
                    <td>
                        <i class="far fa-calendar-alt" style="font-size:24px;color:white;"></i><br>
                        3 EVENTOS POR DIAS
                    </td>
                </tr>
            </table>
        </div>

        <!-- PHP server side validation -->
        
        <div class="column" style="background-color:#bbb;">
          <h1 id="col2_h1">Registrate con <span>Nosotros</span></h1> 
          <p id="col2_p">Para estas informado de nuestas actividades y eventos</p>
          <!-- <form id="col2_form" method="post" action="register.php"> -->
          <form id="col2_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
            <table id="register_table">
                    <tr class="register_rows">
                        <td>
                            <input type="text" class="register_form" placeholder="Nombre Completo" name="name">
                            <span class = "error">* <?php echo $nameErr;?></span>
                        </td>
                        <td class="col2td">
                            <input type="email" oninvalid="emailValidate(this);" 
                            oninput="emailValidate(this);" class="register_form" placeholder="Correo" name="email">
                            <span class = "error">* <?php echo $emailErr;?></span>    
                        </td>
                    </tr>
                    <tr class="register_rows">
                        <td>
                            <input type="password" id="clave" class="register_form" placeholder="Clave" name="pwd">
                            <span class = "error">* <?php echo $pwd1Err;?></span>   
                            <span class = "error"><?php echo $pwdmatchErr;?></span>     
                        </td>
                        <td class="col2td">
                            <input type="password" class="register_form" placeholder="Confirmar Clave" oninput="checkPassword(this);" name="confirm_pwd">
                            <span class = "error">* <?php echo $pwd2Err;?></span>
                            <span class = "error"><?php echo $pwdmatchErr;?></span>    
                        </td>
                    </tr>
                    <!-- <tr class="register_rows">
                        <td><input type="text" class="register_form" placeholder="Tipo de usuario" name="user_type"></td>
                    </tr> -->
                    <tr class="register_rows">
                        <td>
                            <input type="tel" placeholder="Telefono" class="register_form" oninvalid="phoneValidate(this);" oninput="phoneValidate(this);" pattern="^[1-9]\d{9}$" name="phone">
                            <span class = "error">* <?php echo $phoneErr;?></span>
                        </td>
                        <td class="col2td">
                            <select id="register_select" class="register_form" name="countries" >
                            <option value="default" selected>Ciudad de Origen</option>
                            <option value="Afganistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bonaire">Bonaire</option>
                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Canary Islands">Canary Islands</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Channel Islands">Channel Islands</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos Island">Cocos Island</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote DIvoire">Cote DIvoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curaco">Curacao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Ter">French Southern Ter</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="India">India</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea North">Korea North</option>
                            <option value="Korea Sout">Korea South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Midway Islands">Midway Islands</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Nambia">Nambia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherland Antilles">Netherland Antilles</option>
                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                            <option value="Nevis">Nevis</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau Island">Palau Island</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Phillipines">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                            <option value="Republic of Serbia">Republic of Serbia</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="St Barthelemy">St Barthelemy</option>
                            <option value="St Eustatius">St Eustatius</option>
                            <option value="St Helena">St Helena</option>
                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                            <option value="St Lucia">St Lucia</option>
                            <option value="St Maarten">St Maarten</option>
                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                            <option value="Saipan">Saipan</option>
                            <option value="Samoa">Samoa</option>
                            <option value="Samoa American">Samoa American</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Tahiti">Tahiti</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Erimates">United Arab Emirates</option>
                            <option value="United States of America">United States of America</option>
                            <option value="Uraguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State">Vatican City State</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                            <option value="Wake Island">Wake Island</option>
                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zaire">Zaire</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                          </select>
                          <span class = "error">* <?php echo $countryErr;?></span>
                          </td>
                    </tr>
                    <tr class="register_rows">
                        <td>
                            <input type="submit" value="REGISTRAR AHORA">
                        </td>
                    </tr>
            </table>
          </form>
        </div>
        
        <div class="strategy"> <!-- strategy section starts -->
            <div><h2>Nuestros Aliados <span>Estrategicos</span></h2> <br>
            <div class="strategy_column">
              <img id="firstimg" src="images/image3.jpg" alt="Snow" style="width:30%">
            </div>
            <div class="strategy_column">
              <img id="secondimg" src="images/i.jpg" alt="Forest" style="width:30%">
            </div>
          </div>
      </div>
      <iframe id="blogframe" src="https://asd6592.uta.cloud/">  <!--This iframe loades cloud blog -->
        <p>Your browser does not support iframes.</p>
      </iframe>
      <!-- <div id="nuestro_blog">
        <h2>Nuestro <span>Blog</span></h2>
        <p id="blog_firstline">Esta sección esta pensada para integrar a los ciudadanos y poder tener un feedback directo con nuestra comunidad.</p>

         Three divs for 3 events -->
        <!-- <table>
            <tr>
                <td>
                    <div class="eventDiv">
                        <img src="images/image1.jpg" height="150px" alt="People clapping"><br>
                        <img class="ago_23" src="images/23_aug.JPG" height="50px" alt="23 Ago">
                        
                        <p class="eventText">¿Ciudadanos?<br><br>
                            <i class="fas fa-user"></i> Admin&nbsp;&nbsp;&nbsp;<i class="far fa-heart"></i> 350
                            &nbsp;&nbsp;&nbsp;<i class="far fa-comment"></i> 30
                        </p>
                    </div>
                </td>
                <td>
                    <div class="eventDiv">
                        <img src="images/image2.png" height="150px" alt="calidad de vida"><br>
                        <img class="ago_23" src="images/23_aug.JPG" height="50px" alt="23 Ago">
                        
                        <p class="eventText">
                            Efecto espejo: Calidad de vida<br><br>
                            <i class="fas fa-user"></i> Admin&nbsp;&nbsp;&nbsp;<i class="far fa-heart"></i> 350
                            &nbsp;&nbsp;&nbsp;<i class="far fa-comment"></i> 30
                        </p>
                    </div>
                </td>
                <td>
                    <div class="eventDiv">
                        <img src="images/i.jpg" height="150px" alt="logo"><br>
                        <img class="may_13" src="images/13_may.JPG" height="50px" alt="13 May">
                        
                        <p class="eventText">
                            Evolución ciudadana (opinión)<br><br>
                            <i class="fas fa-user"></i> Admin&nbsp;&nbsp;&nbsp;<i class="far fa-heart"></i> 350
                            &nbsp;&nbsp;&nbsp;<i class="far fa-comment"></i> 30
                        </p>
                    </div>
                </td>
            </tr>
        </table> -->
      <!-- </div> --> 
    
    <div id="footer">
        <form action="footer.php" method="post">
            <h2>Contactate con <span>Nosotros</span></h2> 
            <input id="email_footer" name="footer_email" type="email" placeholder="Email" oninvalid="emailValidate(this);" 
            oninput="emailValidate(this);"> <input id="enviad" type="submit" value="ENVIAR">
        </form>
        <div id="social_media">
            <a href="#"><i class="fas fa-envelope"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div id="footer_lastline">
            <span>DiazApps</span> &copy; 2020 All Rights Reserved <i class="far fa-caret-square-up"></i>
        </div>
    </div>
       
    </div> <!--Content wrap ends here--> 
  </body>
  
  </html>