<?php $titre_page="Liste des films";
$p_active = "film";
include('../include/session.inc.php');
include('../template/header.tpl.php');
include('../include/sql.inc.php');


// Pas besoin car inclu dans conf.inc.php
// include('../include/conf.inc.php');
$bdd=connect_pdo();
//$sql="SELECT * FROM allo_film";
//$tab= send_sql_multi($bdd,$sql);
//var_dump($tab);
// OU
//echo "<pre>";
//print_r($tab);
//echo "</pre>";

//mysqli_close($bdd);
?>
<script>
// doc ready fct
var tr;
var btn;
$(document).ready(function() {
//  $( function() { // autre syntax doc ready fct
//------------------------------------
	$('.spinner').hide();

	$(".btn-danger").click(function() {
		var btn = $(this);
		$.confirm({
			title: 'Suppression du film',
			content: 'T\'es sûr bro?',
			columnClass: 'col-md-8 col-md-offset-2',
			confirmButton: 'Carrément',
    		cancelButton: 'Nan je déconne!',
    		confirm: function(){
    			btn.hide();
				btn.next().show();
				var tr = btn.parents("tr");
				var id = tr.attr("data-id");
				// envoyer a film_ajax_delete.php
				$.get( "film_ajax_delete.php", { film_id: id } )
	  				.done(function( data ) {
	    		 		tr.hide('slow');
	    				//alert(  tr.html() ); // affiche les donnees affiche ds le php
	  				})
	  				.fail(function() { // permet de checker si bon fichier
	    				alert( "error" );
	  				});
    			}
		});
	}); // end fct  danger
//------------------------------------

//-------Pop Up ajout-------------------
	$(".btn-add").click(function() {
		$.confirm({
			title: 'Ajout de film',
			content: 'url:film_edit.php',
			columnClass: 'col-md-8 col-md-offset-2',
			confirmButton: false,
		});
	});

//----------Fin Pop Up ajout--------------

//---------Pop Up update---------------
	$(".modif").click(function() {
		$(this).hide();
		$(this).show();
		var tr = $(this).parents("tr");
		var id = tr.attr("data-id");
		console.log(id);
		$.confirm({
			title: 'Modification du film',
			content: 'url:film_edit.php?film_id='+id,
			columnClass: 'col-md-8 col-md-offset-2',
			confirmButton: false,
		});
	});
//---------Fin Pop Up update


}); // jquery
//------------------------------------

</script>

		<ol class="breadcrumb">
      		<li><a href="../_home.home.php">Home</a></li>
      		<li class="active">Liste</li>
    	</ol>
	<h1>Liste des films</h1>

	<table class="table table-striped">
		<tr>
			<th>Id</th>
			<th>Titre</th>
			<th><button type="button" class="btn btn-add">
				<i class="glyphicon glyphicon-plus"></i>
 				</button>
 			</th>
		</tr>
		<?php if ($tab){
			foreach ($tab as $value) {
				$id = $value['film_id'];
				?>
			<tr data-id="<?= $id ?>">
				<td><?= $id ?></td>
				<?php var_dump($id); ?>
				<td><a href="#" class="modif"><?= $value['film_titre'] ?></a></td>
				<td><img width = 200 src=" ../img/<?= $value['film_img']?>" alt=""></td>

				<!-- Remplacé par methode ajax
				<td><a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce film?')" href="film_delete.php?film_id=<?= $id ?>"><i class="glyphicon glyphicon-trash"></i>
				Supprimer</a></td> -->
				<td><button type="button" class="btn btn-danger">
					<i class="glyphicon glyphicon-trash"></i>
 					</button>
					<img src="../img/spinner.gif" class="spinner">
 				</td>
			</tr>
			<?php }} ?>
	</table>




</body>
</html>
<?php include('../template/footer.tpl.php'); ?>
