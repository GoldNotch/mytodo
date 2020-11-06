<?php 
	require_once 'SimpleTemplateEngine/loader.php';
	$url = $_SERVER['REQUEST_URI'];
	$query = parse_url($url, PHP_URL_QUERY);
	parse_str($query, $params);

	function render($params)
	{
		$env = new SimpleTemplateEngine\Environment('templates');
		$total_html = $env->render('about_task.php', ['id'=> $params['id'],
				   										'name' => $params['name'],
				   										'description' => $params['description'],
				   										'deadline' => $params['deadline'],
				   										'done' => $params['done'] == 'checked' ? 'Выполнена' : 'Не выполнена']);
		echo($total_html);
	}

	render($params);
?>