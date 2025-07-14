<?php
    // Include database connection
    require "../../includes/dbconnection.php";

    // Sanitize and fetch POST inputs
    $username = $_POST['username'];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirmpassword = $_POST['password'];


    // Initialize errors array
    $errors = [];

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required";
    } 
    // check if the username is valid or not depending on lenght
    elseif (strlen($username) < 3 && strlen($username) > 10) {
        $errors[] = "Invalid username.";
    } 
    // check if username already exists
    else {
        // creating a prepared statement
        $sql = "SELECT user_id FROM accounts WHERE username = ?;";
        // preparing the prepared statement
        $stmt = mysqli_stmt_init($db);
        // checker if the statement failed 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL error";
        }
        // proceeds into using the actual prepared statements putting user inputs into the placeholders
        else {
            // bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $username);
            // run parameters inside the database
            mysqli_stmt_execute($stmt);
            // put the executed $stmt value into results variable
            $result = mysqli_stmt_get_result($stmt);
            // use value of num_rows returned to $results variable to check if username exists already or no 
            if ($result->num_rows > 0) {
                $errors[] = "Username is already taken";
            }
        }
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required";
    } 

    else {
        // creating a prepared statement
        $sql = "SELECT user_id FROM accounts WHERE email = ?;";
        // preparing the prepared statement
        $stmt = mysqli_stmt_init($db);
        // checker if the statement failed 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL error";
        }
        // proceeds into using the actual prepared statements putting user inputs into the placeholders
        else {
            // bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $email);
            // run parameters inside the database
            mysqli_stmt_execute($stmt);
            // put the executed $stmt value into results variable
            $result = mysqli_stmt_get_result($stmt);
            // use value of num_rows returned to $results variable to check if email is already used by an existing account or no 
            if ($result->num_rows > 0) {
                $errors[] = "Email is already linked to an account";
            }
        }
    }

    // Password validation
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
            location.href='registration.php';
        </script>";
        exit;
    }

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserting the account data into the accounts table after succesful verifications
    $sql = "INSERT INTO accounts (username, password, email) VALUES (? , ?, ?);";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"<script>
        alert('Registration failed. Please try again.');
        location.href = 'registration.php;
        </script>";
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
        mysqli_stmt_execute($stmt);
        header("Location: login.php");
    }
?>