<?php
require 'connection_info.php';
function insert_to_bd($name, $description, $deadline)
{
	$name = trim($name);
	$description = trim($description);

	if (!empty($name) && !empty($description) && !empty($deadline))
	{
		session_start();
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		session_commit();
		// Create connection
		$conn = new mysqli(servername, $login, $password);

		// Check connection
		if ($conn->connect_error) {
			 die("Connection failed: " . $conn->connect_error);
		}

		$deadline = date('Y-m-d', strtotime($deadline));
	    $sql = 'INSERT INTO mytaskmanagerdatabase.tasks(name, description, deadline, owner) VALUES (?, ?, ?, ?)';
		$id = 0;
		if ($stmt = $conn->prepare($sql))
		{
			echo $stmt->bind_param("ssss", $name, $description, $deadline, $login);
			if ($stmt->execute())
				$id = $conn->insert_id;
			else
				die($conn->error);
			$stmt->close();
		}

		for($i = 0; $i < 3; $i++)
		{
			$sql = 'INSERT INTO mytaskmanagerdatabase.comments(task_id, text) VALUES (?, ?)';
			if ($stmt = $conn->prepare($sql))
			{
				$temp = $i.' comment for task:'.$name;
				echo $stmt->bind_param("is", $id, $temp);
				if (!$stmt->execute())
					die($conn->error);
				$stmt->close();
			}
			else die($conn->error);
		}
		$conn->close();
		return $id;
	}
	else die('query has emptry string');
}

insert_to_bd($_POST['name'], $_POST['description'], $_POST['deadline']);
header ('Location: ../list_view.php');
exit();
?>