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
	     					<td>' . $datas['children_firstname'] . '</td>
	     					<td>' . $datas['children_lastname'] . '</td>
	     				</tr>';
	     		}
			?>
		</table>
		<form method="post">
			<button class="btn btn-success" name="displayActivities" type="submit">Afficher les activités</button>
			<button class="btn btn-success" name="editChildren" type="submit">Gérer les enfants</button>			
		</form>
		<?php 
			if(isset($_POST['displayActivities']))
			{
				header('Location: activite.php');
			}

			if(isset($_POST['editChildren']))
			{
				header("Location: admin.php");
			}


		?>
	</body>
</html>