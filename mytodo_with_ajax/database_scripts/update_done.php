<?php
	require 'connection_info.php';
	$url = $_SERVER['REQUEST_URI'];
	$id_str = parse_url($url, PHP_URL_QUERY);
	parse_str($id_str, $output);
	
	function update_done($id)
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
		$sql = 'UPDATE mytaskmanagerdatabase.tasks SET done = IF(done, false, true)  WHERE id = ?';
		if ($stmt = $conn->prepare($sql))
		{
			echo $stmt->bind_param("i", $id);
			if (!$stmt->execute())
				die($conn->error);
			$stmt->close();
		}
		else die($conn->error);

		$conn->close();
	}

	
	update_done($output['id']);
 ?>