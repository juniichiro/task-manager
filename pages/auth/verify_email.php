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
        <!-- VEFIFY EMAIL FORM -->
        <span class="icon-close">
            <a href="../front/front.html"><ion-icon name="close-outline"></ion-icon></a>
        </span>

        <form action="#" method = "POST" class="verify-form" autocomplete="off">
            <h2>Verify Email</h2>

            <div class="input-box">
                <input type="email" class="input-field" name="email" required>
                <label for="log-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
            </div>
            <div class="form-cols">
                <div class="col-1"></div>
                <div class="col-2"> 
                    <a href="../auth/login.php">Back to Login</a>
                </div>
            </div>

            <div class="input-box">
                <button class="btn-submit" id="VerifyEmailBtn"> Send Verification <i class='bx bx-check-shield'></i></button>
            </div>
            <div class="switch-form">
                <span>Don't have an account? <a href="registration.php" onclick="">Register</a></span>
            </div>
        </form>
    </div>

    
