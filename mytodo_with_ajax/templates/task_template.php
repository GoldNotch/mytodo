<li class='task' id='task_<?= $id ?>'>
	<article class="task-info">
		<div class="task-header">
			<h2><?= $name ?><input type="checkbox" onclick="update_done(<?= $id ?>)" <?= $done ?>></h2>
			<h2><?= $deadline ?>
		</div>
		<p><?= $description ?></p>
	</article>
	<form>
		<input type="submit" value="Подробнее" formmethod="post" formaction="about_task.php?id=<?= $id ?>&name=<?= $name ?>&description=<?= $description ?>&deadline=<?= $deadline ?>&done=<?= $done ?>">
		<input type="submit" value="Удалить" onclick="delete_task(<?= $id ?>)">
	</form>
	
</li>