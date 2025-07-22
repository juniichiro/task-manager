<?php
require "../../includes/dbconnection.php";
$id = $_POST['task_ID'];
$task_name = $_POST['task_name'];

    $sql = "UPDATE task SET task_name = ? WHERE task_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $task_name, $id);
        mysqli_stmt_execute($stmt);
        header("Location:indexhome.php");
    }
?>