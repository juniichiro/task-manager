<?php
require "../../includes/dbconnection.php";
$id = $_POST['task_ID'];
$List = $_POST['itask'];
$query = $db->query("UPDATE tasklist SET Task_Name = '$List' WHERE list_ID = '$id'");
header("Location: indexhome.php");
?>