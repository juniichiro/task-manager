<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queuepal</title>
    <link rel="icon" type="image/x-icon" href="../../assets/images/flogo.png">
    <link rel="stylesheet" href="style_notes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=image_arrow_up" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=close" />
</head>
<body>

<?php
require "../../includes/dbconnection.php";

// Get notes_id from the URL
$note_id = isset($_GET['notes_id']) ? (int)$_GET['notes_id'] : 0;

// Run queries
$notequery = $db->query("SELECT * FROM notes WHERE notes_id = $note_id");
$upload    = $db->query("SELECT * FROM upload WHERE notes_id = $note_id");

if ($notequery && $notequery->num_rows > 0) {
    $note = $notequery->fetch_assoc();
    ?>
    <div class='Mainnotes_container'>
        <div class='boxcontainer'>
            <div class='boxnotes_header'>

                <?php
                if ($upload && $upload->num_rows > 0) {
                    $row = $upload->fetch_assoc();
                    echo '<img src="' . htmlspecialchars($row['file_path']) . '" class="image">';
                    echo '<form action="../../includes/delete_upload.php" method="POST" style="margin-top:10px;">
                        <input type="hidden" name="note_id" value="' . $note_id . '">
                        <button type="submit" class="btn btn-danger">Remove Image</button>
                    </form>';
                }
                ?>
                <h2><?php echo htmlspecialchars($note['notes_title']); ?></h2>
                <a href='indexhome.php' class='tasknotes'> 
                    <span class='material-symbols-outlined'>close</span> 
                </a>
            </div>

            <h3>Description</h3>
            <p><?php echo nl2br(htmlspecialchars($note['notes_description'])); ?></p>

            <div class='buttons'>
                <a href="<?php echo '../../includes/file-upload.php?notes_id=' . $note['notes_id']; ?>" class="btn btn-primary">Upload File</a>
                <a href="<?php echo 'edit_notes.php?notes_id=' . $note['notes_id']; ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo 'delete_notes.php?notes_id=' . $note['notes_id']; ?>" class="btn btn-danger">Delete</a>
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
