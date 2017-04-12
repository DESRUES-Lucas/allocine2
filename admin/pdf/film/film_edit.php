<?php
require("../include/session.inc.php");
require("../include/conf.inc.php");
require("../include/sql.inc.php");

$bdd = my_connect();

$sql = "SELECT * FROM allo_film";

$sql_categ = "SELECT * FROM allo_category";

$sqlSimple = "SELECT * FROM allo_film WHERE film_id = $_GET[idFilm]";

$tab = send_sql_multi($bdd, $sql);

$tab_categ = send_sql_multi($bdd, $sql_categ);



if (isset($_GET['idFilm'])){
  $tabSimple = send_sql_simple($bdd, $sqlSimple);
}else {
   $tabSimple = null;
}


$titre = "Edition de la fiche";
include('../template/header.tpl.php');




?>

<div class="col-md-12">
  <h1 class="col-md-8" style="margin-bottom:40px;"><strong><?=$titre?></strong> </h1>
</div>

<form class="col-md-8" action="film_sql.php" method="post">
  <div class="form-group">
    <input type="hidden" name="film_id" value="<?= $tabSimple['film_id'] ?>">
  </div>
  <div class="form-group">
    <label for="titreFilm">Titre du film</label>
    <input type="text" class="form-control" id="film_name" name="film_name" value="<?=$tabSimple['film_name']; ?>">
  </div>
  <div class="form-group">
    <label for="film_text">Synopsis</label>
    <input type="text" class="form-control" id="film_text" name="film_text" value="<?=$tabSimple['film_text']; ?>">
  </div>
  <div class="form-group">
    <label for="film_img">Poster du film</label>
    <input type="text" class="form-control" id="film_img"  name="film_img" value="<?=$tabSimple['film_img']; ?>">
  </div>
  <div class="form-group">
    <label for="film_date">Date de création du film</label>
    <input type="date" class="form-control" id="film_date" name="film_date" value="<?=$tabSimple['film_date']; ?>">
  </div>

  <div class="form-group">
    <select class="" name="categ_id">
      <?php foreach ($tab_categ as $key => $value): ?>
        <option value="<?=$value['categ_id'] ?>" name="categ_id"><?= $value['categ_name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
  <button type="submit" class="btn btn-danger">Annuler</button>
</form>

<?php
include('../template/footer.tpl.php')
 ?>
