<?php
include('../include/session.inc.php');
include('../include/conf.inc.php');
include('../include/sql.inc.php');
var_dump($_POST);
$categ_id= $_POST["categ_id"];

$sql = "INSERT INTO";
if ($categ_id){
		$sql = "UPDATE";
}
$sql .= " allo_categorie SET";
$sql .= " categ_nom = '" . $_POST["categ_nom"] ."' ";


if ($categ_id){
		$sql .= "WHERE categ_id = " . $categ_id;
}

$bdd = connect_pdo();
//$tab = send_sql($bdd,$sql);

header("location:./categ_list.php");
?>
