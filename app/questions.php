<?php

require_once 'sessionInitializer.php';

if ( isset( $_GET ['e_id'] ) && isset( $_GET ['e_name'] ) ) {

  $_SESSION ['reference'] ['e_id'] = $_GET ['e_id'];
  $_SESSION ['reference'] ['e_name'] = $_GET ['e_name'];
  
}

$e_id   = $_SESSION ['reference'] ['e_id'];
$e_name = $_SESSION ['reference'] ['e_name'];

if ( !$e_id || !$e_name ) {

  header( 'Location: ./exams.php');
  exit;

}

require_once '../scripts/php/classes/databaseHandler.class.php';
require_once '../scripts/php/classes/crud/questions.class.php';

$handler 	= new Questions();
// q = question
$q_arr    = $handler -> getAll( $e_id );

$handler = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Questions</title>

  <?php require_once './styleLinks.php'; ?>

  <link rel="stylesheet" type="text/css" href="../styles/crud/questions.css">
	<link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
  <link rel="stylesheet" type="text/css" href="../styles/common.css">

  <link rel="stylesheet" type="text/css" href="../styles/all.min.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <nav></nav>
  
  <a class="new" href="questionsForm.php"><i class="fa-solid fa-plus"></i></a>

  <main>
    <div>
      <h2 title="<?php echo $e_name ?>"><b>Exam Name: </b><?php echo $e_name; ?></h2>
    </div>
    <table>
      <caption>Exams</caption>
      <thead>
        <tr>
          <td>Question</td>
          <td>Selections</td>
          <td>Answer</td>
          <td>#</td>
          <td>#</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $q_arr as $value ) { 
          // new line
          $delimiter  = '&#013;&#010;';

          $question   = implode( $delimiter, explode( '\r\n', $value [1]) );
          $selection  = implode( $delimiter, explode( '\r\n', $value [2]) );
          $answer     = implode( $delimiter, explode( '\r\n', $value [3]) );
        ?>
          <tr>
            <td title="<?php echo $question; ?>">
              <div>
                <?php echo $question; ?> <!-- question -->
              </div>
            </td>
            <td title="<?php echo $selection; ?>">
              <div>
                <?php echo $selection; ?> <!-- selections -->
              </div>
            </td>
            <td title="<?php echo $answer; ?>">
              <div>
                <?php echo $answer; ?> <!-- answer -->
              </div>
            </td>
            <td>
              <a class="btn btn-success" href="./questionsForm.php?q_id=<?php echo $value [0]; ?>&q=<?php echo $value [1]; ?>&s=<?php echo $value [2]; ?>&an=<?php echo $value [3] ?>">Edit</a>
            </td>
            <td>
              <a class="btn btn-danger" href="../scripts/php/questionsAction.php?q_id=<?php echo $value [0];?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../scripts/js/all.min.js"></script>

  <script type="text/javascript" src="../scripts/js/navbarGenerator.js"></script>
</body>
</html>
