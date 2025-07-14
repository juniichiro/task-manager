<?php
    require "includes/dbconnection.php";
    $id = $_GET['itid'];

    $query = $db->query("DELETE FROM noteslist WHERE list_id = $id");
    $query = $db->query("DELETE from tasklist Where list_ID = '$id'");
    header("Location: indexhome.php");
?>