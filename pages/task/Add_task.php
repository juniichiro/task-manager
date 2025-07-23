<?php
require "/xampp/htdocs/task-manager/includes/dbconnection.php";
if (isset($_GET['insert_task'])) {
?>
    <!-- form for entering task name -->
    <div class='box_choicecontainer'>
        <form method='post' action='insert_task.php'>
            <div class='inputheadline'>
                <input type='text' id='listtask' name='task_name' placeholder='Enter Task name' required=""><br>
            </div>
            <div class='buttoncontainers'>
                <input type='submit' class='btn btn-success'>
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
