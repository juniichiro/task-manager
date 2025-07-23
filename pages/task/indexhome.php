<?php 
include "../../includes/header.php";
require "../../includes/dbconnection.php";

session_start();

if(isset($_SESSION['logged_in']) == FALSE){
        header("Location: ../../auth/login.php");
}

$user_id = $_SESSION['user_id'];
$query = $db->query("SELECT * from task WHERE user_id = $user_id");
$notesquery = $db->query("SELECT * from notes WHERE user_id = $user_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_task.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add" />
    <script src="../../assets/js/Functions.js"></script>
</head>
<body>
    <div class="maincontainer">
        <div class="Topcontainer">
            <div class="tasktitle">
                <h1>Task List</h1>
            </div>
                <div class="Logout">
                <a href="../auth/logout.php">Logout</a>
                </div>
            </div>
        <div class="Middlecontainer">
            <div class="leftcontainer">
                <h2 class="header_Text">dashboard</h2>
                <hr></hr>
                <p>test1</p>
                <p>test1</p>
                <p>test1</p>
                <p>test1</p>
                <p>test1</p>
                <p>test1</p>
            </div>
            <div class="rightcontainer">
                <?php include("Taskheadline.php")?>
            </div>
        </div>  
</div>
</body>
</html>
