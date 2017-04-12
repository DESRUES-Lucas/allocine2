<?php $titre_page="Home";
$p_active = "home";
include('../include/session.inc.php');
include('../template/header.tpl.php');
include('../include/sql.inc.php');


$bdd = connect_pdo();
//$sql = "SELECT film_titre AS value,film_id AS id FROM allo_film";
//$tab = send_sql_multi($bdd,$sql);
//mysqli_close($bdd);


?>
 <script>
 // doc ready
  $( function() {
//--------------------------------
    $( "#myFilm" ).autocomplete({
      source: <?= json_encode($tab) ?>,
      select: function( event, ui ) {
        //alert( "Selected: " + ui.item.value + " id : " + ui.item.id );
        window.location= "../_film/film_edit.php?film_id="+ ui.item.id ;
      }
    });
//--------------------------------
  }); // jquery
  </script>

<div class="jumbotron">
		<h3>Back Office Allociné</h3>
		<p>Mon super back office</p>
</div>

  Film : <input type="text" id="myFilm"> <br><br>
<a class="btn btn-primary" href="../_film/film_list.php" role="button">
  <i class="glyphicon glyphicon-th-list">

    </i>
  Liste des Films
</a>
<a class="btn btn-success" href="../_categ/categ_list.php" role="button">
  <i class="glyphicon glyphicon-th-list">

    </i>
  Liste des Catégories
</a>


<?php include('../template/footer.tpl.php'); ?>
