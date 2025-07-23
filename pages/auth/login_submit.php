<?php
require "../../includes/dbconnection.php";

session_start();
$email = $_POST["email"];
$password = $_POST["password"];


// creating a prepared statement
$sql = "SELECT * FROM accounts WHERE username = ? OR email = ?;";
// preparing the prepared statement
$stmt = mysqli_stmt_init($db);
// checker if the statement failed 
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL error";
}
// proceeds into using the actual prepared statements putting user inputs into the placeholders
else {
    // bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "ss", $email, $email);
    // run parameters inside the database
    mysqli_stmt_execute($stmt);
    // put the executed $stmt value into results variable
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['password']);

        if ($pwdCheck == false) {
            echo "<script>
            alert('Incorrect username or password');
            location.href='login.php';
            </script>";

        }
        else if ($pwdCheck == true) {
            $_SESSION['logged_in'] = TRUE;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            echo "<script>
            location.href='../task/indexhome.php';
            </script>";
        }
        else {
            echo "<script>
            alert('Incorrect username or password');
            location.href='login.php';
            </script>";
        }
    }
    else {
        echo "No user";
    }
}

?>