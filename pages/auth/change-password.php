<?php 
    include "../../includes/header.php";
    require "../../includes/dbconnection.php";

    $token = $_GET["token"];
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
            echo $token_hash;
            die("token not found");
        }

        if (strtotime($row["reset_token_expires_at"]) <= time()) {
            die("token has expired");
    }

}

?>  
    <link rel="stylesheet" href="auth.css">
    <div class="wrapper">
        <!-- CHANGE PASSWORD FORM -->
        <span class="icon-close">
            <a href="../front/front.html"><ion-icon name="close-outline"></ion-icon></a>
        </span>

        <form action="process-change-password.php" method = "POST" class="change-pass-form" autocomplete="off">
            <h2>Change Password</h2>

            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            
            <div class="input-box">
                <input type="password" class="input-field" name="new-password" required>
                <label for="log-pass" class="label">New Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="conf-new-password" required>
                <label for="log-pass" class="label">Confirm Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="form-cols">
                <div class="col-1"></div>
                <div class="col-2"> 
                    <a href="../auth/login.php">Back to Login</a>
                </div>
            </div>

            <div class="input-box">
                <button class="btn-submit" id="ChangePassBtn">Change Password <i class='bx bx-repost'></i></button>
            </div>
            <div class="switch-form">
                <span>Don't have an account? <a href="registration.php" onclick="">Register</a></span>
            </div>
        </form>
    </div>

    
