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
				ini_set('display_errors', 1);
				require("connect.php");
				$activityTable = $db->query('SELECT * FROM activity');
				while($datas=$activityTable->fetch())
				{
					echo
	     				'<tr>
	     					<td>' . $datas['activity_name'] . '</td>
	     					<td>' . $datas['activity_type'] . '</td>
	     					<td>' . $datas['activity_number_max_child'] . '</td>
	     				</tr>';
	     		}
			?>
		</table>
		<form method="post">
			<button class="btn btn-success" name="displayChildren" type="submit">Afficher les enfants</button>
			<button class="btn btn-success" name="editChildren" type="submit">Gérer les enfants</button>			
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


		?>
	</body>
</html>