<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<!-- Заголовок. Статический -->
	<header>
		<h1>Вход</h1>
	</header>
	<!-- Основная часть. Заполняется сервером -->
	<main>
		<form action='database_scripts/autentificate.php' method='get'>
			<p class='center-paragraph'> Логин: <input type='text' maxlength="32" name='login'></p>
			<p class='center-paragraph'> Пароль:	<input type='password' maxlength="32" name='password'></p>
			<p class='center-paragraph'><input type='submit' name='submit' value='Войти'></p>
		</form>
		<p class='center-paragraph'>Нет аккаунта?<a href="registration.php">Зарегистрируйся</a></p>
	</main>
</body>
</html>