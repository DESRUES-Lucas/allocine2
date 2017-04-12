<?php

define('HOST','localhost');
define('LOGIN', 'root');
define('PSW','');
define('BASE','allocine2');

///--------------------------------------------------

function connect_pdo(){
 try{
   $bdd = new PDO('mysql:host='.HOST.';dbname='.BASE, LOGIN, PSW);

   // vos erreurs ne sont plus silencieuses
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(Exception $e){

   die('Echec de la connexion bdd :'. $e->getMessage());
 }
 return $bdd;
}

$bdd = connect_pdo();

try {
  $reponse = $bdd->query('SELECT * FROM allo_film');
} catch (Exception $e) {
  exit('<b>Catched exeption at line '. $e->getLine() .' ; </b> '. $e-> getMessage());
}

while ($donnees = $reponse->fetch()) {
  $tab[] = $donnees;
}



$id = 0;
$db = $bdd->prepare('SELECT * FROM allo_film WHERE film_id = :id');
$db->bindParam(':id', $id, PDO::PARAM_INT);




?>
