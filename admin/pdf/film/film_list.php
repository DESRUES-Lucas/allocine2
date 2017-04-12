<?php
require("../include/session.inc.php");
require("../include/conf.inc.php");
require("../include/sql.inc.php");

$bdd = my_connect();
$sql = "SELECT * FROM allo_film";
$tab = send_sql_multi($bdd, $sql);

$titre = "Liste des films";
include('../template/header.tpl.php');
?>

<div class="col-md-12">
  <h1 class="col-md-8"><strong><?=$titre?></strong> </h1>
  <a class="col-md-4" href="film_edit.php"><span class="glyphicon glyphicon-plus pull-right ajoutLogo"></span></a>
</div>
<table class="table">
  <?php foreach ($tab as $key => $film): ?>
    <tr>
      <td><strong> <?= $film["film_name"]?></strong></td>
      <td><img width = 200 src=" ../img/<?= $film['film_img']?>" alt=""></td>
      <td><h3><strong>Synopsis</strong></h3><?= $film["film_text"]?></td>
      <td><strong><?= $film["film_date"]?></strong></td>
      <td>
        <a class="col-md-4" href="film_edit.php?idFilm=<?= $film['film_id']?>"><span class="glyphicon glyphicon-pencil pull-right pencil"></span></a>
        <a class="col-md-4" href="film_delete.php?idFilm=<?= $film['film_id']?>"><span class="glyphicon glyphicon-trash pull-right pencil" style="margin-top:5px;"></span></a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php
include('../template/footer.tpl.php')
 ?>
