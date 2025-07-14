<?php
require "includes/dbconnection.php";

$List= $_POST['itask'];

    $query = $db->query("INSERT into tasklist(Task_Name) VALUES ('$List')");
    header("Location: indexhome.php");
?>
