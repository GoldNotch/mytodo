<!DOCTYPE html>
<html>
<head>
	<title>Регистрация пользователя</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<!-- Заголовок. Статический -->
	<header>
		<h1>Регистрация пользователя</h1>
	</header>
	<!-- Основная часть. Заполняется сервером -->
	<main>
		<form action='database_scripts/register_user.php' method='post'>
			<p class='center-paragraph'>Логин: <input type='text' maxlength="32" name='login'></p>
			<p class='center-paragraph'>Пароль: <input type='password' maxlength="32" name='password'></p>
			<p class='center-paragraph'>Подтверждение пароля: <input type='password' maxlength="32" name='password_confirm'></p>
			<p class='center-paragraph'><input type='submit' name='submit' value='Зарегистрироваться'></p>
		</form>
		<p class='center-paragraph'>Есть аккаунт? <a href="index.php">Войди</a></p>
	</main>
</body>
</html>