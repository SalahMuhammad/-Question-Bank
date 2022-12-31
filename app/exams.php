<?php

session_start();

if ( isset( $_GET ['c_id'] ) && isset( $_GET ['c_name'] ) ) {

  $_SESSION ['reference'] ['c_id'] = $_GET ['c_id'];
  $_SESSION ['reference'] ['c_name'] = $_GET ['c_name'];
  
}

$c_id   = $_SESSION ['reference'] ['c_id'];
$c_name = $_SESSION ['reference'] ['c_name'];

if ( !$c_id || !$c_name ) {

  header( 'Location: ./classifications.php');
  exit;

}

require_once '../scripts/php/classes/databaseHandler.class.php';
require_once '../scripts/php/classes/crud/exams.class.php';

$handler 	= new Exams();
// e = exams, c = classification
$e_arr 			= $handler -> getAll( $c_id );

$handler = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exams</title>

  <?php require_once './styleLinks.php'; ?>

  <link rel="stylesheet" type="text/css" href="../styles/crud/exams.css">
	<link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
  <link rel="stylesheet" type="text/css" href="../styles/common.css">

  <link rel="stylesheet" type="text/css" href="../styles/all.min.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <nav></nav>
  
  <a class="new" href="examsForm.php"><i class="fa-solid fa-plus"></i></a>

  <main>
    <div>
      <h2 title="<?php echo $c_name ?>"><b>classification Name: </b><?php echo $c_name ?></h2>
    </div>
    <table>
      <caption>Exams</caption>
      <thead>
        <tr>
          <td>Exam Name</td>
          <td>Time(Minutes)</td>
          <td>#</td>
          <td>#</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $e_arr as $value ) { ?>
          <tr>
            <td title="<?php echo $value [1]; ?>">
              <a class="link" href="questions.php?e_id=<?php echo $value [0]; ?>&e_name=<?php echo $value [1]; ?>">
                <div>
                  <?php echo $value [1]; ?> <!-- exam name -->
                </div>
              </a>
            </td>
            <td><?php echo $value [2]; ?></td> <!-- time -->
            <td>
              <a class="btn btn-success" href="./examsForm.php?e_id=<?php echo $value [0]; ?>&e_name=<?php echo $value [1];?>&timer=<?php echo $value [2]; ?>">Edit</a>
            </td>
            <td>
            <a class="btn btn-danger" href="../scripts/php/examsAction.php?e_id=<?php echo $value [0];?>&old_c_id=<?php echo $c_id; ?>&c_name=<?php echo $c_name; ?>">Delete</a>
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