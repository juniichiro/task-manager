<?php
    require "../../includes/dbconnection.php";
    $id = $_GET['itid'];

    $sql = "DELETE FROM notes WHERE notes_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);

        $sql = "DELETE FROM task WHERE task_id = ?;";
        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo"SQL Error";
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt); 
        }
        header("Location:indexhome.php");
    }



    // $query = $db->query("DELETE FROM notes WHERE notes_id = $id");
    // $query = $db->query("DELETE from task Where task_id = $id");
    // header("Location: indexhome.php");
?>