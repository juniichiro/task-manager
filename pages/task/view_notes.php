    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style_notes.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=image_arrow_up" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=close" />
        <body>
<?php
require "../../includes/dbconnection.php";
// Get notes_id from the URL
$note_id = isset($_GET['notes_id']) ? (int)$_GET['notes_id'] : 0;
// Run the query to get the notes
$notequery = $db->query("SELECT * FROM notes WHERE notes_id = $note_id");

if ($notequery && $notequery->num_rows > 0) {
    $note = $notequery->fetch_assoc();
    ?>

    <div class='Mainnotes_container'>
        <div class='boxcontainer'>
            <div class='boxnotes_header'>
                <h2><?php echo htmlspecialchars($note['notes_title']) ?></h2>
                <a href='indexhome.php' class='tasknotes'> 
                <span class='material-symbols-outlined'>close</span> </a>
            </div>
            <h3>Description</h3>
            <p><?php echo nl2br(htmlspecialchars($note['notes_description'])) ?> </p>
            <div class='buttons'>
                <a href="../../includes/file-upload.php?notes_id=" <?php echo $note['notes_id'] ?>>Upload File</a>
                <a href="edit_notes.php?notes_id="  <?php $note['notes_id'] ?> class="btn btn-primary">Edit</a>
                <a href="delete_notes.php?notes_id=" <?php $note['notes_id'] ?> class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>

<?php
} else {
    echo "<p>Note not found.</p>";
}
?>

</body>
</html>


