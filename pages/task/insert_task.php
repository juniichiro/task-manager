<?php
require "/xampp/htdocs/task-manager/includes/dbconnection.php";

$list= $_POST['task_name'];

    $sql = "INSERT INTO task(task_name) VALUES (?);";
    $stmt = mysqli_stmt_init($db);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    }

    else {
        mysqli_stmt_bind_param($stmt, "s", $list);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        header("Location: indexhome.php");
    }


    // $query = $db->query("INSERT into task(task_Name) VALUES ('$list')");
    // header("Location: indexhome.php");
?>
