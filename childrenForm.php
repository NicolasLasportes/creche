<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Fiche enfant</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php 
			require("connect.php");
			require("function.php");
			$idChild = $_POST['children_id'];
			displayChildrenForm($idChild, $db);
		?>
		<form method="post" action="index.php">
			<button type="submit" class="btn btn-success" name="listChildren">Retour à la liste</button>	
		</form>
	</body>
</html>