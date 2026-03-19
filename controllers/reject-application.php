<?php
session_start();
require_once "../includes/admin-auth.php";
require_once "../includes/db.php";

// Check admin session
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: ../views/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['application_id'])) {

    $appId = $_POST['application_id'];

    // Update application status only if pending
    $stmt = $conn->prepare("UPDATE applications SET status='rejected' WHERE id=? AND status='pending'");
    $stmt->bind_param("i", $appId);

    if ($stmt->execute()) {
        // Redirect back to dashboard with a rejection message
        header("Location: ../views/admin-dashboard.php?msg=rejected");
        exit();
    } else {
        echo "Error rejecting application.";
    }

    $stmt->close();
}

$conn->close();
?>