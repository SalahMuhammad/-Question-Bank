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
</head>
<body>
  <main>
    <form action="../scripts/php/loginAction.php" method="post">

      <div class="input-box">
        <input id="username" type="text" name="username">
        <label for="username">Username</label>
      </div>

      <div class="input-box">
        <input id="password" type="password" name="password">
        <label for="password">password</label>
      </div>

      <input type="submit" name="submit" value="Login">

      <br>

      <?= isset( $_GET ['status'] ) ? $_GET ['status'] : null; ?>
      
    </form>
  </main>
</body>
</html>