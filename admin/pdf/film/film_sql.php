<?php

require("../include/session.inc.php");
require("../include/conf.inc.php");
require("../include/sql.inc.php");

$bdd = my_connect();

$name = $_POST['film_name'];
$id = $_POST['film_id'];
$txt = $_POST['film_text'];
$categ_id = $_POST['categ_id'];

echo $categ_id;
//$img = $_POST['film_img'];
$img= "image";
$date = $_POST['film_date'];


if($_POST['film_id']){
  $sql =  "UPDATE allo_film SET film_name = '". $name."' WHERE film_id = $id ";
}else {

  $sql = "INSERT INTO allo_film SET film_name = '" . $name . "', " .
    "film_text = '" . $txt . "', " .
    "film_date = '" . $date . "', " .
    "film_categ_id = '" . $categ_id . "', " .
    "film_img = '" . $img . "' ";
}


send_sql($bdd, $sql);

header("location:film_list.php");

 ?>
