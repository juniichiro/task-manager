    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style_notes.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=close" />

<?php
require "../../includes/dbconnection.php";


// Get notes_id from the URL
$note_id = isset($_GET['notes_id']) ? (int)$_GET['notes_id'] : 0;

// Run the query to get the notes
$notequery = $db->query("SELECT * FROM notes WHERE notes_id = $note_id");

if ($notequery && $notequery->num_rows > 0) {
    $note = $notequery->fetch_assoc();


    
echo "<div class='Mainnotes_container'>";
echo "<div class='boxcontainer'>";
echo "<div class='boxnotes_header'>";
echo "<h2>" . htmlspecialchars($note['notes_title']) . "</h2>";
echo "<a href='indexhome.php' class='tasknotes'>";
echo "<span class='material-symbols-outlined'>close</span>";
echo "</a>";
echo "</div>";
echo "<h3>Description</h3>";
echo "<p>" . nl2br(htmlspecialchars($note['notes_description'])) . "</p>";
echo "<div class='buttons'> ";
echo "<a href='edit_notes.php?notes_id=" . $note['notes_id'] . "' class='btn btn-primary'>Edit</a>";
echo "<a href='delete_notes.php?notes_id=" . $note['notes_id'] . "' class='btn btn-danger'>Delete</a>";
echo "</div>";
echo "</div></div>";
} else {
    echo "<p>Note not found.</p>";
}
?>


