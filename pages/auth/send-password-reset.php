<?php
session_start();
require "../../includes/dbconnection.php";

if(isset($_SESSION['logged_in']) == TRUE){
        header("Location: ../task/indexhome.php");
}

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$token_expiry = date("Y-m-d H:i:s", time() + 60 * 5);

    $sql = "UPDATE accounts SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo"SQL Error";
    }
    else {
        mysqli_stmt_bind_param($stmt, "sss", $token_hash, $token_expiry, $email);
        mysqli_stmt_execute($stmt);

        if ($db->affected_rows) {
            $mail = require "../../includes/mailer.php"; 
            $mail->setFrom("queuepality@gmail.com", "Queuepal");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = include "../../includes/email-content.php";
            
            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
            }
        }
        echo"<script>
        alert('Message sent, please check your inbox.');
        location.href = '../front/front.php';
        </script>";
    }
?>