<?php
require "../../includes/dbconnection.php";
session_start();

$list= $_POST['task_name'];
$user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO task(task_name, user_id) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($db);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    }

    else {
        mysqli_stmt_bind_param($stmt, "ss", $list, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        header("Location: indexhome.php");
    }


    // $query = $db->query("INSERT into task(task_Name) VALUES ('$list')");
    // header("Location: indexhome.php");
?>
