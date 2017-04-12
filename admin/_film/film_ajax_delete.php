<?php
include('../include/session.inc.php');
include('../include/conf.inc.php');
include('../include/sql.inc.php');

$film_id = $_GET["film_id"];
$bdd = connect_pdo();

$sql	 = " DELETE FROM";
$sql 	.= " allo_film ";
$sql 	.= " WHERE	film_id=".$film_id;
// REDIRECTION vers film_list.php
send_sql($bdd,$sql);
sleep(2);
?>
