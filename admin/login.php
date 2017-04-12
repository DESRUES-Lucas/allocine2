<?php
session_start();
include('../admin/include/sql.inc.php');
// Ici traitement : vérif login et mdp



$_SESSION['login'] = $_POST['login'];
$_SESSION['mdp'] = $_POST['mdp'];

$login = $_POST['login'] ;
$psw = $_POST['mdp'] ;




$sql="SELECT user_psw FROM allo_user WHERE user_login = :login ";
$db = $bdd->prepare($sql);
$db->bindParam(':login', $login, PDO::PARAM_INT);
try {
  $db->execute();
  $row = $db->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  die("erreur sql <br><b>".$sql."</b><br>".$e->getMessage());
}



  if ($row['user_psw'] == md5($psw)) {
  header("location:_home/home.php");
  }



//
//if ($login === ) {
  # code...
//}


?>
