<?php
require "/xampp/htdocs/task-manager/includes/dbconnection.php";

$task_id = $_POST['task_id'];
$note_title = filter_input (INPUT_POST, "note_title", 
                           FILTER_SANITIZE_SPECIAL_CHARS);
$note_desc= filter_input (INPUT_POST, "note_title", 
                           FILTER_SANITIZE_SPECIAL_CHARS);

    // prepared statement
    $sql = "INSERT INTO notes (task_id, notes_title, notes_description) VALUES (?, ?, ?);";
    // prepping prepared statement
    $stmt = mysqli_stmt_init($db);
    // checker if prepared statement failed
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    }

    else {
        // binds values into placeholders
        mysqli_stmt_bind_param($stmt, "sss", $task_id, $note_title, $note_desc);
        // execute prepared statement
        mysqli_stmt_execute($stmt);
        // put into $result variable the result of executed prepared statement
        $result = mysqli_stmt_get_result($stmt);
        header("Location: indexhome.php");
    }

    // $query = $db->query("INSERT into noteslist(task_id, notes_title, notes_description) VALUES ('$list_notes', '$Notes_title', '$Notes_Description')");
    // header("Location: indexhome.php");
?>