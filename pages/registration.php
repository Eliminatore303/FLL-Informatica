<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />

    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="../src_CSS/registration.css" />

    <title>Log-in/Register Page</title>
  </head>
  <body>
    <div class="login-reg-panel">
      <div class="login-info-box">
        <h2>Have an account?</h2>
        <p>Lorem ipsum dolor sit amet</p>
        <label id="label-register" for="log-reg-show">Login</label>
        <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
      </div>
                
      <div class="register-info-box">
        <h2>Don't have an account?</h2>
        <p>Lorem ipsum dolor sit amet</p>
        <label id="label-login" for="log-login-show">Register</label>
        <input type="radio" name="active-log-panel" id="log-login-show">
      </div>
                
      <div class="white-panel">
        <div class="login-show">
          <h2>LOGIN</h2>
          <form action="./registration.php" method="post">
          <input type="email" placeholder="Email" name="mailLog" class="email">
          <input type="password" placeholder="Password" name="passwordLog">
          <input type="submit" value="Login">
          </form>
          <a href="">Forgot password?</a>
        </div>
        <div class="register-show">
          <h2>REGISTER</h2>
          <form action="./registration.php" method="post">
            <input type="email" placeholder="Email" name="mailReg" class="email">
            <input type="password" placeholder="Password" name="passwordReg">
            <input type="password" placeholder="Confirm Password" name="passwordCheckReg">
            <input type="submit" value="Resgister">
          </form>
         
        </div>
      </div>
    </div>

   <script src="../scripts/registration.js"></script>
  </body>
</html>

<?php

    $mailLog = $_POST["mailLog"];
    $passwordLog = $_POST["passwordLog"];

    echo "<br>mail: ".$mailLog;
    echo "<br>Password non encrypted: ".$passwordLog;
    $passwordHash = password_hash($passwordLog, 
          PASSWORD_DEFAULT);
    echo "<br>Password encrypted".$passwordHash;

    $result = password_verify($passwordLog, $passwordHash) ? true : false;

    if($result){
      echo "<br>SI";
    }else{
      echo "<br>NO";
    }
    

?>