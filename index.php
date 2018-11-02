<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Enfants</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Liste des enfants</h1>
		<table class="table">
			<tr>
				<th>Prénom</th>
				<th>Nom</th>
			</tr>
			<?php 
				require("connect.php");
				$childrenTable = $db->query('SELECT * FROM children');
				while($datas=$childrenTable->fetch())
				{
					echo
	     				'<tr>
	     					<form method="post" action="childrenForm.php">
	     						<input type="number" class="idChild" name="children_id" value="' . $datas['children_id'] . '">
	     						<td><button type="submit" name="children_firstname">' . $datas['children_firstname'] . '</button></td>
	     						<td><button type="submit" name="children_lastname">' . $datas['children_lastname'] . '</button></td>
	     					</form>
	     				</tr>';
	     		}
			?>
		</table>
		<form method="post">
			<button class="btn btn-success" name="displayActivities" type="submit">Afficher les activités</button>
			<button class="btn btn-success" name="editChildren" type="submit">Gérer les enfants</button>			
			<button class="btn btn-success" name="addChild" type="submit">Ajouter un enfant</button>			
		</form>
		<?php 
			if(isset($_POST['displayActivities']))
			{
				header('Location: activity.php');
			}

			if(isset($_POST['editChildren']))
			{
				header("Location: admin.php");
			}

			if(isset($_POST['addChild']))
			{
				header("Location: addChild.php");
			}
		?>
	</body>
</html>