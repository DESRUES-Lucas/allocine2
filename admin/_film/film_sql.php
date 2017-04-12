<?php
include('../include/session.inc.php');
include('../include/conf.inc.php');
include('../include/sql.inc.php');
//var_dump($_FILES);

$film_id= $_POST["film_id"];
$bdd = connect_pdo();

// Si on est en création pour pouvoir renomé le fichier il faut récupérer l'ID
if (!($film_id)){
	$sql = " INSERT INTO allo_film SET film_categ_id = " . $_POST["film_categ_id"];
	send_sql($bdd, $sql);
	// récupère le dernier id inséré
	$film_id = mysqli_insert_id($bdd);
}

// attention j'ai l'Id du film

// Définir le répertoire ou se trouve les photos
$rep_img = "../../img/film/";

// Si il n'y pas d'error et si j'ai upload une photo
if ( (!($_FILES['film_img']['error'])) && $_FILES['film_img']['tmp_name'] ){
	// récupère le nom du fichier image.jpg / photo.png
	echo "film uploade";
	$nom_fichier = $_FILES['film_img']['name'];
	//récupère l'extension par ex: jpg
	$tab = explode(".",$nom_fichier);
	$ext = $tab[1];
	// $fichier_final = nom du fichier + extension
	$fichier_finale = $film_id.".".$ext;
	// Définir la destination finale avec le nom du fichier
	//$destination_finale = nom du repertoire  + nom du fichier + extension
	$destination_finale = $rep_img.$fichier_finale;
	// deplacement du fichier temporaire*
	move_uploaded_file($_FILES['film_img']['tmp_name'],$destination_finale);
	}

$sql = " UPDATE";
$sql .= " allo_film SET";
$sql .= " film_titre = '".$_POST["film_titre"]."' ,";
// si un fichier a ete uploader (pour ne pas effacer l'ancien)
if($fichier_finale)
	$sql .= " film_img 	= '" . $fichier_finale . "' , ";

$sql .= " film_txt 	= '".addslashes($_POST["film_txt"])."', ";
$sql .=  " film_categ_id = '" . $_POST["film_categ_id"] ."'";
$sql .= " WHERE	film_id='".$film_id."'";
// REDIRECTION vers film_list.php
//echo $sql;
send_sql($bdd,$sql);
header("location:film_list.php");


// Ancienne requête
/*
$sql = "INSERT INTO";
if ($film_id){
		$sql = "UPDATE";
}
$sql .= " allo_film SET";
$sql .= " film_titre = '" . $_POST["film_titre"] ."',";
$sql .= " film_txt = '" . addslashes($_POST["film_txt"]) ."',";
$sql .= " film_img = '" . $_POST["film_img"] ."',";
$sql .= " film_categ_id = '" . $_POST["film_categ_id"] ."' ";


if ($film_id){
		$sql .= "WHERE film_id = '" . $film_id . "'";
}

$bdd = connect_bdd();
$tab = send_sql($bdd,$sql);

header("location:./film_list.php");
?>*/
