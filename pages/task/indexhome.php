<?php 
include "../../includes/header.php";
require "../../includes/dbconnection.php";

session_start();

if(isset($_SESSION['logged_in']) == FALSE){
        header("Location: ../../auth/login.php");
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

    $query = "SELECT * FROM task WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $user_id);
        mysqli_stmt_execute($stmt);
        $query = mysqli_stmt_get_result($stmt);
    }

// $query = $db->query("SELECT * from task WHERE user_id = $user_id");
// $notesquery = $db->query("SELECT * from notes WHERE user_id = $user_id");

    $notesquery = "SELECT * FROM notes WHERE $user_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $notesquery)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt); 
        $notesquery = mysqli_stmt_get_result($stmt);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="../../assets/js/Functions.js"></script>
</head>
<body>
    <div class="maincontainer">
        <div class="boxmaincontainer">
        <div class="Topcontainer">
            <div><h1>Welcome, <?php echo $username?></h1></div>
            <div class="tasktitle"><h1>Task List</h1></div>
            <div class="Logout">
            <a href="../auth/logout.php">Logout, <?php echo $username?></a>
            <div class="row">
        <div class="Middlecontainer">
            <?php include("Taskheadline.php")?>
        </div>  
        
    </div>
</body>
</html>
