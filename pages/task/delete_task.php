<?php
    require "../../includes/dbconnection.php";
    $id = $_GET['itid'];

    $query = $db->query("DELETE FROM notes WHERE notes_id = $id");
    $query = $db->query("DELETE from task Where task_id = '$id'");
    header("Location: indexhome.php");
?>