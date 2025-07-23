<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style_notes.css">


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
                <h2>Title</h2>
                <input type="text" name="notes_title" value="<?php echo htmlspecialchars($note['notes_title']); ?>" required><br>
            </div>
            <div class="inputheadline">
                <h2>Description</h2>
               <textarea name="notes_description" rows="4" required><?php echo htmlspecialchars($note['notes_description']); ?></textarea><br>
            </div>
            <div class="buttoncontainers">
                <input type="submit" class="button_update" value="Update Notes">
            </div>
        </form>
    <?php
    } else {
        echo "<p>Note not found.</p>";
    } ?>
</div>


