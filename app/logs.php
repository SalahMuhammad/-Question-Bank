<?php 

require_once './config.php';

require_once '../scripts/php/classes/logs.class.php';

$logs = new Logs();

$e_name    = isset( $_GET ['e_name'] ) ? filter_var( $_GET ['e_name'], FILTER_SANITIZE_SPECIAL_CHARS) : 'null';
$user_id = $_SESSION ['user_data'] ['user_id'];

$rows = $logs -> getAll( "exams.e_name = '$e_name' AND user_id = $user_id" );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logs</title>

  <link rel="stylesheet" type="text/css" href="../styles/all.min.css">

  <link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
	<link rel="stylesheet" type="text/css" href="../styles/common.css">
  <link rel="stylesheet" type="text/css" href="../styles/tableStyle.css">

</head>
<body>

  <nav></nav>

  
  <main>
    <form method="get">
      <div class="input-box">
        <input type="search" name="e_name">
        <span>Exam Name</span>
      </div>

      <input type="submit" value="submit">
    </form>
    
    <table>
      <caption>Logs</caption>
      <thead>
        <tr>
          <td>Date</td>
          <td>Duration</td>
          <td>Percentage</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $rows as $row ) { 
          $secs = $row ['duration_by_secs'] % 60;
          $min  = floor( $row ['duration_by_secs'] - $secs ) / 60;
          $milisecs = number_format( $row ['duration_by_secs'] - ( $min * 60 ) - $secs, 2 ) ;
          // formating numbers
          $min  = $min < 10 ? 0 . $min : $min;
          $secs = $secs + $milisecs < 10 ? 0 . $secs + $milisecs : $secs + $milisecs;
          ?>
          <tr>
            <td><?= $row ['date']; ?></td>
            <td><?= "$min:$secs" ?></td>
            <td><?= $row ['percentage']; ?>%</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>

  <script type="text/javascript" src="../scripts/js/navbarGenerator.js"></script>
	<script type="text/javascript" src="../scripts/js/tools.js"></script>

  <script type="text/javascript" src="../scripts/js/all.min.js"></script>

</body>
</html>
