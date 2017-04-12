<?php
include('conf.inc.php');
//----------------------------------------
// Connection base de Données 
// retourne identifiant connexion
//----------------------------------------
function connect_bdd(){
	// Syntaxe acceptée, car avec or si la première partie est réalisée, la seconde ne s'effectue pas
	//$bdd = mysqli_connect(HOST,LOGIN,PSW,BASE) or die("Connexion Error: ".
	//		mysqli_connect_error());
	$bdd = mysqli_connect(HOST,LOGIN,PSW,BASE);
	mysqli_set_charset($bdd,"utf8");
	if (!($bdd))
		die("Connexion Error: ".
			mysqli_connect_error());
	return $bdd;//identifiant connexion
}
//----------------------------------------
// Envoie une requete SQL
// retourne un tableau multiligne
// For example : SELECT *
//----------------------------------------
function send_sql_multi($bdd,$sql){
	$res = mysqli_query($bdd,$sql);
	if ($res){
		while ($row= mysqli_fetch_assoc($res)){
			$tab[] = $row;
		}
		return $tab;
	}
	else {
		die($sql."<br><br>".mysqli_error($bdd));
	}
	
}
//----------------------------------------
// Envoie une requete SQL
// retourne un tableau avec 1 ligne
// For example : SELECT * WHERE ID = $id
//----------------------------------------
function send_sql_simple($bdd,$sql){
	$res = mysqli_query($bdd,$sql);
	if ($res){
		$tab= mysqli_fetch_assoc($res);
		return $tab;
	}
	else {
		die($sql."<br><br>".mysqli_error($bdd));
	}
	
}
//----------------------------------------
// Envoie une requete SQL
// retourne un tableau avec 1 ligne
// For example : INSERT UPDATE DELETE
//----------------------------------------
function send_sql($bdd,$sql){
	$resultat = mysqli_query($bdd,$sql)
	 or die ($sql."<br><br>".mysqli_error($bdd));
}




?>