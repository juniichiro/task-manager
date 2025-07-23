

<div class="mainboxtask_container">
    <div class='boxtasks_wrapper'>
    <?php while($result = $query->fetch_assoc()) { ?>

    <div class='boxcontainer' id='container_<?php echo $result['task_id']; ?>'>
        <div class="task_container">
        <button  class="buttontest1"id='taskbtn_<?php echo $result['task_id']; ?>' onclick='editTask(<?php echo $result['task_id']; ?>)'>
        <?php echo $result['task_name']; ?>
        </button>
        </div>

        <div class="boxnotescontainer">
            <?php include("Notesheadline.php")?>
        </div>
    </div>

    <?php } ?>
</div>

<div class='boxtask_container'>
    <a href='Add_task.php?insert_task=1' class='task'>
            <img src='../../assets/images/plusicon.png' alt='Add Icon' class='Plus_icon'>
            <span class='hyperlinktext'> Add Task</span></a>
    </div>
</div>

