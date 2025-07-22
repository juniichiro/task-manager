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
    <link rel="stylesheet" href="style.css">
    <script src="../../assets/js/Functions.js"></script>
</head>
<body>
    <div class="maincontainer">
        <div class="boxmaincontainer">
        <div class="Topcontainer">
            <h1>Task List</h1>
        <div class="Middlecontainer">
            <?php include("Taskheadline.php")?>
        </div>  
        <div class="container-fluid">
        <a href="../auth/logout.php">Logout</a>
        <div class="row">
    </div>
</body>
</html>
