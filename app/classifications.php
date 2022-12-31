<?PHP

require_once '../scripts/php/classes/databaseHandler.class.php';
require_once '../scripts/php/classes/crud/classifications.class.php';

$handler 	= new Classifications();
// c is shortcut of classifications
$c_arr 		= $handler -> getAll();

$handler = null;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Classifications</title>

	<?php require_once './styleLinks.php'; ?>

	<link rel="stylesheet" type="text/css" href="../styles/crud/classifications.css">
	<link rel="stylesheet" type="text/css" href="../styles/navbarStyle.css">
	<link rel="stylesheet" type="text/css" href="../styles/common.css">

	<link rel="stylesheet" type="text/css" href="../styles/all.min.css">
</head>
<body>

	<!-- alert -->
	<?php require_once './alert.php'; ?>

	<nav></nav>

	<a class="new" href="classificationsForm.php"><i class="fa-solid fa-plus"></i></a>

	<main>
		<?php 
		foreach ( $c_arr as $value ) { ?>
			<section>
				<a href="./exams.php?c_id=<?php echo $value [0] ?>&c_name=<?php echo $value [1]; ?>">
					<h4 title="<?php echo $value [1]; ?>"><?php echo $value [1]; ?></h4>
				</a>
				<article>
					<a class="btn btn-success" href="./classificationsForm.php?c_id=<?php echo $value [0]; ?>&c_name=<?php echo $value [1]; ?>">Edit</a>
					<a class="btn btn-danger" href="../scripts/php/classificationsAction.php?c_id=<?php echo $value [0]; ?>">Delete</a>
				</article>
			</section>
		<?php } ?>
	</main>

	<script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../scripts/js/all.min.js"></script>

	<script type="text/javascript" src="../scripts/js/navbarGenerator.js"></script>
</body>
</html>