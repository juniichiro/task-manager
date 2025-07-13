<?php
// session_start();
require "/xampp/htdocs/task-manager/includes/dbconnection.php";

$email = $_POST["email"];
$password = $_POST["password"];



$stmt = $db->prepare("SELECT * FROM accounts WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$query = $stmt->get_result();

$isFetched = $query->num_rows;

if($isFetched > 0){

    $_SESSION['logged_in'] = true;
    header("Location: items.php");
}else{
    echo "<script>
            alert('Incorrect username or password');
            location.href='login.php';
    </script>";
}

?>