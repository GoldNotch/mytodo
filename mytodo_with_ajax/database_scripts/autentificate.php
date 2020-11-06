<?php 
	
	require 'connection_info.php';
	function autentificate($login, $password)
	{
		$login = trim($login);
		$password = trim($password);

		// Create connection
		$conn = new mysqli(servername, $login, $password, 'mytaskmanagerdatabase');

		// Check connection
		if ($conn->connect_error) {
			 die("Ошибка подключения:". $conn->connect_error);
		}
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['password'] = $password;
		session_commit();
	}

	autentificate($_GET['login'], $_GET['password']);
	header('Location: ../list_view.php');
	exit();
?>