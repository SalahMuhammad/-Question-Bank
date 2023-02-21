<?php 

require_once 'config.php';

require_once '../scripts/php/classes/crud/questions.class.php';

if ( ! $_SESSION ['user_data'] ['admin'] ) {
  header( 'Location: ./classifications.php' );
  exit;
}

$q_id = isset( $_GET ['q_id'] ) ? $_GET ['q_id']  : 0;

$question   = null;
$selections = null;
$answer     = null;
$e_id       = @$_SESSION ['reference'] ['e_id'];

if ( $q_id ) {

  $questions = new Questions();
  
  $row = $questions -> getRow( $q_id );

  $question   = $row ['question'];
  $selections = $row ['selections'];
  $answer     = $row ['answer'];

  $questions = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Questions Form</title>

  <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">

</head>
<body>

  <main>
    <form action="../scripts/php/questionsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for examsAction.php -->

      <?php if ( $q_id ) { ?>
          <input class="name" type="hidden" name="q_id" value="<?= $q_id; ?>">
      <?php } ?>  

        <div class="input-box">
          <input id="e_id" type="text" name="e_id" value="<?= $e_id; ?>" required>
          <label for="e_id">Exam ID</label>
        </div>

      <div class="input-box">
        <textarea id="question" type="text" name="q" rows="5" required autofocus><?= $question; ?></textarea>
        <label for="question">Question</label>
      </div>

      <div class="input-box">
        <textarea id="selection" type="text" name="s" rows="5" required><?= $selections; ?></textarea>
        <label for="selection">Selections</label>
      </div>

      <div class="input-box">
        <textarea id="answer" type="text" name="an" rows="3" required><?= $answer; ?></textarea>
        <label for="answer">Answer</label>
      </div>

      <div class="input-box">
        <a id="back" class="btn btn-primary" href="questions.php" >Back</a>
        <div class="wrap-login100-form-btn">
          <div class="login100-form-bgbtn"></div>
          <input id="submit" class="btn btn-success" type="submit" name="submit" value="<?= $q_id ? 'Update' : 'Save'; ?>" >
        </div>
      </div>

    </form>

  </main>

  <script type="text/javascript" src="../scripts/js/crud/questionsForm.js"></script>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>

</body>
</html>
