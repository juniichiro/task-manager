<?php 
require "../../includes/dbconnection.php";


// Get notes_id from the URL
$note_id = isset($_GET['notes_id']) ? (int)$_GET['notes_id'] : 0;

// Run the query to get the notes
$notequery = $db->query("SELECT * FROM notes WHERE notes_id = $note_id");
?>

<div class="box_choicecontainer">
    <!-- Code will run if query found a result -->
<?php if ($notequery && $notequery->num_rows > 0) {
    $note = $notequery->fetch_assoc(); ?>
    <form method="post" action="update_notes.php">
        <input type="hidden" name="notes_id" value="<?php echo $note['notes_id']; ?>">

        <div class="inputheadline">
            <input type="text" name="notes_title" value="<?php echo $note['notes_title']; ?>" required><br>
        </div>
        <div class="inputheadline">
            <input type="text" name="notes_description" value="<?php echo $note['notes_description']; ?>" required><br>
        </div>
        <div class="buttoncontainers">
            <input type="submit" class="btn btn-success" value="Update Note">
        </div>
    </form>
    <?php
} else {
    echo "<p>Note not found.</p>";
} ?>
</div>

