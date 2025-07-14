<?php
    if (isset($_GET['insert_task'])) {
?>
    <!-- form for entering taks name -->
    <div class='box_choicecontainer'>
        <form method='post' action='insert_task.php'>
            <div class='inputheadline'>
                <input type='text' id='listtask' name='task_name' placeholder='Enter Task name' required=""><br>
            </div>
            <!-- submit button for task name -->
            <div class='buttoncontainers'>
                <input type='submit' class='btn btn-success'>
            </div>
        </form>
    </div>

<?php
} 

else {
?>

<div class='boxtasks_wrapper'>
    <?php while($result = $query->fetch_assoc()) { ?>

    <div class='boxcontainer' id='container_<?php echo $result['task_id']; ?>'>
        <button type='button' id='taskbtn_<?php echo $result['task_id']; ?>' onclick='editTask(<?php echo $result['task_id']; ?>)'>
        <?php echo $result['task_name']; ?>
        </button>

        <div class="boxnotescontainer">
            <?php include("Notesheadline.php")?>
        </div>
    </div>

    <?php } ?>

</div>

<div class='boxtask_container'>
        <a href='indexhome.php?insert_task' class='task'>Add another Task</a>
</div>
<?php
    }
?>