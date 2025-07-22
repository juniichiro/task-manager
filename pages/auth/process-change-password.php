<?php
    require "../../includes/dbconnection.php";
    

    $errors = [];

    $password = $_POST["new-password"];
    $confirmpassword = $_POST['conf-new-password'];
    $token = $_POST["token"];
    $token_hash = hash("sha256", $token);

    $sql = "SELECT * FROM accounts where reset_token_hash = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $token_hash);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row === null) {
            die("token not found");
        }

        if (strtotime($row["reset_token_expires_at"]) <= time()) {
            die("token has expired");
    }
}
    
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }

    // Password match validation
    if ($password !== $confirmpassword) {
        $errors[] = "Passwords do not match";
    }

    // If terms and conditions are not agreed
    // pero may required naman na

    // If there are errors, redirect back with alert
    if (!empty($errors)) {
        echo "<script>
            alert('".implode("\\n", $errors)."');
            location.href='change-password.php?token=$token';
        </script>";
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE accounts SET password = ?, 
            reset_token_hash = NULL, 
            reset_token_expires_at = NULL
            WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        
        mysqli_stmt_bind_param($stmt, "ss", $password_hash, $row["user_id"]);
        mysqli_stmt_execute($stmt);
        echo"<script>
        alert('Password updated. You can now login');
        location.href = 'login.php';
        </script>";
        
    }

?>