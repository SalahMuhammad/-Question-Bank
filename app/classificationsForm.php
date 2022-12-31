<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classification Form</title>

  <?php require_once './styleLinks.php'; ?>

  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <main>
    <form action="../scripts/php/classificationsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for classificationsAction.php -->
      <?php 
      $c_id   = isset( $_GET ['c_id'] ) ? $_GET ['c_id'] : '';
      $c_name = isset( $_GET ['c_name'] ) ? $_GET ['c_name'] : '';

      if ( $c_id && $c_name ) { ?>

        <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
        
      <?php } ?>

      <div class="input-box">
        <input id="c_name" type="text" name="c_name" value="<?php echo $c_name; ?>" required autofocus>
        <label for="c_name">Classification Name</label>
      </div>

      <a class="btn btn-primary" href="classifications.php">Back</a>
      <input class="btn btn-success" type="submit" name="submit" value="Save">
    </form>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
</body>
</html>