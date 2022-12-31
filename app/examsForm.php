<?php

session_start();

// c = classification, e = exam
@$c_id       = $_SESSION ['reference'] ['c_id'];
$e_id       = isset( $_GET ['e_id'] )   ? $_GET ['e_id']    : null;
$e_name     = isset( $_GET ['e_name'] ) ? $_GET ['e_name']  : null;
$timer      = isset( $_GET ['timer'] )  ? $_GET ['timer']   : null;
$case       = $e_id ? 'Update' : 'Save';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exams Form</title>
  
  <?php require_once './styleLinks.php'; ?>
  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <main>
    <form action="../scripts/php/examsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for examsAction.php -->
      <?php if ( $case == 'Update' ) { ?>
        <input type="hidden" name="e_id" value="<?php echo $e_id; ?>">
      <?php } ?>

      <div class="input-box">
        <input id="c_id" type="text" name="c_id" value="<?php echo $c_id; ?>" required>
        <label for="c_id">Classification ID</label>
      </div>
      <div class="input-box">
        <input id="e_name" type="text" name="e_name" value="<?php echo $e_name; ?>" required autofocus>
        <label for="e_name">Exam Name</label>
      </div>
      <div class="input-box">
        <input id="timer" type="text" name="timer" value="<?php echo $timer; ?>" required>
        <label for="timer">Timer (Minutes) example => 3.4</label>
      </div>

      <a class="btn btn-primary" href="exams.php" >Back</a>
      <input class="btn btn-success" type="submit" name="submit" value="<?php echo $case; ?>" >
    </form>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
</body>
</html>