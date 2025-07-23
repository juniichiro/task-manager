<?php 
include "../../includes/header.php";
require "../../includes/dbconnection.php";

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] === FALSE) {
    header("Location: ../../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add" />
    <script src="../../assets/js/Functions.js"></script>
</head>

<body>
        <nav class="navbar">
        <a href="#" class="logo">Queue<span>pal</span></a>
        <div class="user-section">
            <a href="../auth/logout.php" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Logout <?php echo $username?>
            </a>
        </div>
    </nav>
    <div class="maincontainer">
        <div class="Topcontainer">
            <div class="tasktitle">
                <h1>Task List</h1>
            </div>
            </div>
        <div class="Middlecontainer">
            <div class="leftcontainer">
                <h2 class="header_Text">dashboard</h2>
                <hr></hr>
                <div><h1>Welcome, <?php echo $username?></h1></div>
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
