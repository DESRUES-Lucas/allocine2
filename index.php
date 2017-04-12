<?php
include('admin/include/conf.inc.php');
include('admin/include/sql.inc.php');
$bdd = connect_pdo();
//$sql = "SELECT * FROM allo_film ORDER BY film_id DESC LIMIT 3";
//$tab = send_sql_multi($bdd, $sql);
//mysqli_close($bdd);

?><!DOCTYPE html>
<html  lang="fr">
	<head>
		<title>Tableau</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8" />

		<link rel="stylesheet" href="style/mon_style2.css">
		<style>
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- include Cycle plugin -->
		<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
		<script type="text/javascript">
				$(document).ready(function() {
    				$('.slideshow').cycle({
		    			fx:    'turnDown',
    					sync:  true,
    					speed: 3000,
    					timeout: 2000
					});
				});
		</script>
	</head>
	<body>
		<header>
			<div id="top" class="blue-grad">
				<div class="my_center my_width">
					EN | FR
				</div>
			</div>
			<div id="menu" class="my_center my_width">
			Menu <nav>

				<!--	<li><a href="#">Home</a></li> -->
				 </nav>
			</div>
		</header>
		<section>
			<div class="row">
			<div id="intro" class="col-sm-10 col-xs-offset-1">

				<div class="slideshow col-sm-6 ">
				<?php foreach ($tab as $film): ?>
					<img class="img-responsive" src="img/film/<?= $film['film_img'] ?>" width="450" height="600"/>
				<?php endforeach ?>
				</div>


				<div data-id="media-list" class="col-sm-6" >

				<?php foreach ($tab as $film): ?>
					<div class="media">
  						<div class="media-left">
    						<a href="#">
      							<img class="media-object" src="img/film/<?= $film['film_img'] ?>"  height="175px">
    						</a>
  						</div>
  						<div class="media-body">
    						<h4 class="media-heading"><?= $film['film_titre'] ?></h4>
    						<p style="overflow-x: hidden; overflow-y: auto; height: 150px;"><?= $film['film_txt'] ?></p>
  						</div>
					</div>
				<?php endforeach ?>

				</div>

			</div>
			</div>
		</section>

		<footer>
			<div class="my_center my_width">
				@my website
			</div>
		</footer>

	</body>
</html>
