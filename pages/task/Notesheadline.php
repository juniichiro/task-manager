<?php 
$notesquery = $db->query("SELECT * FROM noteslist WHERE list_id = " . $result['list_ID']);
if (isset($_GET['insert_notes']) && $_GET['list_id'] == $result['list_ID']) { ?>
    <div class="box_choicecontainer">
        <form method="post" action="insert_notes.php">
            <input type="hidden" name="inotes" value="<?php echo $result['list_ID']; ?>">

            <div class="inputheadline">
                <input type="text" name="Notes_title" placeholder="Enter note headline" required><br>
            </div>
            <div class="inputheadline">
                <input type="text" name="N_Desc" placeholder="Enter Description" required><br>
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
while($notes = $notesquery->fetch_assoc()) { 
?>
    
     <a href='view_notes.php?list_id<?php echo $result['list_ID'];?>'><div class="boxcontainer"><?php echo $notes['Notes_title']; ?></div></a>
     
<?php } ?>
<div class="boxtask_container">
         <a href='indexhome.php?insert_notes&list_id=<?php echo $result['list_ID']; ?>' class='task'>Add Notes</a>
     </div>

<?php
}

?>
