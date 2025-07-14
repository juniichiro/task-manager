<?php
require "includes/dbconnection.php";

$list_notes= $_POST['inotes'];
$Notes_title = $_POST['Notes_title'];
$Notes_Description= $_POST['N_Desc'];

    $query = $db->query("INSERT into noteslist(list_id, Notes_title, Notes_Description) VALUES ('$list_notes', '$Notes_title', '$Notes_Description')");
    header("Location: indexhome.php");
?>