<?php
include('../include/session.inc.php');
include('../include/conf.inc.php');
include('../include/sql.inc.php');

$categ_id = $_GET["categ_id"];
$bdd = connect_pdo();

$sql	 = " DELETE FROM";
$sql 	.= " allo_categorie ";
$sql 	.= " WHERE	categ_id=".$categ_id;
// REDIRECTION vers categ_list.php
//send_sql($bdd,$sql);
sleep(2);
?>
