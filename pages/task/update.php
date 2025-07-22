<?php
require "../../includes/dbconnection.php";
$id = $_POST['task_ID'];
$task_name = $_POST['task_name'];

$query = $db->query("UPDATE task SET task_name = '$task_name' WHERE task_id = '$id'");
header("Location: indexhome.php");
?>