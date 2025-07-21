<?php
ob_start();
ob_flush();
session_start();
session_destroy();
header("Location: login.php");

?>