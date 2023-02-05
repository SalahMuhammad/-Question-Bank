<?php

require_once 'config.php';

require_once '../scripts/php/classes/crud/exams.class.php';

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

$exam = new Exams();

$exams = $exam -> getAll( $c_id );

$exam = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exams</title>

  <?php require_once './styleLinks.php'; ?>

	<link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
  <link rel="stylesheet" type="text/css" href="../styles/common.css">

  <link rel="stylesheet" type="text/css" href="../styles/all.min.css">
  <link rel="stylesheet" type="text/css" href="../styles/crud/exams.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <nav></nav>
  
  <?php if ( $role ) { ?>
    <a class="new" href="examsForm.php"><i class="fa-solid fa-plus"></i></a>
  <?php } ?>

  <main>
    <div>
      <h2 title="<?= $c_name ?>"><b>classification Name: </b><?= $c_name ?></h2>
    </div>
    <table>
      <caption>Exams</caption>
      <thead>
        <tr>
          <td>Exam Name</td>
          <td>Time(Minutes)</td>
          <td colspan="3">Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $exams as $row ) { ?>
          <tr>
            <td title="<?= $row ['e_name']; ?>">
              <a class="link" href="questions.php?e_id=<?= $row ['e_id']; ?>&e_name=<?= $row ['e_name']; ?>">
                <div>
                  <?= $row ['e_name']; ?>
                </div>
              </a>
            </td>
            <td><?= $row ['timer']; ?></td>
            <td><a class="btn btn-primary" href="./exam.php?e_id=<?= $row ['e_id']; ?>&timer=<?= $row ['timer']; ?>">Enter</a></td>
            <?php if ( $role ) { ?>
              <td><a class="btn btn-success " href="./examsForm.php?e_id=<?= $row ['e_id']; ?>">Edit</a></td>
              <td><a class="btn btn-danger" href="../scripts/php/examsAction.php?e_id=<?= $row ['e_id'];?>&submit=Delete">Delete</a></td>
            <?php } ?>
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