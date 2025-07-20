
let currentOpenId = null;
function editTask(taskId) {
    if (currentOpenId && currentOpenId !== taskId) {
        const prevContainer = document.getElementById('container_' + currentOpenId);
        prevContainer.innerHTML = prevContainer.dataset.originalHtml;
    }
    const container = document.getElementById('container_' + taskId);
    container.dataset.originalHtml = container.innerHTML;
    const currentText = document.getElementById('taskbtn_' + taskId).innerText;
    container.innerHTML = `
    <form method='post' action='update.php'>
        <textarea name='task_name' rows='2' cols='30'>${currentText}</textarea>
        <input type='hidden' name='task_ID' value='${taskId}'><br>
        <button type='submit' class='btn btn-success'>Save</button>
        <a href='delete_task.php?itid=${taskId}' class='btn btn-danger'>
            <span class='glyphicon glyphicon-trash'></span> DELETE
        </a>
    </form>
`;
    currentOpenId = taskId;
}

console.log("Functions.js loaded");
