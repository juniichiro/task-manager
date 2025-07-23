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
    echo "<h2>" . $note['notes_title'] . "</h2>";
    echo "<p>" . $note['notes_description'] . "</p>";
    echo "<a href='edit_notes.php?notes_id=" . $note['notes_id'] . "' class='btn btn-primary'>Edit</a>";
    echo "<a href='delete_notes.php?notes_id=" . $note['notes_id'] . "' class='btn btn-danger'>Delete</a>";
    echo "</div></div>";
} else {
    echo "<p>Note not found.</p>";
}
?>
