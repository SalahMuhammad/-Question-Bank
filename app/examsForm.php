<?php

require_once 'config.php';

require_once '../scripts/php/classes/crud/exams.class.php';

@$c_id      = $_SESSION ['reference'] ['c_id'];
$e_id       = isset( $_GET ['e_id'] ) ? $_GET ['e_id'] : 0;

$exam = new Exams();

$row = $exam -> getRow( $e_id );

$e_name     = @$row ['e_name'];
$timer      = @$row ['timer'];

$exam = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exams Form</title>
  
  <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">
</head>
<body>

  <main>
    <form action="../scripts/php/examsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for examsAction.php -->
      <?php if ( $e_id ) { ?>
        <input type="hidden" name="e_id" value="<?= $e_id; ?>">
      <?php } ?>
      <div class="box">
        <div class="input-box">
          <input id="c_id" type="text" name="c_id" value="<?= $c_id; ?>" required>
          <label for="c_id">Classification ID</label>
        </div>
      </div>
      <div class="box">
        <div class="input-box">
          <input id="e_name" type="text" name="e_name" value="<?= $e_name; ?>" required autofocus>
          <label for="e_name">Exam Name</label>
        </div>
      </div>

      <div class="box">
        <div class="input-box">
          <input id="timer" type="text" name="timer" value="<?= $timer; ?>" required>
          <label for="timer">Timer (Minutes) example => 3.4</label>
        </div>
      </div>

      <div class="box">
        <a id="back" class="btn btn-primary" href="exams.php" >Back</a>
        <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <input id="submit" class="btn btn-success" type="submit" name="submit" value="<?= $e_id ? 'Update' : 'Save'; ?>">
        </div>
      </div>
    </form>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>

</body>
</html>