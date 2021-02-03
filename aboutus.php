<!DOCTYPE html>
<html>
  <head>
    <title>Admin About US</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="javascript/aboutus.js"></script>
    
</head>
<body> 
  

  <div class="navigation-bar">

    <div id="navigation-container">

      <img src="images/Logotipo.png" width="200" height="80">
    </div>
<br>
<br>
  <div class="grid-contain">
    <div class="i1">ADMIN DASHBOARD </div>
    <div class="i2"> 
      <div class="vertical-menu">
        <a href="Admin_team.php" >Team</a>
        <a href="events.php">Events </a>
        <a href="participants.html">Participants</a>
        <a href="aboutus.php"class="active">About us</a>
      </div>      
    </div>
    <div class="i3">
      
      <table>
      <form action="updatehtmlcontent.php" method="post">
          <tr>
            <th>Source Page</th>
            <th>Section</th>
            <th>Content</th>
            <th>New Content</th>
            <th>Action</th>
          </tr>

          <?php 
            $servername = "localhost";
            $username = "root";
            $password = "root123";
            $dbname = "wdmproject";
            // $servername = "167.99.105.36";
            // $username = "asd6592_ambar";
            // $password = "]?g}7h8C]qqK";
            // $dbname = "asd6592_wdmproject";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //.$row["sourcepage"]."_".$row["section"].
            $sql = "SELECT * FROM tblhtmlcontent WHERE sourcepage != 'equipos.html'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                
                    //$split_array = explode("<br>",$row["content"]);
                    echo "<tr>";
                    echo "<td>".$row["sourcepage"]."</td><td>".$row["section"]."</td><td>".$row["content"]."</td>";
                    echo "<td><input type='text' name='".$row["contentid"]."' rows='4' cols='50' placeholder='Enter new content here'></td>";
                    echo "<td><input type='submit' name='". $row["sourcepage"]."_".$row["section"] ."' value='Save'/></td>";
                    echo "</tr>";
                  
              }
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
          ?>

          <!-- <tr>
            <td>Objective</td>
            <td><p>Realizar investigaciones, estudios y propuestas legislativas, relacionados con la gestión de los gobierno locales para el desarrollo sostenible. Formular proyectos para promover la participación ciudadana en iniciativas locales para la sostenibilidad.Desarrollar programas de capacitación en las áreas de participación ciudadana local y gobierno abierto para la sostenibilidad.Promover iniciativas de responsabilidad social y voluntariado, como espacios de participación ciudadana.Implementar campañas de sensibilización para motivar en la audiencia el ejercicio activo de la ciudadanía como eje fundamental para la transformación de las ciudades.</p></td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>  
            <td><button>Save</button></td>   
          </tr>
          <tr>
            <td>CALIDAD</td>
            <td>Es la práctica de los integrantes de Gente & Ciudad que fomenta una mejora continua para alcanzar la misión de la organización.</td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>
            <td><button>Save</button></td>
          </tr>
          <tr>
            <td>CONFIANZA</td>
            <td>Es la seguridad que Gente & Ciudad genera a través de sus actos.</td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>
            <td><button>Save</button></td>
          </tr>
          <tr>
            <td>COHERENCIA</td>
            <td>Todas las actuaciones de Gente & Ciudad estarán en consonancia con sus valores institucionales.</td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>
            <td><button>Save</button></td>
          </tr>
          <tr>
            <td>COMPROMISO</td>
            <td>Los integrantes de Gente & Ciudad asumen como propio el cumplimiento de las obligaciones de la institución.</td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>
            <td><button>Save</button></td>
          </tr>
          <tr>
            <td>COOPERACIÓN</td>
            <td>En Gente & Ciudad se promueve la suma de fuerzas para lograr objetivos compartidos.</td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>
            <td><button>Save</button></td>
          </tr>
          <tr>
            <td>TRANSPARENCIA</td>
            <td>Es la cualidad que caracteriza y promueve Gente & Ciudad que permite conocer claramente nuestro planteamientos y acciones.</td>
            <td>
              <form action="/action_page.php">
                <input type="text" id="lname" ><br><br>
              </form>
            </td>
            <td><button>Save</button></td>
          </tr> -->
          </form>
      </table>
          
      
    </div>  
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
  
</body>
</html>
