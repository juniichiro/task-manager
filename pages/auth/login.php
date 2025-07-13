<?php 
    session_start();
    include "/xampp/htdocs/task-manager/includes/header.php";
    require "/xampp/htdocs/task-manager/includes/dbconnection.php";



    if(isset($_SESSION['logged_in']) == TRUE){
        header("Location: #");
    }

?>  
    <link rel="stylesheet" href="auth.css">
    <div class="wrapper">
        <!-- LOGIN FORM -->
        <span class="icon-close">
            <a href="#"><ion-icon name="close-outline"></ion-icon></a>
        </span>

        <form action="login_submit.php" method = "POST" class="login-form" autocomplete="off">
            <h2>Login</h2>
            <div class="input-box">
                <input type="text" class="input-field" name="email" required>
                <label for="log-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" required>
                <label for="log-pass" class="label">Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="form-cols">
                <div class="col-1"></div>
                <div class="col-2"> 
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="input-box"></div>
                <button class="btn-submit" id="SignInBtn">Sign In <i class='bx bx-log-in'></i></button>
            </div>
            <div class="switch-form">
                <span>Don't have an account? <a href="registration.php" onclick="">Register</a></span>
            </div>
        </form>
    </div>

    
