<?php
session_start();
require_once "../includes/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE email = ? AND user_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $userType);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {

            // Check if student is approved (if user type is student)
            if ($userType === 'student') {
                $appCheck = "SELECT status FROM applications WHERE email = ?";
                $stmtApp = $conn->prepare($appCheck);
                $stmtApp->bind_param("s", $email);
                $stmtApp->execute();
                $resApp = $stmtApp->get_result();

                if ($resApp->num_rows === 1) {
                    $app = $resApp->fetch_assoc();
                    if ($app['status'] !== 'approved') {
                        $_SESSION['login_error'] = "Your application is still pending approval.";
                        header("Location: ../views/login.php");
                        exit();
                    }
                }
            }

            // Login success: set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['full_name'] = $user['full_name'];

            // Redirect based on user type
            if ($user['user_type'] === 'admin') {
                header("Location: ../views/admin-dashboard.php");
            } else {
                header("Location: ../views/student-dashboard.php");
            }
            exit();

        } else {
            // Wrong password
            $_SESSION['login_error'] = "Incorrect password.";
            header("Location: ../views/login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['login_error'] = "User not found.";
        header("Location: ../views/login.php");
        exit();
    }
}
?>