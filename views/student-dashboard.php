<?php
session_start();

// Only allow logged-in students
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'student') {
    header("Location: ../views/login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Dashboard</title>
    <style>
      /* Base & reset */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family:
          Inter,
          system-ui,
          -apple-system,
          "Segoe UI",
          Roboto,
          "Helvetica Neue",
          Arial,
          sans-serif;
        background-color: #f4f6f9;
        color: #1e293b;
        line-height: 1.5;
      }

      /* Dashboard layout */
      .dashboard {
        display: flex;
        min-height: 100vh;
      }

      /* Sidebar */
      .sidebar {
        width: 260px;
        background: linear-gradient(180deg, #0a1929 0%, #0f2a3f 100%);
        color: #e0e7ff;
        padding: 2rem 1.5rem;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
      }

      .sidebar h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: white;
        letter-spacing: -0.02em;
        border-bottom: 2px solid #3b82f6;
        padding-bottom: 0.5rem;
      }

      .nav-links {
        list-style: none;
      }

      .nav-links li {
        margin: 0.5rem 0;
      }

      .nav-links a {
        display: block;
        padding: 0.75rem 1rem;
        color: #cbd5e1;
        text-decoration: none;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
      }

      .nav-links a:hover {
        background-color: #1e3a5f;
        color: white;
        transform: translateX(4px);
      }

      /* Menu toggle (mobile) */
      .menu-toggle {
        display: none;
        background: none;
        border: 2px solid #e0e7ff;
        color: white;
        font-size: 1.8rem;
        padding: 0.2rem 0.8rem;
        border-radius: 0.5rem;
        cursor: pointer;
        margin-bottom: 1rem;
        width: fit-content;
      }

      .menu-toggle:hover {
        background-color: #1e3a5f;
      }

      /* Main content */
      .main-content {
        flex: 1;
        padding: 2rem 2.5rem;
        background-color: #f8fafc;
      }

      .main-content h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #0a1929, #1e4b6e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      #studentName {
        color: #1e4b6e;
        -webkit-text-fill-color: initial; /* override gradient for the name */
        background: none;
        font-weight: 600;
      }

      /* Cards */
      .cards {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
      }

      .card {
        background: white;
        padding: 1.5rem 2rem;
        border-radius: 1rem;
        width: 220px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
        transition:
          transform 0.2s,
          box-shadow 0.2s;
        border-left: 4px solid #3b82f6;
      }

      .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
      }

      .card h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 0.75rem;
      }

      .card p {
        font-size: 1.1rem;
        font-weight: 500;
        color: #1e4b6e;
      }

      /* Notification */
      .notification {
        margin-top: 2rem;
        padding: 1rem 1.5rem;
        background: #fff8e7;
        border-left: 4px solid #f97316;
        border-radius: 0.75rem;
        font-weight: 500;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        display: flex;
        align-items: center;
        gap: 0.75rem;
      }

      .notification::before {
        content: "🔔";
        font-size: 1.4rem;
      }

      .hidden {
        display: none;
      }

      /* Blinking animation (subtle) */
      @keyframes blink {
        0% {
          opacity: 1;
        }
        50% {
          opacity: 0.6;
        }
        100% {
          opacity: 1;
        }
      }

      .blink {
        animation: blink 1.5s infinite;
      }

      /* Responsive */
      @media (max-width: 768px) {
        .dashboard {
          flex-direction: column;
        }

        .sidebar {
          width: 100%;
          padding: 1rem;
        }

        .sidebar h2 {
          margin-bottom: 1rem;
          display: inline-block;
          width: auto;
        }

        .menu-toggle {
          display: block;
          float: right;
          margin-top: -3rem; /* position near heading */
        }

        .nav-links {
          clear: both;
          display: none; /* hidden by default, can be toggled with JS */
        }

        .nav-links.show {
          display: block;
        }

        .main-content {
          padding: 1.5rem;
        }

        .cards {
          justify-content: center;
        }

        .card {
          width: 100%;
          max-width: 280px;
        }
      }

      @media (max-width: 480px) {
        .main-content h1 {
          font-size: 1.8rem;
        }

        .card {
          padding: 1.2rem;
        }

        .notification {
          padding: 0.75rem 1rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="dashboard">
      <!-- Sidebar -->
      <aside class="sidebar">
        <h2>Student Portal</h2>
        <button class="menu-toggle" id="menuToggle">☰</button>

        <ul class="nav-links" id="navLinks">
          <li><a href="dashboard.html">Dashboard</a></li>
          <li><a href="assignments.html">Assignments</a></li>
          <li><a href="materials.html">Materials</a></li>
          <li><a href="grades.html">Grades</a></li>
          <li><a href="profile.html">Profile</a></li>
          <li><a href="../controllers/logout.php">Logout</a></li>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="main-content">
        <h1>Welcome, <span id="studentName">Student</span> 👋</h1>

        <div class="cards">
          <div class="card">
            <h3>Assignments</h3>
            <p id="assignmentCount">0 Pending</p>
          </div>

          <div class="card">
            <h3>GPA</h3>
            <p id="gpa">0.0</p>
          </div>

          <div class="card">
            <h3>Status</h3>
            <p id="status">Inactive</p>
          </div>
        </div>

        <div class="notification hidden" id="notification">
          New Assignment Available!
        </div>
      </main>
    </div>

    <!-- Optional simple mobile menu toggle script -->
    <script>
      const toggle = document.getElementById("menuToggle");
      const nav = document.getElementById("navLinks");
      if (toggle && nav) {
        toggle.addEventListener("click", () => {
          nav.classList.toggle("show");
        });
      }
    </script>

    <!-- You can keep your dashboard.js reference if needed -->
    <script src="/public/js/dashboard.js"></script>
  </body>
</html>
