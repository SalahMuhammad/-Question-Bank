<?php

session_start();

if ( isset( $_SESSION ['user_data'] ['user_id'] ) && isset( $_SESSION ['user_data'] ['username'] ) ) {

  header( 'Location: ../index.html' );
  exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
  <main>
    <h1>LOGIN</h1>
    <form action="../scripts/php/loginAction.php" method="post">
      <div class="input-box">
        <label for="username">Username</label>
        <input id="username" type="text" name="username">
      </div>

      <div class="input-box">
        <label for="password">password</label>
        <input id="password" type="password" name="password">
      </div>

      <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <input id="submit" type="submit" name="submit" value="Login">
      </div>

      <br>
      <?= isset( $_GET ['status'] ) ? $_GET ['status'] : null; ?>
      
    </form>
  </main>
</body>
</html>