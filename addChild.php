<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajouter une activité</title>
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form method="post">
			<div>
				<label for="children_firstname">Prénom</label>
				<input type="text" name="children_firstname">
			</div>
			<div>
				<label for="children_lastname">Nom</label>
				<input type="text" name="children_lastname">
			</div>
			<div>
				<label for="children_birthday">Date de naissance</label>
				<input type="date" name="children_birthday">
			</div>
			<div>
				<label for="children_adress">Adresse</label>
				<input type="text" name="children_adress">
			</div>
			<div>
				<label for="children_parents_contact">Contact</label>
				<input type="text" name="children_parents_contact">
			</div>
			<div>
				<label for="children_remarks">Remarque</label>
				<input type="text" name="children_remarks">
			</div>	
			<button class="btn btn-success" type="submit" name="addChild">Valider</button>
			<button class="btn btn-success" type="submit" name="return">Retour</button>
		</form>
		<?php 
			require("connect.php");
			if(isset($_POST['addChild']))
			{
				$children_firstname = $_POST['children_firstname'];
				$children_lastname = $_POST['children_lastname'];
				$children_birthday = $_POST['children_birthday'];
				$children_adress = $_POST['children_adress'];
				$children_parents_contact = $_POST['children_parents_contact'];
				$children_remarks = $_POST['children_remarks'];
				$db->query("INSERT INTO children (children_firstname, children_lastname, children_birthday, children_adress, children_parents_contact, children_remarks)
				VALUES ('" . $children_firstname . "', '" . $children_lastname . "', '" . $children_birthday . "', '" . $children_adress . "', '" . $children_parents_contact . "', '" . $children_remarks . "')");
				header("Location: index.php");
			}

			if(isset($_POST['return']))
			{
				header("Location: index.php");
			}
		?>
	</body>
</html>