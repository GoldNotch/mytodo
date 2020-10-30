<!DOCTYPE html>
<html>
<head>
	<title>Список задач</title>
	<link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	<!-- Заголовок. Статический -->
	<header>
		<h1>Задачи</h1>
		<a href="add_form.php">Добавить задачу</a>
		<a href="quit.php">Выйти</a>
	</header>
	<!-- Основная часть. Заполняется сервером -->
	<main>
		<ul>
			<?= $list_items ?>
		</ul>
	</main>
</body>
</html>