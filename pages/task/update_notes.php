<?php
require "/xampp/htdocs/task-manager/includes/dbconnection.php";
$note_title = $_POST['notes_title'];
$note_descrip = $_POST['notes_description'];
$note_id = $_POST['notes_id']; 

$notesquery = $db->query("UPDATE notes SET notes_title = '$note_title', notes_description = '$note_descrip' WHERE notes_id = '$note_id'");
header("Location: indexhome.php");
?>