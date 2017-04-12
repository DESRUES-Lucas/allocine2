<?php
include('../include/session.inc.php');
include('../include/conf.inc.php');
include('../include/sql.inc.php');
//var_dump($_POST);
$film_id= $_GET["film_id"];

$sql = "DELETE FROM allo_film WHERE film_id=" . $film_id;

$bdd = connect_pdo();
//$tab = send_sql($bdd,$sql);

header("location:./film_list.php");
?>
