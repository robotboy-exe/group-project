<?php
session_start();

// If already logged in, redirect based on type
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_type'] === 'student') {
        header("Location: student-dashboard.php");
        exit();
    } elseif ($_SESSION['user_type'] === 'admin') {
        header("Location: admin-dashboard.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOGIN</title>
  <link rel="stylesheet" href="../public/css/styles.css" />
  <style>
    body {
      font-family:
        Inter,
        system-ui,
        -apple-system,
        "Segoe UI",
        Roboto,
        "Helvetica Neue",
        Arial;
      background-color: #f4f6f9;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      /* padding: 1rem; */
      box-sizing: border-box;
    }

    /* Card styling - matching the success page */
    #login-card {
      background: white;
      border-radius: 0.625rem;
      /* 10px */
      box-shadow: 0 0.625rem 1.875rem rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 32rem;
      /* slightly wider than success card for form */
      overflow: hidden;
      /* keeps children inside rounded corners */
    }

    #form-header {
      background: linear-gradient(to right,
          navy,
          rgb(6, 94, 94),
          rgb(24, 59, 24));
      text-align: center;
      padding: 0.75rem 2rem;
      /* vertical padding + aligns with body padding */
    }

    #form-header span {
      color: #fff;
      font-weight: 800;
      font-size: 1.2rem;
    }

    #form-body {
      padding: 1.5rem 2rem 2rem;
      /* top, sides, bottom */
    }

    .form-title {
      margin: 0 0 0.5rem 0;
      font-weight: 800;
      font-size: 1.9rem;
      text-align: left;
    }

    .desc {
      font-size: 0.9rem;
      margin: 0 0 1.5rem 0;
      color: #555;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
    }

    .field-group {
      display: flex;
      flex-direction: column;
    }

    .field-group label {
      font-weight: 600;
      font-size: 0.85rem;
      margin-bottom: 0.25rem;
      color: #333;
    }

    .field-group input,
    .field-group select {
      padding: 0.6rem 0.75rem;
      border: 1px solid #ccc;
      border-radius: 0.375rem;
      /* 6px */
      font-family: inherit;
      font-size: 0.95rem;
      width: 100%;
      box-sizing: border-box;
      background-color: #fff;
    }

    .field-group select {
      cursor: pointer;
    }

    form button[type="submit"] {
      padding: 0.7rem 1rem;
      margin-top: 0.5rem;
      font-size: 1.1rem;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(to right, navy, teal);
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      transition:
        background 0.3s ease,
        transform 0.1s ease;
      width: 100%;
    }

    form button[type="submit"]:hover {
      background: linear-gradient(to right, #000080, #008080);
    }
  </style>
</head>

<body>
  <div id="login-card">
    <div id="form-header">
      <span>EDUCATION</span><br />
      <span>MAYBACH ACADEMY</span>
    </div>
    <div id="form-body">
      <h1 class="form-title">LOGIN</h1>
      <p class="desc">Please fill in your credentials to login</p>

      <form action="../controllers/login_process.php" method="post">
        <div class="field-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="field-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="field-group">
          <label for="userType">User Type:</label>
          <select name="userType" id="userType" required>
            <option value="">Select User Type</option>
            <option value="student">Current Student</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <button type="submit">LOGIN</button>
      </form>

<?php
    if (isset($_SESSION['login_error'])) {
        echo '<p style="color:red; margin-top:10px;">'.$_SESSION['login_error'].'</p>';
        unset($_SESSION['login_error']); // clear after showing
    }
    ?>

    </div>
  </div>

  <?php require_once "../includes/footer.php"; ?>
  <script src="../public/js/app.js"></script>

</body>

</html>