<?php
    require "../../includes/dbconnection.php";
    $note_id = $_GET['notes_id']; 

    $sql = "DELETE FROM notes WHERE notes_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $note_id);
        mysqli_stmt_execute($stmt);
        header("Location:indexhome.php");
    }

    // $query = $db->query("DELETE FROM notes WHERE notes_id = $note_id");
    // header("Location: indexhome.php");
    ?>