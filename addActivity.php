<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajouter une activité</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Ajouter une activité</h1>
		<form method="post">
			<div>
				<label for="activity_name">Nom</label>
				<input type="text" name="activity_name">
			</div>
			<div>
				<label for="activity_type">Type</label>
				<input type="text" name="activity_type"></div>
			<div>
				<label for="activity_number_max_child">Nombre d'enfants maximum</label>
				<input type="number" name="activity_number_max_child">
			</div>
			<button class="btn btn-success" type="submit" name="addActivity">Valider</button>
		</form>
		<form method="post" action="activity.php">
			<button type="submit" class="btn btn-success">Retour</button>
		</form>
		<?php 
			require("connect.php");
			require("function.php");
			if(isset($_POST['addActivity']))
			{
				addActivity($db);
			}
		?>
	</body>
</html>