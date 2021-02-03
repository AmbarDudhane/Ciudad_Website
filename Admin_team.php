<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin Team</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="javascript/adminteam.js"></script>
    
</head>
<body> 

<div id="id01" class="overlay">
    <form class="popup" action="updateadminteam.php" method="post">
        
        <div class="login_container">
            <a href="#"><i class="fas fa-times"></i></a>
            <h1 id="popupname">Edit Team Member</h1> 
            <hr/>
          <label for="uname"><b>Full Name</b></label><br>
          <input type="text" id="fname" placeholder="Full Name" name="fullname" required>
          <br><br>  
          <label for="psw"><b>Country</b></label><br>
          <input type="text" id="coun" placeholder="Country" name="country" required>
          <input type="hidden" name="memberid" id="mid" value="">
          <input type="hidden" name="operation" id="opt" value="">
          <br><br> 
   
          <hr/>
          <button id="submit" type="submit">Submit</button>
        
        </div>
    </form>
 </div>
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
    <!-- <li><a href="#modal_container">Incio de Session&nbsp;&nbsp;&nbsp;/</a></li> -->
    <li><a href="objectivos.php#col2_form">Sign Up/Registrarse</a></li>
  </ul>
</div>

</div>
<!-- Menu div ends here -->
  
<br>
<br>
  <div class="grid-container">
    <div class="item1">ADMIN DASHBOARD </div>
    <div class="item2"> 
      <div class="vertical-menu">
        <a href="Admin_team.php" class="active">Team</a>
        <a href="events.php">Events</a>
        <a href="participants.html">Participants</a>
        <a href="aboutus.php">About us</a>
      </div>      
    </div>
    <div class="item3">
      <table>
        <tr>
          <th>Full Name</th>
          <th>Country</th>
          <th>Action</th>
        </tr>
        <?php 
           $servername = "localhost";
           $username = "root";
           $password = "root123";
          $dbname = "wdmproject";
          
            //$servername = "167.99.105.36";
            //$username = "asd6592_ambar";
            //$password = "]?g}7h8C]qqK";
            //$dbname = "asd6592_wdmproject";
          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
          $sql = "SELECT * FROM tblteam";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                
                //if($row["sourcepage"]=="equipos.html"){
                  //$split_array = explode("<br>",$row["content"]);
                  echo "<tr>";
                  echo "<td><p id='".$row["member_id"]."_name'>".$row["fullname"]."</p></td>";
                  echo "<td><p id='".$row["member_id"]."_coun'>".$row["country"]."</p></td>";
                  echo '<td><a href="#id01" onclick="edit(\''.$row["member_id"].'_name\',\''.$row["member_id"].'_coun\',\''.$row["member_id"].'\');">Edit</a>';
                  echo '&nbsp;&nbsp;<a href="#id01" onclick="deleteMember(\''.$row["member_id"].'\',\''.$row["member_id"].'_name\',\''.$row["member_id"].'_coun\');">Delete</a></td>';
                  echo "</tr>";
                //}
            }
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
               
      </table>
      <a href="#id01" onclick="changeName();">Add</a>
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
