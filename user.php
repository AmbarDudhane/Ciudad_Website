<html>
    <head>
      <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/ciudad.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    </head>
    <body>
        <div class="navigation-bar">

            <div id="navigation-container">
        
              <img src="images/Logotipo.png" width="200" height="80">
        
              <ul>
                <li><a href="objectivos.php">Inicio&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="mission.php">Nosostros&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="equipos.php">Equipos&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="https://asd6592.uta.cloud/">Blog&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="contact_us.php">Contacto&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="login.php">Incio de Session&nbsp;&nbsp;&nbsp;/</a></li>
                <li><a href="objectivos.php#col2_form">Sign Up/Registrarse</a></li>
              </ul>
            </div>
      
          </div> 
          <hr>
       <h2 class="heading_user">
         <?php
            $fullname = $_GET["name"];
            echo "Welcome ".$fullname;
         ?>
       </h2>
       <hr>
       <h2>User Details</h2>
       <?php 
        echo "Full Name : ".$fullname."<br>";
        echo "Email : ".$_GET["email"]."<br>";
        echo "Password : ".$_GET["password"]."<br>";
        echo "Telephone : ".$_GET["telephone"]."<br>";
        echo "Country of Origin : ".$_GET["country"]."<br><br>";
       ?>
      
       
       <button>Edit Details</button><br>
       <hr>
       <h2>Participated Events:</h2>
       <table class="details_tb">
           <tr>
                <th>No</th>
                <th>Event Name</th>
                <th>Details</th>
                <th>Date</th>
                <th>Location</th>
           </tr>
           <tr>
               <td>1</td>
               <td>Efecto espejo: Calidad de vida</td>
               <td>This event will tell about improvement of quality of life.</td>
               <td>25 Apr, 2020</td>
               <td>Arlington</td>
           </tr>
       </table> 
    </body>
</html>