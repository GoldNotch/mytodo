 
function send_GET(url, query, on_completed)
{
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        	on_completed(JSON.parse(xmlhttp.response.slice(1)));
      }
    };
    xmlhttp.open("GET", url + '?' + query , true);
    xmlhttp.send();
}
 

function delete_task(task_id)
{
	function on_delete(response)
	{
		const deleting_item = document.getElementById("task_" + task_id);
		deleting_item.parentElement.removeChild(deleting_item);
	}
	send_GET("database_scripts/delete_task.php", "id=" + task_id, on_delete);
}

function update_done(task_id)
{
	function on_update(response)
	{

	}
	send_GET("database_scripts/update_done.php", "id=" + task_id, on_update);
}

function load_comments(task_id)
{
	function on_load(comments)
	{
		const comments_html = document.getElementById('comments');
		comments_html.innerHTML = '';
		Object.keys(comments).forEach(key => {
			const comment_li = document.createElement("li");
			comment_li.innerText = comments[key].text;
			comments_html.appendChild(comment_li);
		});
	}
	send_GET("database_scripts/load_comments.php", "id=" + task_id, on_load);
}