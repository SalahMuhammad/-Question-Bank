<?php

require_once 'config.php';

require_once '../scripts/php/classes/crud/questions.class.php';

if ( isset( $_GET ['e_id'] ) && isset( $_GET ['e_name'] ) ) {

  $_SESSION ['reference'] ['e_id'] = $_GET ['e_id'];
  $_SESSION ['reference'] ['e_name'] = $_GET ['e_name'];
  
}

$e_id   = @$_SESSION ['reference'] ['e_id'];
$e_name = @$_SESSION ['reference'] ['e_name'];

if( ! $e_id || ! $e_name || ! $_SESSION ['user_data'] ['admin'] ) {

  header( 'Location: ./exams.php');
  exit;

}

$questoion = new Questions();

$questions = $questoion -> getAll( $e_id );

$questoion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Questions</title>

  <?php require_once './styleLinks.php'; ?>

	<link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
  <link rel="stylesheet" type="text/css" href="../styles/common.css">

  <link rel="stylesheet" type="text/css" href="../styles/all.min.css">
  <link rel="stylesheet" type="text/css" href="../styles/tableStyle.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <nav></nav>
  
  <a class="new" href="questionsForm.php"><i class="fa-solid fa-plus"></i></a>

  <main>
    <div>
      <h2 title="<?= $e_name ?>"><b>Exam Name: </b><?= $e_name; ?></h2>
    </div>
    <table>
      <caption>Exams</caption>
      <thead>
        <tr>
          <td>Question</td>
          <td>Selections</td>
          <td>Answer</td>
          <td colspan="2">Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $questions as $value ) { ?>
          <tr>
            <td title="<?= $value ['question']; ?>">
              <div>
                <?= $value ['question']; ?>
              </div>
            </td>
            <td title="<?= $value ['selections']; ?>">
              <div>
                <?= $value ['selections']; ?>
              </div>
            </td>
            <td title="<?= $value ['answer']; ?>">
              <div>
                <?= $value ['answer']; ?>
              </div>
            </td>
            <td>
              <a class="btn btn-success" href="./questionsForm.php?q_id=<?= $value ['q_id']; ?>">Edit</a>
            </td>
            <td>
              <a class="btn btn-danger" href="../scripts/php/questionsAction.php?q_id=<?= $value ['q_id'];?>&submit=Delete">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../scripts/js/all.min.js"></script>

  <script type="text/javascript" src="../scripts/js/navbarGenerator.js"></script>
  <script type="text/javascript" src="../scripts/js/tools.js"></script>
</body>
</html>
