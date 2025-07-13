<?php
    // Include database connection
    require "includes/dbconnection.php";

    // Sanitize and fetch POST inputs
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmpassword = filter_input(INPUT_POST, "confPassword", FILTER_SANITIZE_SPECIAL_CHARS);

    // Initialize errors array
    $errors = [];

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters";
    } else {
        // Check if username already exists
        $stmt = $db->prepare("SELECT id FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = "Username is already taken";
        }
        $stmt->close();
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
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
            location.href='register.php';
        </script>";
        exit;
    }


    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statements to prevent SQL injection
    $stmt = $db->prepare("INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    if ($stmt->execute()) {
        // Registration successful, redirect to login
        header("Location: login.php");
        exit;
    } else {
        // Registration failed and show error to the user
        echo "<script>
            alert('Registration failed. Please try again.');
            location.href='register.php';
        </script>";
        exit;
    }
?>