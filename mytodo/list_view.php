<?php 
	require_once 'SimpleTemplateEngine/loader.php';

	require 'database_scripts/connection_info.php';
	function getTasks()
	{
		session_start();
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		session_commit();

		// Create connection
		$conn = new mysqli(servername, $login, $password, 'mytaskmanagerdatabase');

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$tasks_list = [];
		$sql = 'SELECT id, name, description, deadline FROM tasks where owner = ?';
		
		if ($stmt = $conn->prepare($sql))
		{
			$stmt->bind_param("s", $login);
			if (!$stmt->execute())
				die($conn->error);
			$result = $stmt->get_result();
			if ($result)
			{
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
				   		$tasks_list[$row['id']] = ['id'=> $row['id'],
				   									'name' => $row['name'],
				   									'description' => $row['description'],
				   									'deadline' => $row['deadline'] ];
				  }
				}
			}
			else die("Ошибка: запрос на получение всех данных из таблицы не выполнился");
			$stmt->close();
		}
		

		$conn->close();
		return $tasks_list;
	}

	function render()
	{
		$env = new SimpleTemplateEngine\Environment('templates');
		$list = getTasks();
		$list_html = '';
		foreach($list as $task)
		{
			$list_html .= $env->render('task_template.php', [	'id' => $task['id'],
																'name' => $task['name'],
																'deadline' => $task['deadline'],
																'description' => $task['description']]);
		}



		$total_html = $env->render('list.php', ['list_items' => $list_html]);
		echo($total_html);
	}

	render();
?>