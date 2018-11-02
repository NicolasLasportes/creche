<?php 
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
				'<tr>
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

	function addActivity($db)
	{
		$activity_name = $_POST['activity_name'];
		$activity_type = $_POST['activity_type'];
		$activity_number_max_child = $_POST['activity_number_max_child'];
		$db->query("INSERT INTO activity (activity_name, activity_type, activity_number_max_child)
		VALUES ('" . $activity_name . "', '" . $activity_type . "', '" . $activity_number_max_child . "')");
		header("Location: activite.php");
	}

	function displayChildrenForm($idChild, $db)
	{
		$child = $db->query("SELECT * FROM children WHERE children_id = " . $idChild);
		while($datas = $child->fetch())
		{
			echo 
				"<div>" . $datas['children_lastname'] . "</div>
				<div>" . $datas['children_firstname'] . "</div>
				<div>" . $datas['children_birthday'] . "</div>
				<div>" . $datas['children_adress'] . "</div>
				<div>" . $datas['children_parents_contact'] . "</div>
				<div>" . $datas['children_remarks'] . "</div>";
		}
	}

	function displayActivities($db)
	{
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
	}
?>