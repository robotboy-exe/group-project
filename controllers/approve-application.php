<?php
session_start();
require_once "../includes/admin-auth.php"; // ensures only admins can access
require_once "../includes/db.php";

// Check admin session explicitly (extra safety)
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../views/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['application_id'])) {

    $appId = $_POST['application_id'];

    // Fetch the application details
    $stmt = $conn->prepare("SELECT full_name, email, password, status FROM applications WHERE id = ?");
    $stmt->bind_param("i", $appId);
    $stmt->execute();
    $result = $stmt->get_result();
    $app = $result->fetch_assoc();

    if (!$app) {
        echo "Application not found.";
        exit();
    }

    // Prevent re-processing
    if ($app['status'] !== 'pending') {
        echo "This application has already been processed.";
        exit();
    }

    // Check if a student account already exists with this email
    $checkUser = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkUser->bind_param("s", $app['email']);
    $checkUser->execute();
    $userResult = $checkUser->get_result();

    if ($userResult->num_rows > 0) {
        echo "A student account with this email already exists.";
        exit();
    }

    // ✅ Update application status to 'approved'
    $updateStmt = $conn->prepare("UPDATE applications SET status = 'approved' WHERE id = ?");
    $updateStmt->bind_param("i", $appId);
    $updateStmt->execute();
    $updateStmt->close();

    // ✅ Create student login account
    $insertStmt = $conn->prepare("INSERT INTO users (full_name, email, password, user_type) VALUES (?, ?, ?, 'student')");
    $insertStmt->bind_param("sss", $app['full_name'], $app['email'], $app['password']);
    $insertStmt->execute();
    $insertStmt->close();

    // Redirect back with success message
    header("Location: ../views/admin-dashboard.php?msg=approved");
    exit();
}

$conn->close();
?>