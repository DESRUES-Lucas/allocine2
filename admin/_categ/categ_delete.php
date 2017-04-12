<?php
include('../include/session.inc.php');
include('../include/conf.inc.php');
include('../include/sql.inc.php');
//var_dump($_POST);
$categ_id= $_GET["categ_id"];

$sql = "DELETE FROM allo_categorie WHERE categ_id=" . $categ_id;

$bdd = connect_pdo();
//$tab = send_sql($bdd,$sql);

header("location:./categ_list.php");
?>
