<?php

require_once 'config.php';

require_once '../scripts/php/classes/crud/classifications.class.php';

$c_id = isset( $_GET ['c_id'] ) ? $_GET ['c_id'] : 0;

$classifications = new Classifications();

$row = $classifications -> getRow( $c_id );

$c_name = @$row ['c_name' ];

$classifications = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classification Form</title>

  <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">
</head>
<body>

  <main>
    <form action="../scripts/php/classificationsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for classificationsAction.php -->
      <?php 
      if ( $c_id ) { ?>

        <input type="hidden" name="c_id" value="<?= $c_id; ?>">
        
      <?php } ?>

      <div class="input-box">
        <input id="c_name" type="text" name="c_name" value="<?= $c_name; ?>" required autofocus>
        <label for="c_name">Classification Name</label>
      </div>

      <div class="input-box">
        <a id="back" class="btn btn-primary" href="classifications.php">Back</a>
        <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <input id="submit" class="btn btn-success" type="submit" name="submit" value="<?= $c_id ? 'Update' : 'Save'; ?>">
        </div>
      </div>
    </form>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>