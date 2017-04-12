<?php
include('../include/session.inc.php');

?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8" />
		<title>Home</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>

		</script>
	</head>
	<body>
	<h1>Home</h1>
	<?php echo 'Bonjour ' . $_SESSION['login'];?>
	<button><a href="../logout.php">Logout</a></button>
	
	<a href="../_film/film_list.php">Liste des films</a>
	<a href="../_film/film_edit.php">Ajout / Modification</a>

	</body>
	</html>