<?php 
    session_start();
    include "../../includes/header.php";
    require "../../includes/dbconnection.php";

    if(isset($_SESSION['logged_in']) == TRUE){
        header("Location: ../task/indexhome.php");
    }

?>  
    <link rel="stylesheet" href="auth.css">
    <div class="wrapper">
        <!-- CHANGE PASSWORD FORM -->
        <span class="icon-close">
            <a href="../front/front.html"><ion-icon name="close-outline"></ion-icon></a>
        </span>

        <form action="#" method = "POST" class="change-pass-form" autocomplete="off">
            <h2>Change Password</h2>
            
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

    
