<?php

require_once './config.php';

require_once '../scripts/php/classes/crud/questions.class.php';

$e_id   = isset( $_GET ['e_id'] ) ? $_GET ['e_id'] : 0;
$secs   = isset( $_GET ['secs'] ) ? $_GET ['secs'] : 0;

$seconds = $secs % 60;
$minutes = ( $secs - $seconds ) / 60;

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="../styles/exam.css">

</head>
<body>

  <nav></nav>

  <div class="popup">
    <h4 class="duration"></h4>
    <h4 class="degree"></h4>
  </div>

  <div class="overlay"></div>

  <a class="back-btn" href="./exams.php">Back</a>

  <div id="timer">
    <span class="minutes"><?= $minutes < 10 ? 0 . $minutes : $minutes ?></span>
    :
    <span class="seconds"><?= $seconds < 10 ? 0 . $seconds : $seconds; ?></span>
  </div>

  <main>
    <p id="topBanle"><i class="fa-solid fa-square-check"></i> Choose correct answers:</p>
    <?php 
    $i = 1;
    shuffle( $questions );
    foreach ( $questions as $row ) { 
      $selections   = explode( '&#13;&#10;', $row ['selections'] );
      $selections[] = str_replace( '&#13;&#10;', ' ', $row ['answer'] );
      shuffle( $selections ); ?>
      <div class="q">
        <p><?= str_replace( '&#13;&#10;', '<br>', $row ['question'] ); ?></p>
        <div class="selections">
          <?php foreach ( $selections as $selection ) { ?>
            <div class="input-box box">
              <input type="radio" id="<?= $i; ?>" name="<?= preg_replace( '/&#13;&#10;|\s/', '', $row ['question'] ); ?>" value="<?= preg_replace( '/\s/', '', $selection ); ?>">
              <label for="<?= $i; ?>"><?= $selection; ?></label>
            </div>
          <?php $i+=1; } ?>
        </div>
      </div>
    <?php } ?>

    <div class="wrap-login100-form-btn">
      <div class="login100-form-bgbtn"></div>
      <input id="submit" type="submit" name="submit" value="Submit">
    </div>

  </main>

  <script type="text/javascript" src="../scripts/js/navbarGenerator.js"></script>
	<script type="text/javascript" src="../scripts/js/tools.js"></script>

  <script type="module" src="../scripts/js/exam.js"></script>

</body>
</html>