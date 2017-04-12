<?php $titre_page="Edition de film";
$p_active="film";

include('../include/session.inc.php');
include('../include/sql.inc.php');
$film_id = $_GET["film_id"];
var_dump($film_id);
$bdd = connect_pdo();

// On vérifie si on modifie ou édite un film
if ($film_id){
		// On récupère les informations du film à modifié
		$sql = "SELECT * FROM allo_film WHERE film_id=" .$film_id;
		//$tab = send_sql_simple($bdd,$sql);
		$id = 	'<input type="hidden" class="form-control" type="text" name="film_id" value="' . $film_id .'">';
}
//Formulaire d'ajout et de modif de film

// On récupère les différentes catégorie à afficher dans $cat
$sql2= "SELECT * FROM allo_categorie";
//$cat= send_sql_multi($bdd,$sql2);
//echo $film_id;

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Edition de film</title>
</head>
<body>
		<ol class="breadcrumb">
      		<li><a href="../_home/home.php">Home</a></li>
      		<li><a href="../_film/film_list.php">Liste</a></li>
      		<li class="active">Edit</li>
    	</ol>
<form class="form-horizontal" action="./film_sql.php" method="post" enctype="multipart/form-data" style="margin-top: 10px;">
	<?= $id ?>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="film_titre">Titre:</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="film_titre" value="<?= $tab["film_titre"]?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="film_txt">Texte:</label>
		<div class="col-sm-10">
			<textarea class="form-control" style="resize:vertical;" name="film_txt"><?= $tab["film_txt"]?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="film_img">Image:</label>
		<div class="col-xs-2">
			<input  type="file" name="film_img">
			<?php if  ($tab['film_img']) { ?>
			<img  src="../../img/film/<?= $tab['film_img'] ?>">
			<?php } ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="film_categ_id">Catégorie:</label>
		<div class="col-sm-10">
			<select class="form-control" name="film_categ_id" value="<?= $tab["film_categ_id"]?>">
				<?php foreach ($cat as $value){
					if ($tab["film_categ_id"]==$value["categ_id"]){ ?>
						<option value="<?= $value["categ_id"]?>" selected><?= $value["categ_nom"]?></option>
					<?php }
					else{ ?>
						<option value="<?= $value["categ_id"]?>"><?= $value["categ_nom"]?></option>
				<?php }} ?>
			</select>
		</div>
	</div>
	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      	<button type="submit" class="btn btn-default">Edit</button>
    </div>
  </div>
</form>

</body>
</html>
