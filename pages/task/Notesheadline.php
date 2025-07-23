<?php 
require "/xampp/htdocs/task-manager/includes/dbconnection.php";
$notesquery = $db->query("SELECT * FROM notes WHERE task_id = " . $result['task_id']);

if (isset($_GET['insert_notes']) && $_GET['task_id'] == $result['task_id']) { ?>
    <div class="box_choicecontainer">
        <form method="post" action="insert_notes.php">
            <input type="hidden" name="task_id" value="<?php echo $result['task_id']; ?>">

            <div class="inputheadline">
                <input type="text" name="note_title" placeholder="Enter note headline" required><br>
            </div>
            <div class="inputheadline">
                <textarea name="note_descrip" id="Notes_DescText"placeholder="Enter Description" required></textarea><br>
            </div>
            <div class="buttoncontainers">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
<?php
} else {
?>
<?php 
    while ($notes = $notesquery->fetch_assoc()) { 
?>
    
    <a class="Notes_headlinecontainer"href='view_notes.php?notes_id=<?php echo $notes['notes_id']; ?>'><div class="box_resultcontainer"><?php echo $notes['notes_title']; ?></div></a>
     
<?php } ?>
<div class="boxnotes_container">
         <a href='indexhome.php?insert_notes&task_id=<?php echo $result['task_id']; ?>' class='tasknotes'>
            Add Notes
        </a>
     </div>

<?php
}

?>
