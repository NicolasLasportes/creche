<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Administration</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Page d'administration</h1>
		<?php 
			require("connect.php");
			require("function.php");
			if(isset($_POST['deleteChild']))
			{
				delete($db);
				displayChildrenTable($db);
			}

			else if(isset($_POST['modifyChild']))
			{
				modify($db);
				displayChildrenTable($db);
			}

			else
			{
				displayChildrenTable($db);
			}
		?>
		</table>
		<form method="post">
			<button class="btn btn-success" name="displayChildren" type="submit">Afficher les enfants</button>
			<button class="btn btn-success" name="displayActivities" type="submit">Afficher les activités</button>			
		</form>
		<?php 
			if(isset($_POST['displayChildren']))
			{
				header('Location: index.php');
			}

			if(isset($_POST['displayActivities']))
			{
				header("Location: activity.php");
			}
		?>
	</body>
</html>