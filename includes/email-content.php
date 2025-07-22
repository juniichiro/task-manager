<?php
return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Reset</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #EFEFEF;
      color: #333;
    }
    .email-container {
      width: 100%;
      background-color: #EFEFEF;
      padding: 40px 0;
      text-align: center;
    }
    .wrapper {
      max-width: 500px;
      background: #FFF;
      margin: 0 auto;
      border-radius: 15px;
      border: 1px solid #1e9fab;
      box-shadow: 0 8px 15px rgba(0,0,0,0.1);
      padding: 40px 30px;
    }
    h2 {
      color: #1e9fab;
      font-size: 24px;
      margin-bottom: 20px;
    }
    p {
      font-size: 15px;
      color: #555;
      line-height: 1.6;
      margin-bottom: 25px;
    }
    .btn-reset {
      display: inline-block;
      padding: 14px 28px;
      background-color: #1e9fab;
      color: black;
      text-decoration: none;
      font-weight: 500;
      border-radius: 30px;
      transition: 0.3s;
    }
    .btn-reset:hover {
      background-color: #188894;
    }
    .footer {
      margin-top: 30px;
      font-size: 13px;
      color: #999;
    }
  </style>
</head>
<body>

  <div class="email-container">
    <div class="wrapper">
      <h2>Password Reset Request</h2>
      <p>Hello,</p>
      <p>We received a request to reset your password for your account. Click the button below to create a new password:</p>
      
      <a href="http://localhost/task-manager/pages/auth/change-password.php?token={$token}" class="btn-reset">Reset Password</a>
      
      <p>If you didn’t request this, you can safely ignore this email. Your password will remain unchanged.</p>
      
      <div class="footer">
        &copy; 2025 Queuepal. All rights reserved.
      </div>
    </div>
  </div>
</body>
</html>
HTML;
