<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Activités</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Liste des activités</h1>
		<table class="table">
			<tr>
				<th>Nom de l'activité</th>
				<th>Type de l'activité</th>
				<th>Nombre de places maximum</th>
			</tr>
			<?php 
				require("connect.php");
				require("function.php");
				displayActivities($db);
			?>
		</table>
		<form method="post">
			<button class="btn btn-success" name="displayChildren" type="submit">Afficher les enfants</button>
			<button class="btn btn-success" name="editChildren" type="submit">Gérer les enfants</button>			
			<button class="btn btn-success" name="addActivity" type="submit">Ajouter une activité</button>		
		</form>
		<?php 
			if(isset($_POST['displayChildren']))
			{
				header('Location: index.php');
			}

			if(isset($_POST['editChildren']))
			{
				header("Location: admin.php");
			}

			if(isset($_POST['addActivity']))
			{
				header("Location: addActivity.php");
			}
		?>
	</body>
</html>