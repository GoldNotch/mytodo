<!DOCTYPE html>
<html>
<head>
	<title>Список задач</title>
	<link rel="stylesheet" href="css/styles.css">
	<script type="text/javascript" src="scripts/main.js"></script>
</head>
<body>
	<!-- Заголовок. Статический -->
	<header>
		<h1>Задачи</h1>
		<a class="like-button" href="add_form.php">Добавить задачу</a>
		<a class="like-button" href="quit.php">Выйти</a>
	</header>
	<!-- Основная часть. Заполняется сервером -->
	<main>
		<ul>
			<?= $list_items ?>
		</ul>
	</main>
</body>
</html>