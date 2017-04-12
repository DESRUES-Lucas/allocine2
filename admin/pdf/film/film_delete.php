<?php


require("../include/session.inc.php");
require("../include/conf.inc.php");
require("../include/sql.inc.php");

$bdd = my_connect();

$id = $_GET['idFilm'];
echo $id;

$sql = "DELETE FROM `allo_film` WHERE `film_id` = ".$id;


send_sql($bdd, $sql);

header("location:film_list.php");


 ?>
