<?php

require_once './config.php';

require_once '../scripts/php/classes/crud/questions.class.php';

$e_id   = isset( $_GET ['e_id'] )   ? $_GET ['e_id']  : 0;
$timer  = isset( $_GET ['timer'] )  ? $_GET ['timer'] : 0;

$min = floor( $timer );
$sec = ( $timer - $min ) * 60;

if ( isset( $_GET ['submit'] ) && ( ! $e_id || ! $timer ) ) {

  header( 'Location: ./classifications.php' );
  exit;

}

$question = new Questions();

$questions = $question -> getAll( $e_id );

setcookie( 'data', json_encode( $questions ), time() + 5 );

$question = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exam</title>

  <link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
  <link rel="stylesheet" type="text/css" href="../styles/common.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

  <style>
    .true {
      background-color: green;
    }
    .false {
      background-color: red;
    }
  </style>

</head>
<body>

  <nav></nav>

  <div>
    <span class="minutes"><?= $min < 10 ? 0 . $min : $min; ?></span>
    :
    <span class="seconds"><?= $sec < 10 ? 0 . $sec : $sec; ?></span>
  </div>

  <main>

    <form action="" method="get">

      <?php 
      $i = 1;
      shuffle( $questions );
      foreach ( $questions as $row ) { 
        $selections   = explode( '\r\n', $row ['selections'] );
        $selections[] = str_replace( '\r\n', ' ', $row ['answer'] );
        shuffle( $selections ); ?>
        <div>
          <p><?= implode( '<br>', explode( '\r\n', $row ['question'] ) ); ?></p>
          <div class="q">
            <?php foreach ( $selections as $selection ) { ?>
              <input type="radio" id="<?= $i; ?>" name="<?= str_replace( '\r\n', '', $row ['question'] ); ?>" value="<?= $selection; ?>" checked>
              <label for="<?= $i; ?>"><?= $selection; ?></label>
            <?php $i+=1; } ?>
          </div>
        </div>
      <?php } ?>

      <input type="submit" name="submit" value="Submit">

    </form>

  </main>

  <script type="text/javascript" src="../scripts/js/navbarGenerator.js"></script>
	<script type="text/javascript" src="../scripts/js/tools.js"></script>

  <script type="text/javascript" src="../scripts/js/exam.js"></script>

</body>
</html>