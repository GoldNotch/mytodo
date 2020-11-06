<?php
	require 'connection_info.php';
	$url = $_SERVER['REQUEST_URI'];
	$id_str = parse_url($url, PHP_URL_QUERY);
	parse_str($id_str, $output);
	
	function load_comments($id)
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
		$sql = 'SELECT id, text from  mytaskmanagerdatabase.comments WHERE task_id = ?';
		$comments = [];
		if ($stmt = $conn->prepare($sql))
		{
			echo $stmt->bind_param("i", $id);
			if (!$stmt->execute())
				die($conn->error);
			$result = $stmt->get_result();
			if ($result && $result->num_rows > 0)
			{
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
				   		$comments[$row['id']] = ['id'=> $row['id'],
				   									'text' => $row['text'] ];
				  }
			}
			$stmt->close();
		}
		else die($conn->error);

		$conn->close();
		return $comments;
	}

	$comments = load_comments($output['id']);
	header('Content-Type: application/json');
	echo json_encode($comments);
 ?>