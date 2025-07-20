<?php
    require "/xampp/htdocs/task-manager/includes/dbconnection.php";
    $note_id = $_GET['notes_id']; 
    $query = $db->query("DELETE FROM notes WHERE notes_id = $note_id");
    header("Location: indexhome.php");
    ?>