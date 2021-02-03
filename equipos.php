<?php
    session_start(); 
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/ciudad.css">
        <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="javascript/equipos.js"></script>
        <title>Equipos</title>
        <?php
		    ini_set('default_charset', 'windows-1252');
	    ?>
    </head>

    <body>
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
                    <li><a class="active" href="equipos.php">Equipos&nbsp;&nbsp;&nbsp;/</a></li>
                    <li><a href="https://asd6592.uta.cloud/">Blog&nbsp;&nbsp;&nbsp;/</a></li>
                    <li><a href="contact_us.php">Contacto&nbsp;&nbsp;&nbsp;/</a></li>
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
                <div id="equipos-hero-text">
                    <h2>NUESTROS EQUIPOS</h2>
                    <p>INICIO > NUESTROS EQUIPOS</p>
                </div>
              </div>
              <?php 
                 //$servername = "localhost";
                 //$username = "root";
                 //$password = "root123";
                 //$dbname = "wdmproject";
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
                
                $sql = "SELECT * FROM tblteam where teamtype='direction'";
                $result = mysqli_query($conn, $sql);
              ?>
              <div>
                  <table id="tbl-direction">
                      <caption class="equipos-tbl-captions"><h2>Equipo de <span>Direccion</span></h2></caption>
                      <tr>
                          <?php 
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<td><div class='direction-team'>";
                                    echo "<img src='".$row["imgsrc"]."' alt='".$row["fullname"]."'><br>";
                                    echo "<p>".$row["fullname"]."<br>".$row["country"]."</p>";
                                    echo "</div></td>";
                                }
                            } else {
                                echo "0 results";
                            }
                          ?>
                          <!-- <td>
                              <div class="direction-team">
                                  <img src="images/mariaa.PNG" alt="Maria Malaver"><br>
                                  <p>Maria A Malaver<br>Venezuela</p>
                              </div>
                          </td>
                          <td>
                              <div class="direction-team">
                                  <img src="images/adonella.PNG" alt="Adonella"><br>
                                  <p>Adonella Loffredo<br>España</p>
                              </div>
                          </td>
                          <td>
                              <div class="direction-team">
                                  <img src="images/tamara.PNG" alt="Tamara"><br>
                                  <p>Tamara Malaver <br> USA</p>
                              </div>
                          </td> -->
                        </tr>
                  </table>

                  <table id="multidiscipline">
                      <caption class="equipos-tbl-captions"><h2>Equipo de <span>Trabajo Multidisciplina</span></h2></caption>
                      
                      <?php 
                        $selectSql = "SELECT * FROM tblteam where teamtype='multidiscipline'";
                        $result = mysqli_query($conn, $selectSql);
                        $count = 1; $tr_count = 1; $tr_end_count = 1;
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                
                                if($count == $tr_count){
                                    echo "<tr>";
                                    $tr_count = $tr_count + 4;
                                }
                                
                                
                                    echo "<td><div class='multidiscipline-team'>";
                                    echo "<img src='".$row["imgsrc"]."' alt='".$row["fullname"]."'><br>";
                                    echo "<p>".$row["fullname"]."<br>".$row["country"]."</p>";
                                    echo "</div></td>";
                                
                                if($count == $tr_end_count && $count!=1){
                                    echo "</tr>";
                                    $tr_end_count = $tr_end_count + 4;
                                }
                                $count = $count + 1;
                                
                            }
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($conn);
                      ?>
                      
                      <!-- <tr>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/beatriz.PNG" alt="Beatriz"><br>
                                <p>Beatriz Marin<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/mariaeugenia.PNG" alt="Maria Eugenia"><br>
                                <p>Maria Eugenia Jiron<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/marcolopez.PNG" alt="Marco Lopez"><br>
                                <p>Marco Lopez<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/virginia.PNG" alt="Virginia Ortega"><br>
                                <p>Virginia Ortega<br>Chile</p>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/josedionisio.PNG" alt="Jose"><br>
                                <p>Jose D Solorzano<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/otoniel.PNG" alt="otoniel"><br>
                                <p>Otoniel Martinez<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/vanessa.PNG" alt="vanessa"><br>
                                <p>Vanessa Curiel<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/lenin.PNG" alt="Lenin malave"><br>
                                <p>Lenin Malave<br>Venezuela</p>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/anacristina.PNG" alt="Ana rodriguez"><br>
                                <p>Ana C Rodriguez<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/iristriana.PNG" alt="Iris Triana"><br>
                                <p>Iris Triana<br>Venezuela</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/emil.PNG" alt="Emil"><br>
                                <p>Emil Beraun<br>Peru</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/ingrid.PNG" alt="Ingrid Nuñez"><br>
                                <p>Ingrid Nuñez<br>USA</p>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/juanpablo.PNG" alt="Juan"><br>
                                <p>Juan P Patiño<br>Mexico</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/geanina.PNG" alt="Geanina"><br>
                                <p>Geanina Ureña<br>Costa Rica</p>
                            </div>
                        </td>
                        <td>
                            <div class="multidiscipline-team">
                                <img src="images/benito.PNG" alt="benito"><br>
                                <p>Benito Rodriguez<br>Venezuela</p>
                            </div>
                        </td>
                      </tr> -->
                  </table>
              </div>

              <!-- Footer Starts -->
        <div id="footer">
            <form>
                <h2>Contactate con <span>Nosotros</span></h2> 
                <input id="email_footer" type="email" placeholder="Email"> <input id="enviad" type="submit" value="ENVIAR">
            </form>
            <div id="euipos-social_media">
                <a href="#"><i class="fas fa-envelope"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div id="footer_lastline">
                <span>DiazApps</span> &copy; 2020 All Rights Reserved <i class="far fa-caret-square-up"></i>
            </div>
          </div>
          <!-- Footer Ends -->

        </div> <!--content-wrap ends-->
    </body>

</html>