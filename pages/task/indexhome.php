<?php include("includes/header.php");
require "includes/dbconnection.php";

$query = $db->query("SELECT * from tasklist");
$notesquery = $db->query("SELECT * from noteslist");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="assets/js/Functions.js"></script>
</head>
<body>
    <div class="maincontainer">
        <div class="boxmaincontainer">
        <div class="Topcontainer">
            <h1>Task List</h1>
        <div class="Middlecontainer">
            <?php include("Taskheadline.php")?>
        </div>

    </div>
</body>
</html>
