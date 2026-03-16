<?php
require_once "../includes/admin-auth.php";
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../public/css/styles.css">
  <style>
    body { font-family: Arial, sans-serif; background:#f4f6f9; margin:0; }
    .dashboard { display:flex; min-height:100vh; }
    .sidebar { width:220px; background:#2c3e50; color:white; padding:20px; }
    .sidebar a { color:white; text-decoration:none; display:block; margin:10px 0; }
    .main { flex:1; padding:30px; }
    .card { background:#fff; padding:20px; margin-bottom:20px; border-radius:8px; box-shadow:0 3px 8px rgba(0,0,0,0.1);}
    .card a { text-decoration:none; color:#2c3e50; font-weight:bold; }
  </style>
</head>
<body>
<div class="dashboard">
  <aside class="sidebar">
    <h2>Admin Portal</h2>
    <a href="admin-dashboard.php">Dashboard</a>
    <a href="manage-students.php">Manage Students</a>
    <a href="manage-admissions.php">Manage Admissions</a>
    <a href="assign-work.php">Assign Work</a>
    <a href="website-settings.php">Website Settings</a>
    <a href="../controllers/logout.php">Logout</a>
  </aside>
  <main class="main">
    <h1>Admin Dashboard</h1>
    <div class="card">
      <a href="manage-students.php">Manage Students</a>
    </div>
    <div class="card">
      <a href="manage-admissions.php">Manage Admissions</a>
    </div>
    <div class="card">
      <a href="assign-work.php">Assign Work</a>
    </div>
    <div class="card">
      <a href="website-settings.php">Website Settings</a>
    </div>
  </main>
</div>
</body>
</html>