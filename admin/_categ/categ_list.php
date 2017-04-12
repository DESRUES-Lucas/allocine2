<?php $titre_page="Liste des catégories";
$p_active = "categorie";
include('../include/session.inc.php');
include('../template/header.tpl.php');
include('../include/sql.inc.php');


// Pas besoin car inclu dans conf.inc.php
// include('../include/conf.inc.php');
$bdd=connect_pdo();
$sql="SELECT * FROM allo_categorie";
//$tab= send_sql_multi($bdd,$sql);
//var_dump($tab);
// OU
//echo "<pre>";
//print_r($tab);
//echo "</pre>";

mysqli_close($bdd);
?>
<script>

// ligne du tableau sortable
$( function() {
	$( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
} );


// doc ready fct
var tr;
$(document).ready(function() {
//  $( function() { // autre syntax doc ready fct
//------------------------------------
	$('.spinner').hide();

	$(".btn-danger").click(function() {
		if (confirm('Voulez vous vraiment supprimer cette catégorie ?')){
			// cache btn
			$(this).hide();
			$(this).next().show();
			var tr = $(this).parents("tr");
			var id = tr.attr("data-id");
			// envoyer a film_ajax_delete.php
			$.get( "categ_ajax_delete.php", { categ_id: id } )
	  			.done(function( data ) {
	    		 tr.hide('slow');
	    		//alert(  tr.html() ); // affiche les donnees affiche ds le php
	  			})
	  			.fail(function() { // permet de checker si bon fichier
	    			alert( "error" );
	  			});
	  	}
	}); // end fct  danger
//------------------------------------
}); // jquery
//------------------------------------
</script>
		<ol class="breadcrumb">
      		<li><a href="../_home.home.php">Home</a></li>
      		<li class="active">Liste</li>
    	</ol>
	<h1>Liste des catégories</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th><th>Nom</th><th>Action</th>
			</tr>
		</thead>
		<tbody id="sortable">
			<?php if ($tab){
				foreach ($tab as $value) {
					$id = $value['categ_id'];
					?>
				<tr data-id="<?= $id ?>">
					<td class="col-xs-2" style="width:274.45px;"><?= $id ?></td>
					<td class="col-xs-8" style="width:274.45px;"><a href="categ_edit.php?categ_id=<?= $id ?>"><?= $value['categ_nom'] ?></a></td>
					<!--<td><a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie?')" href="categ_delete.php?categ_id=<?= $id ?>"><i class="glyphicon glyphicon-trash"></i>
					Supprimer</a></td>-->
					<td class="col-xs-2" style="width:274.433px;"><button type="button" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i>
	 					</button>
						<img src="../img/spinner.gif" class="spinner">
	 				</td>
				</tr>
				<?php }} ?>
		</tbody>
	</table>

	<a class="btn btn-primary col-sm-12" href="./categ_edit.php"><i class="glyphicon glyphicon-plus"></i>
	Ajouter</a>

</body>
</html>
<?php include('../template/footer.tpl.php'); ?>
