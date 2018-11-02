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
			ini_set('display_errors', 1);
			function displayChildrenTable($db)
			{
				$childrenTable = $db->query('SELECT * FROM children');
				echo '<table class="table">
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>Contact parent</th>
								<th>Remarques</th>
								<th>Options</th>
							</tr>';
				while($datas=$childrenTable->fetch())
				{
					echo
		 				'	
		 					<tr>
			 					<form method="post">
				 					<td><textarea name="children_lastname">' . $datas['children_lastname'] . '</textarea></td>
				 					<td><textarea name="children_firstname">' . $datas['children_firstname'] . '</textarea></td>
				 					<td><textarea name="children_birthday">' . $datas['children_birthday'] . '</textarea></td>
				 					<td><textarea name="children_adress">' . $datas['children_adress'] . '</textarea></td>
				 					<td><textarea name="children_parents_contact">' . $datas['children_parents_contact'] . '</textarea></td>
				 					<td><textarea name="children_remarks">' . $datas['children_remarks'] . '</textarea></td>
				 					<td>
			 							<input type="number" name="idChild" class="idChild" value="' . $datas['children_id'] . '">
			 							<button class="modifyChild" name="modifyChild" type="submit"><img class="icon pen" src="assets/pencil.png"></button>
			 							<button class="deleteChild" name="deleteChild" type="submit"><img class="icon bin" src="assets/bin.png"></button>
		 							</td>
			 					</form>
		 					</tr>';
				}
				echo '</table>';
			}

			function delete($db)
			{
				$idChild = $_POST['idChild'];
				$db->query('DELETE FROM children WHERE children_id = ' . $idChild);
	
			}

			function modify($db)
			{
				$idChild = $_POST['idChild'];
				$children_lastname = $_POST['children_lastname'];
				$children_firstname = $_POST['children_firstname'];
				$children_birthday = $_POST['children_birthday'];
				$children_adress = $_POST['children_adress'];
				$children_parents_contact = $_POST['children_parents_contact'];
				$children_remarks = $_POST['children_remarks'];
				$db->query('UPDATE children SET 
				children_lastname = "'.$children_lastname.'",
				children_firstname = "'.$children_firstname.'",
				children_birthday = "' . $children_birthday . '",
				children_adress = "' . $children_adress . '",
				children_parents_contact = "' . $children_parents_contact . '",
				children_remarks = "' . $children_remarks . '" WHERE children_id = ' . $idChild);
			}

			if(isset($_POST['deleteChild']))
			{
				delete($db);
			}

			else if(isset($_POST['modifyChild']))
			{
				modify($db);
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
				header("Location: activite.php");
			}
		?>
	</body>
</html>