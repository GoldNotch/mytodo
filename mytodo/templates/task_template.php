<li class='task'>
	<article class="task-info">
		<div class="task-header">
			<h2><?= $name ?></h2>
			<h2><?= $deadline ?>
		</div>
		<p><?= $description ?></p>
	</article>
	<form action="database_scripts/delete_task.php?id=<?= $id ?>" method="post">
		<input type="submit" value="Удалить">
	</form>
	
</li>