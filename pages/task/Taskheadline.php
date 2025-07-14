            <?php
            if (isset($_GET['insert_task'])) {
                ?>
                <div class='box_choicecontainer'>
                    
                    <form method='post' action='insert_task.php'>
                        <div class='inputheadline'>
                            <input type='text' id='listtask' name='itask' placeholder='Enter Task name' required=""><br>
                        </div>
                        <div class='buttoncontainers'>
                            <input type='submit' class='btn btn-success'>
                        </div>
                    </form>
                </div>
                <?php
            } else {
                ?>
                <div class='boxtasks_wrapper'>
                    <?php while($result = $query->fetch_assoc()) { ?>
                        <div class='boxcontainer' id='container_<?php echo $result['list_ID']; ?>'>
                            <button type='button' id='taskbtn_<?php echo $result['list_ID']; ?>' onclick='editTask(<?php echo $result['list_ID']; ?>)'>
                                <?php echo $result['Task_Name']; ?>
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