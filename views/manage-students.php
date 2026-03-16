<?php
session_start();
require_once "../includes/admin-auth.php"; // Ensures only admins
require_once "../includes/db.php";

// Fetch all students
$sql = "SELECT id, full_name, email, created_at FROM users WHERE user_type='student' ORDER BY created_at ASC";
$result = $conn->query($sql);

// Handle delete action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id=? AND user_type='student'");
    $stmt->bind_param("i", $deleteId);
    if ($stmt->execute()) {
        header("Location: manage-students.php"); // refresh page after deletion
        exit();
    } else {
        echo "Error deleting student.";
    }
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Students</title>
  <link rel="stylesheet" href="../public/css/styles.css">
  <style>
    body { font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; margin:0; background:#f4f6f9; }
    .dashboard { display:flex; min-height:100vh; }
    .sidebar { width:220px; background:#2c3e50; color:white; padding:20px; }
    .sidebar h2 { font-size:1.2rem; }
    .sidebar ul { list-style:none; padding:0; }
    .sidebar li { margin:15px 0; }
    .sidebar a { color:white; text-decoration:none; }
    .main-content { flex:1; padding:30px; background:#f4f6f9; }
    h1 { margin-bottom:1rem; }
    table { width:100%; border-collapse:collapse; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 5px 15px rgba(0,0,0,0.05); }
    th, td { padding:0.8rem 1rem; text-align:left; border-bottom:1px solid #ddd; }
    th { background:#2c3e50; color:white; }
    tr:hover { background:#f0f0f0; }
    .action-btn {
      padding:0.4rem 0.8rem;
      color:white;
      border:none;
      border-radius:5px;
      cursor:pointer;
      margin-right:5px;
    }
    .edit-btn { background: navy; }
    .edit-btn:hover { background: #000080; }
    .delete-btn { background: crimson; }
    .delete-btn:hover { background: darkred; }
  </style>
</head>
<body>

<div class="dashboard">

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2>Admin Portal</h2>
    <ul>
      <li><a href="admin-dashboard.php">Dashboard</a></li>
      <li><a href="manage-students.php">Manage Students</a></li>
      <li><a href="../controllers/logout.php">Logout</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <h1>Manage Students</h1>

    <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Date Registered</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $sn = 1; ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $sn++ ?></td>
          <td><?= htmlspecialchars($row['full_name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= date("d M Y", strtotime($row['created_at'])) ?></td>
          <td>
            <form action="edit-student.php" method="get" style="display:inline;">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button type="submit" class="action-btn edit-btn">Edit</button>
            </form>

            <form action="" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this student?');">
              <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
              <button type="submit" class="action-btn delete-btn">Delete</button>
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php else: ?>
      <p>No students found.</p>
    <?php endif; ?>

  </main>
</div>

<?php $conn->close(); ?>
</body>
</html>