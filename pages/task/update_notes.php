<?php
require "../../includes/dbconnection.php";

$note_title = filter_input(INPUT_POST, 'notes_title', FILTER_SANITIZE_SPECIAL_CHARS);
$note_descrip = filter_input(INPUT_POST, 'notes_description', FILTER_SANITIZE_SPECIAL_CHARS);
$note_id = $_POST['notes_id']; 

    $sql = "UPDATE notes SET notes_title = ?, notes_description = ? WHERE notes_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $note_title, $note_descrip, $note_id);
        mysqli_stmt_execute($stmt);
        header("Location:indexhome.php");
    }


// $notesquery = $db->query("UPDATE notes SET notes_title = 
// '$note_title', notes_description = '$note_descrip' WHERE notes_id = '$note_id'");
// header("Location: indexhome.php");
?>