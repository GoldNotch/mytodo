<!DOCTYPE html>
<html>
<head>
	<title>О задаче</title>
	<link rel="stylesheet" href="css/styles.css">
	<script type="text/javascript" src="scripts/main.js"></script>
</head>
<body>
	<!-- Заголовок. Статический -->
	<header>
		<h1>О задаче</h1>
	</header>
	<!-- Основная часть. Заполняется сервером -->
	<main>
		<p>Название: <?= $name ?></p>
		<p>Срок выполнения: <?= $deadline ?></p>
		<p>Статус выполнения: <?= $done ?></p>
		<button onclick="load_comments(<?= $id ?>)">Подгрузить комментарии</button>
		<ul id="comments">
			
		</ul>
	</main>
</body>
</html>