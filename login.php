<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/ciudad.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b99729a814.js" crossorigin="anonymous"></script>
    <style>
         .error {color: #FF0000;}
    </style>
</head>
<body>
    <!-- server side validation starts-->
    <?php 
      session_start();
      // define variables and set to empty values
      $emailErr = $pwdErr = "";
      $name = $email = $phone = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

       if(empty($_POST["psw"])){
         $pwdErr = "Password is required!";
       }

       if($emailErr == "" && $pwdErr == ""){
          $_SESSION['post-login'] = $_POST;
          header('Location: loginvalidate.php');
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
    <!-- server side validation ends-->
    <div id="id01">
      <form class="modal-content" target='_parent' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate method="post">
          
          <div class="login_container">
              <a onclick="parent.closeWindow();" href="#"><i class="fas fa-times"></i></a>
              <h1>Inicio de <span>Sesion</span></h1> 
              <hr/>
            <label for="uname"><b>Correo</b></label><br>
            <input type="text" placeholder="Tu Correo" name="email">
            <span class = "error">* <?php echo $emailErr;?></span>
            <br><br>  
            <label for="psw"><b>Contrasena</b></label><br>
            <input type="password" placeholder="Contrasena" name="psw" >
            <span class = "error">* <?php echo $pwdErr;?></span>
            <br><br> 
            <hr/>
            <button id="submit" type="submit">ENVIAR</button>
          
          </div>
      </form>
    </div>
</body>
</html>