<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <title>Admin Events</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="javascript/events.js"></script>
    <style>
      .popup{
        margin: 70px auto;
        padding: 20px;
        /* background: #fff; */
        border-radius: 5px;
        width: 25%;
        position: relative;
        transition: all 5s ease-in-out;
      }
      
    </style>
</head>
<body> 

  <div id="id01" class="overlay">
    <form class="popup" action="updateevent.php" method="post">
        
        <div class="login_container">
            <a href="#"><i class="fas fa-times"></i></a>
            <h1 id="popupname">Edit Event</h1> 
            <hr/>
          <label for="uname"><b>Event Name</b></label><br>
          <input type="text" id="ename" placeholder="Event Name" name="eventname" required>
          <br><br>  
          <label for="psw"><b>Description</b></label><br>
          <input type="text" id="edesc" placeholder="Description" name="description" required>
          <input type="hidden" name="eventid" id="eid" value="">
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
    </div>
<br>
<br>
  <div class="grid-container">
    <div class="item1">ADMIN DASHBOARD </div>
    <div class="item2"> 
      <div class="vertical-menu">
        <a href="Admin_team.php" >Team</a>
        <a href="events.html"class="active">Events </a>
        <a href="participants.html">Participants</a>
        <a href="aboutus.php">About us</a>
      </div>      
    </div>
    <div class="item3">
      <table>
          <tr>
              <th>No. </th>
              <th>Event Name</th>
              <th>Details</th>
              <th>Date</th>
              <th>Location</th>
              <th>No.of Participants</th>
              <th>Operation</th>
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

            $sql = "SELECT * FROM tblevent";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                $params = "edit('".$row["eventid"]."_event','".$row["eventid"]."_desc');";
                  echo "<tr>";
                  echo "<td>".$row["eventid"]."</td><td><p id='".$row["eventid"]."_event'>".$row["eventname"]."</p></td>";
                  echo "<td><p id='".$row["eventid"]."_desc'>".$row["eventdesc"]."</p></td>";
                  echo "<td>".$row["date"]."</td><td>".$row["location"]."</td>";
                  echo "<td>".$row["noofparticipants"]."</td>";
                  echo '<td><a href="#id01" onclick="edit(\''.$row["eventid"].'_event\',\''.$row["eventid"].'_desc\',\''.$row["eventid"].'\');">Edit</a>';
                  echo '&nbsp;&nbsp;<a href="#id01" onclick="deleteEvent(\''.$row["eventid"].'\',\''.$row["eventid"].'_event\',\''.$row["eventid"].'_desc\');">Delete</a></td>';
                  echo "</tr>";
              }
            } else {
              echo "0 results";
            }

            mysqli_close($conn);
          ?>
          <!-- <tr>
              <td>1</td>
              <td><p id="1_event">¿Ciudadanos?</p></td>
              <td><p id="1_desc">Importance of citizens</p></td>
              <td>23 August</td>
              <td>Austin</td>
              <td>13</td>
              <td><a href="#id01" onclick="edit('1_event','1_desc');">Edit</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td><p id="2_event">Efecto espejo: Calidad de vida</p></td>
            <td><p id="2_desc">This event will tell about improvement of quality of life.</p></td>
            <td>13 May</td>
            <td>Arlington</td>
            <td>26</td>
            <td><a href="#id01" onclick="edit('2_event','2_desc');">Edit</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td><p id="3_event">Evolución ciudadana (opinión)</p></td>
            <td><p id="3_desc">Shows the evolution of citizens</p></td>
            <td>13 april</td>
            <td>Dallas</td>
            <td>40</td>
            <td><a href="#id01" onclick="edit('3_event','3_desc');">Edit</a></td>
          </tr> -->
      </table>
      <br><br>
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
