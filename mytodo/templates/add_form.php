<!DOCTYPE html>
<html>
<head>
	<title>Добавить задачу</title>
	<link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	<!-- Заголовок. Статический -->
	<header>
		<h1>Добавить задачу</h1>
	</header>
	<!-- Основная часть. Заполняется сервером -->
	<main>
		<form method="post" action="database_scripts/insert_task.php">
			<p>
				Название задачи
				<input type="text" maxlength="64" name="name">
			</p>
			<p>
				Описание задачи
				<textarea maxlength="256" name="description"></textarea>
			</p>
			<p>
				Дедлайн задачи
				<input type="date" name="deadline">
			</p>
			<input type="submit" name="apply_button">
		</form>
	</main>
</body>
</html>

