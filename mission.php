<?php
    session_start();
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nosotros</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/mission.js"></script>
    <?php
		ini_set('default_charset', 'windows-1252');
	?>
</head>
<body>

    <!--Content wrap starts here--> 
    <div id="content-wrap">
    <?php
        //session_start(); 
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
            <li><a href="objectivos.php">Inicio&nbsp;&nbsp;&nbsp;/</a></li>
            <li><a class="active" href="mission.php">Nosostros&nbsp;&nbsp;&nbsp;/</a></li>
            <li><a href="equipos.php">Equipos&nbsp;&nbsp;&nbsp;/</a></li>
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
        <div id="hero-text">
            <h2>NOSOTROS</h2>
            <p>INICIO > NOSOTROS</p>
        </div>
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
        
        // Create connection
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
                if ($row["section"] == "Nuestra MISIÓN")
                    $mission = $row["content"];

                else if($row["section"] == "Nuesta VISIÓN")
                    $vision = $row["content"];

                else if($row["section"] == "QUÉ BRINDAMOS?")
                    $BRINDAMOS = $row["content"];

                else if($row["section"] == "QUÉ DESARROLLAMOS?")
                    $DESARROLLAMOS = $row["content"];

                else if($row["section"] == "PARA QUÉ TRABAJAMOS?")
                    $TRABAJAMOS = $row["content"];
                
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
    <div>
        <table id="mission">
            <tr>
                <td>
                    <h2>Nuestra <span>MISIÓN</span></h2>
                    <!-- <p>
                        Somos una Corporación no gubernamental en Estados Unidos, sin fines de lucro, que tiene el propósito de contribuir con el Desarrollo Sostenible de las ciudades, a través de investigaciones, asesorías, formulación de Proyectos, planes de formación, iniciativas de responsabilidad social y voluntariado.
                    </p> -->
                    <p>
                        <?php 
                            echo $mission;
                        ?>
                    </p>
                </td>
                <td>
                    <h2>Nuesta <span>VISIÓN</span></h2>
                    <!-- <p>
                        Ser reconocida como un instrumento facilitador para promover el Desarrollo Sustentable de la colectividad. Nuestra filosofía de trabajo contempla la búsqueda concertada de soluciones de distintos actores sociales con la participación de la ciudadanía.
                    </p> -->
                    <p>
                        <?php 
                            echo $vision;
                        ?>
                    </p>
                </td>
            </tr>
        </table>
        
    </div>

    <div>
    <div id="first_bubble" class="speech-bubble">
        <div class="arrow bottom right"></div>
        <!-- <p>
            Asesorías a los políticos y gobernantes dispuestos a impulsar la sostenibilidad dispuestos 
            a llevar adelante una gestión al servicio de su ciudadanía desde el punto de vista de la 
            gobernanza y el gobierno confiable basado en la calidad a partir del modelo de gestión 
            de gobierno sostenible local de los estándares de las normas ISO para gobiernos.
        </p> -->
        <p>
            <?php 
                echo $BRINDAMOS;
            ?>
        </p>
    </div>
    <div id="second_bubble" class="speech-bubble">
        <div class="arrow bottom right"></div>
        <!-- <p>
            Proyectos innovadores en función de generar beneficios para la ciudad a partir de su gente, 
            a partir de la participación ciudadana organizada y efectiva. Vivir en Ciudades dignas al 
            servicio de las necesidades reales de la ciudadanía es posible, en “Gente y Ciudad” 
            trabajamos para convertir los sueños colectivos en realidad.
        </p> -->
        <p>
            <?php 
                echo $DESARROLLAMOS;
            ?>
        </p>
    </div>
    <div id="third_bubble" class="speech-bubble">
        <div class="arrow bottom right"></div>
        <!-- <p>
            Para sumar a todo aquel dispuesto a brindar su mejor aporte para formar ciudadanos y 
            comunicar cómo lograr esas ciudades sostenibles al servicio de la ciudadanía. Nos 
            organizamos para poner en práctica todas las metodologías que hacen posible la 
            sostenibilidad local, partimos de la base, desde la gente, para convertirla en ciudadano 
            a partir de la formación y la comunicación estratégica, la sostenibilidad es posible si 
            hay participación ciudadana y hay participación ciudadana si existen ciudadanos.
        </p> -->
        <p>
            <?php 
                echo $TRABAJAMOS;
            ?>
        </p>
    </div>
    </div>

    <div id="questions">
        <p id="que1">QUÉ BRINDAMOS?</p>
        <p id="que2">QUÉ DESARROLLAMOS?</p>
        <p id="que3">PARA QUÉ TRABAJAMOS?</p>
    </div>

    <div>
        <!-- <h2 id="valores">Nuestros <span>Valores</span></h2> -->
        
        <table id="mission_valuesTable">
            <caption id="valores">Nuestros <span>Valores</span></caption>
            <tr>
                <td>
                    <h2 class="values">CALIDAD</h2>
                    <!-- <p>
                        Es la práctica de los integrantes de Gente & Ciudad que fomenta una mejora continua para alcanzar la misión de la organización.
                    </p> -->
                    <p>
                        <?php 
                            echo $calidad;
                        ?>
                    </p>
                </td>
                <td>
                    <h2 class="values">CONFIANZA</h2>
                    <!-- <p>
                        Es la seguridad que Gente & Ciudad genera a través de sus actos.
                    </p> -->
                    <p>
                        <?php 
                            echo $confianza;
                        ?>
                    </p>
                </td>
                <td>
                    <h2 class="values">COHERENCIA</h2>
                    <!-- <p>
                        Todas las actuaciones de Gente & Ciudad estarán en consonancia con sus valores institucionales.
                    </p> -->
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
                    <!-- <p>Los integrantes de Gente & Ciudad asumen como propio el cumplimiento de las obligaciones de la institución.</p> -->
                    <p>
                        <?php 
                            echo $COMPROMISO;
                        ?>
                    </p>
                </td>
                <td>
                    <h2 class="values">COOPERACIÓN</h2>
                    <!-- <p>En Gente & Ciudad se promueve la suma de fuerzas para lograr objetivos compartidos.</p> -->
                    <p>
                        <?php 
                            echo $COOPERACIÓN;
                        ?>
                    </p>
                </td>
                <td>
                    <h2 class="values">TRANSPARENCIA</h2>
                    <!-- <p>Es la cualidad que caracteriza y promueve Gente & Ciudad que permite conocer claramente nuestro planteamientos y acciones.</p> -->
                    <p>
                        <?php 
                            echo $TRANSPARENCIA;
                        ?>
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <!--Footer starts-->
    <div id="footer">
        <form>
            <h2>Contactate con <span>Nosotros</span></h2> 
            <input id="email_footer" type="email" placeholder="Email"> <input id="enviad" type="submit" value="ENVIAD">
        </form>
        <div id="social_media">
            <a href="#"><i class="fas fa-envelope"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div id="footer_lastline">
            DiazApps &copy; 2020 All Rights Reserved <i class="far fa-caret-square-up"></i>
        </div>
      </div>
    <!--Footer ends-->
    </div>  <!--Content wrap ends here--> 
</body>
</html>