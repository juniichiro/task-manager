
 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style_addtask.css">
<?php
require "/xampp/htdocs/task-manager/includes/dbconnection.php";
if (isset($_GET['insert_task'])) {
?>
    <!-- form for entering task name -->
    <div class='box_choicecontainer'>
        <form method='post' action='insert_task.php'>
            <div class='inputheadline'>
                <h2>Add a new Task</h2>
                <textarea id='listtask' contenteditable="true" name='task_name' placeholder='Enter Task name' required=""></textarea><br>
            </div>
            <div class='buttoncontainers'>
                <input type='submit' id="button_add" value="Add Task">
                <div class="buttongoback">
                <a href='indexhome.php' class='escbuttn'>Go back</a>
            </div>
            </div>
        </form>
    </div>
<?php
} else {
?>
    <p>No task insertion selected.</p>
<?php
}
?>
