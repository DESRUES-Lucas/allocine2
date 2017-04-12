<?php $titre_page="Edition catégorie";
$p_active="'list_categorie";

include('../include/session.inc.php');
include('../template/header.tpl.php');
include('../include/sql.inc.php');
$categ_id = $_GET["categ_id"];
$bdd = connect_pdo();

// On vérifie si on modifie ou édite une categorie
if ($categ_id){
		// On récupère les informations de la catégorie à modifier
		$sql = "SELECT * FROM allo_categorie WHERE categ_id=" .$categ_id;
		//$tab = send_sql_simple($bdd,$sql);
		$id = '<input type="hidden" class="form-control" type="text" name="categ_id" value="' . $categ_id .'">';
}
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Edition de catégorie</title>
</head>
<body>
		<ol class="breadcrumb">
      		<li><a href="../_home.home.php">Home</a></li>
      		<li><a href="../_categ/categ_list.php">Categorie</a></li>
      		<li class="active">Edit</li>
    	</ol>
<form class="form-horizontal" action="./categ_sql.php" method="post" style="margin-top: 10px;">
	<?= $id ?>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="categ_titre">Nom:</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="categ_nom" value="<?= $tab["categ_nom"]?>">
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
<?php include('../template/footer.tpl.php'); ?>
