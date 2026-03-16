<?php
require_once "../includes/admin-auth.php";
require_once "../includes/db.php";

// Only allow admins
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch pending applications
$sql = "SELECT id, full_name, email, program, registration_date FROM applications WHERE status = 'pending' ORDER BY registration_date ASC";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../public/css/styles.css">
  <style>
    body {
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      margin: 0;
      background: #f4f6f9;
    }
    .dashboard {
      display: flex;
      min-height: 100vh;
    }
    .sidebar {
      width: 220px;
      background: #2c3e50;
      color: white;
      padding: 20px;
    }
    .sidebar h2 { font-size: 1.2rem; }
    .sidebar ul { list-style: none; padding: 0; }
    .sidebar li { margin: 15px 0; }
    .sidebar a { color: white; text-decoration: none; }
    .main-content {
      flex: 1;
      padding: 30px;
      background: #f4f6f9;
    }
    h1 { margin-bottom: 1rem; }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 0.8rem 1rem;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th { background: #2c3e50; color: white; }
    tr:hover { background: #f0f0f0; }

    .action-form{
  margin-bottom:10px;
}

.approve-btn,
.reject-btn{
  width:110px;
  padding:6px 10px;
  font-size:14px;
  border:none;
  border-radius:6px;
  cursor:pointer;
  color:white;
  font-weight:500;
  transition:0.2s ease;
}

.approve-btn{
  background:linear-gradient(to right,#1e7e34,#28a745);
}

.approve-btn:hover{
  transform:scale(1.05);
  background:#218838;
}

.reject-btn{
  background:linear-gradient(to right,#c82333,#dc3545);
}

.reject-btn:hover{
  transform:scale(1.05);
  background:#bd2130;
}
  </style>
</head>
<body>

<div class="dashboard">

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2>Admin Portal</h2>
    <ul>
      <li><a href="admin-dashboard.php">Dashboard</a></li>
      <li><a href="../controllers/logout.php">Logout</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <h1>Pending Applications</h1>

    <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Program</th>
          <th>Date Registered</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
<?php $sn = 1; ?>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $sn++ ?></td>
  <td><?= htmlspecialchars($row['full_name']) ?></td>
  <td><?= htmlspecialchars($row['email']) ?></td>
  <td><?= htmlspecialchars($row['program']) ?></td>
  <td><?= date("d M Y", strtotime($row['registration_date'])) ?></td>
  <td>

<form action="../controllers/approve-application.php" method="post" class="action-form">
<input type="hidden" name="application_id" value="<?= $row['id'] ?>">
<button type="submit" class="approve-btn" onclick="return confirm('Approve this application?')">
✔ Approve
</button>
</form>

<form action="../controllers/reject-application.php" method="post" class="action-form">
<input type="hidden" name="application_id" value="<?= $row['id'] ?>">
<button type="submit" class="reject-btn" onclick="return confirm('Reject this application?')">
✖ Reject
</button>
</form>

</td>
<?php endwhile; ?>
</tbody>
    </table>
    <?php else: ?>
      <p>No pending applications at the moment.</p>
    <?php endif; ?>

  </main>
</div>

</body>
</html>

<?php $conn->close(); ?>