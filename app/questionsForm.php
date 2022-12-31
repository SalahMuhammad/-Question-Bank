<?php 

session_start();

$e_id       = $_SESSION ['reference'] ['e_id'];

$q_id       = isset( $_GET ['q_id'] ) ? $_GET ['q_id']  : null;
$question   = isset( $_GET ['q'] )    ? $_GET ['q']     : null;
$selections = isset( $_GET ['s'] )    ? $_GET ['s']     : null;
$answer     = isset( $_GET ['an'] )   ? $_GET ['an']    : null;
$case       = $q_id ? 'Update' : 'Save';


$question   = implode( '&#013;&#010;',explode( '\r\n', $question ) );
$selections = implode( '&#013;&#010;',explode( '\r\n', $selections ) );
$answer     = implode( '&#013;&#010;',explode( '\r\n', $answer ) );
// $question = implode( ' @ ', preg_split( '/\r/', $question ) );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Questions Form</title>

  <?php require_once './styleLinks.php'; ?>
  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">

</head>
<body>
  
  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <main>
    <form action="../scripts/php/questionsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for examsAction.php -->
      <?php if ( $case == 'Update' ) { ?>
        <input type="hidden" name="q_id" value="<?php echo $q_id; ?>">
      <?php } ?>

      <div class="input-box">
        <input id="e_id" type="text" name="e_id" value="<?php echo $e_id; ?>" required>
        <label for="e_id">Exam ID</label>
      </div>
      <div class="input-box">
        <textarea id="question" type="text" name="q" rows="5" required autofocus><?php echo $question; ?></textarea>
        <label for="question">Question</label>
      </div>
      <div class="input-box">
        <textarea id="selection" type="text" name="s" rows="5" required><?php echo $selections; ?></textarea>
        <label for="selection">Selections</label>
      </div>
      <div class="input-box">
        <textarea id="answer" type="text" name="an" rows="3" required><?php echo $answer; ?></textarea>
        <label for="answer">Answer</label>
      </div>

      <a class="btn btn-primary" href="questions.php" >Back</a>
      <input class="btn btn-success" type="submit" name="submit" value="<?php echo $case; ?>" >
    </form>
  </main>

  <script type="text/javascript" src="../scripts/js/crud/questionsForm.js"></script>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>

</body>
</html>
