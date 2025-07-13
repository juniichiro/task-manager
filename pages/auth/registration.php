<?php 
    session_start();
    include("includes/header.php");
    require "includes/dbconnection.php";



    if(isset($_SESSION['logged_in']) == TRUE){
        header("Location:#");
    }

?>
    <link rel="stylesheet" href="auth.css">
    <div class="wrapper">
        <span class="icon-close">
                <a href="blank.html"><ion-icon name="close-outline"></ion-icon></a>  
        </span>
        <form action="#" class="registration-form" autocomplete="off">
            <h2>Register</h2>
                <div class="input-box">
                    <input type="text" class="input-field" name="username" required>
                    <label for="reg-name" class="label">Username</label>
                    <i class='bx bx-user icon'></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" name="email" required>
                    <label for="reg-email" class="label">Email</label>
                    <i class='bx bx-envelope icon'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" name="password" required autocomplete="off">
                    <label for="reg-pass" class="label">Password</label>
                    <i class='bx bx-lock-alt icon'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" name="confPassword" required autocomplete="off">
                    <label for="conf-pass" class="label">Confirm Password</label>
                    <i class='bx bx-lock-alt icon'></i>
                </div>
                <div class="form-cols">
                    <div class="col-1">
                        <input type="checkbox" name="agree" id="agree" required>
                        <label for="agree"> I agree to terms & conditions</label>
                    </div>
                </div>
                <div class="input-box">
                    <button class="btn-submit" name="signUpBtn">Sign Up <i class='bx bx-user-plus'></i></button>
                </div>
                <div class="switch-form">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>
        </form>
    </div>
    </div>
