<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADMISSION FORM PAGE</title>
  <link rel="stylesheet" href="../public/css/styles.css" />
  <style>
    body {
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background-color: #f4f6f9;
      display: flex;
      flex-direction: column;
      /* stack children vertically */
      min-height: 100vh;
      /* full viewport height */
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* All your existing fieldset, form-row, etc. styles remain unchanged below */
    #register-card {
      background: white;
      border-radius: 0.625rem;
      /* 10px */
      box-shadow: 0 0.625rem 1.875rem rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 60rem;
      /* narrower than before */
      margin: auto;
      /* centers the card vertically & horizontally */
      overflow: hidden;
    }

    #form-header {
      background: linear-gradient(to right, navy, rgb(6, 94, 94), rgb(24, 59, 24));
      text-align: center;
      padding: 0.75rem 2rem;
    }

    #form-header span {
      color: #fff;
      font-weight: 800;
      font-size: 1.2rem;
    }

    #form-body {
      padding: 1.5rem 2rem 2.5rem;
    }

    .form-title {
      margin: 0 0 0.5rem 0;
      font-size: 2rem;
      font-weight: 800;
      margin-bottom: 1rem;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 1.5rem;
      gap: 1rem;
    }

    .desc {
      font-size: 0.9rem;
      color: #555;
      margin: 0;
      max-width: 60%;
    }

    .dor {
      display: flex;
      flex-direction: column;
      min-width: 180px;
    }

    .dor label {
      font-size: 0.8rem;
      font-weight: 600;
      margin-bottom: 0.2rem;
    }

    input[type="date"] {
      border: 1px solid #ccc;
      border-radius: 0.375rem;
      padding: 0.4rem 0.75rem;
      font-family: inherit;
      font-size: 0.9rem;
      background-color: #fff;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    fieldset {
      display: grid;
      grid-template-columns: auto 1fr auto 1fr;
      gap: 1rem 1.5rem;
      /* reduced gap to fit narrower width */
      border: 0;
      padding: 0;
      margin: 0;
      width: 100%;
      align-items: center;
    }

    legend {
      display: block;
      padding: 0;
      margin-bottom: 1rem;
      border: 0;
      font-weight: 600;
      font-size: 1.1rem;
      position: relative;
      /* for pseudo-element positioning */
      padding-bottom: 0.3em;
      /* space between text and underline */
      grid-column: 1 / -1;
    }

    legend::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      /* full width of the legend container */
      height: 2px;
      /* thickness of the underline */
      background-color: currentColor;
      /* matches text color */
    }

    .field-group {
      display: contents;
    }

    .field-group.full label {
      grid-column: 1;
    }

    .field-group.full input {
      grid-column: 2 / -1;
    }

    .field-group label {
      font-size: 0.8rem;
      font-weight: 500;
      color: #333;
      white-space: nowrap;
    }

    .field-group input,
    .field-group select {
      padding: 0.5rem 0.75rem;
      border: 1px solid #ccc;
      border-radius: 0.375rem;
      font-family: inherit;
      font-size: 0.9rem;
      width: 100%;
      box-sizing: border-box;
    }

    .field-group select {
      background-color: white;
      cursor: pointer;
    }

    /* Radio group styling */
    .radio-group {
      display: flex;
      gap: 1rem;
      align-items: center;
      flex-wrap: wrap;
    }

    .radio-group input[type="radio"] {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 1.5rem;
      height: 1.5rem;
      border: 0.1rem solid #555;
      border-radius: 0.375rem;
      padding: 0;
      margin: 0;
      position: relative;
      cursor: pointer;
    }

    .radio-group input[type="radio"]:checked::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #2c3e50;
    }

    .radio-group label {
      display: inline-flex;
      align-items: center;
      gap: 0.2rem;
      font-size: 0.9rem;
      white-space: nowrap;
    }

    /* Password match message */
    #password-match-message {
      grid-column: 2 / -1;
      font-size: 0.85rem;
      margin-top: 0.2rem;
    }

    .error {
      color: #d32f2f;
    }

    .success {
      color: #2e7d32;
    }

    /* Submit button */
    form button[type="submit"] {
      grid-column: 1 / -1;
      padding: 0.75rem 1.5rem;
      margin-top: 0.5rem;
      font-size: 1.2rem;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(to right, navy, teal);
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    form button[type="submit"]:hover {
      background: linear-gradient(to right, #000080, #006666);
    }

    /* Responsive: stack fields on narrow screens */
    @media (max-width: 50rem) {
      fieldset {
        grid-template-columns: 1fr;
        gap: 0.75rem;
      }

      .field-group.full label,
      .field-group.full input {
        grid-column: auto;
      }

      .field-group {
        display: flex;
        flex-direction: column;
      }

      .field-group label {
        margin-bottom: 0.2rem;
      }

      .radio-group {
        justify-content: flex-start;
      }

      #password-match-message {
        grid-column: auto;
      }

      .form-row {
        flex-direction: column;
      }

      .desc {
        max-width: 100%;
      }
    }

    @media (max-width: 35rem) {
      #form-body {
        padding: 1rem;
      }

      .form-title {
        font-size: 1.6rem;
      }
    }
  </style>
</head>

<body>
  <div id="register-card">
    <div id="form-header">
      <span>EDUCATION</span> <br />
      <span>MAYBACH ACADEMY</span>
    </div>
    <div id="form-body">
      <h1 class="form-title">Admission Form</h1>

      <?php
      if (isset($_GET['error']) && $_GET['error'] === 'email_exists') {
        echo '<div style="background:#ffe5e5;padding:10px;border-radius:5px;color:#b30000;">
    An application with this email already exists.
    </div>';
      }
      ?>

      <form action="../controllers/process_application.php" method="post" id="apply-form">
        <div class="form-row">
          <p class="desc">
            This is where you will fill in your information before proceeding
          </p>
          <div class="dor">
            <label for="dor">DATE OF REGISTRATION</label>
            <input type="date" id="dor" name="dor" required />
          </div>
        </div>

        <fieldset>
          <legend>PERSONAL INFORMATION</legend>
          <div class="field-group full">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required />
          </div>
          <div class="field-group">
            <label for="pob">Place of Birth:</label>
            <input type="text" id="pob" name="pob" required />
          </div>
          <div class="field-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required />
          </div>
          <div class="field-group">
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" required />
          </div>
          <div class="field-group">
            <label>Gender:</label>
            <div class="radio-group">
              <input type="radio" id="male" value="male" name="gender" required />
              <label for="male">Male</label>
              <input type="radio" id="female" value="female" name="gender" required />
              <label for="female">Female</label>
            </div>
          </div>
          <div class="field-group">
            <label for="marital">Marital Status:</label>
            <input type="text" id="marital" name="marital" required />
          </div>
        </fieldset>

        <fieldset>
          <legend>CONTACT INFORMATION</legend>
          <div class="field-group full">
            <label for="address">Present Address:</label>
            <input type="text" id="address" name="address" required />
          </div>
          <div class="field-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required />
          </div>
          <div class="field-group">
            <label for="state">State:</label>
            <input type="text" id="state" name="state" required />
          </div>
          <div class="field-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required />
          </div>
          <div class="field-group">
            <label for="postCode">Post Code:</label>
            <input type="text" id="postCode" name="postCode" required />
          </div>
          <div class="field-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
          </div>
          <div class="field-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required />
          </div>
        </fieldset>

        <fieldset>
          <legend>ACADEMIC BACKGROUND</legend>
          <div class="field-group full">
            <label for="previous-school">Name of Previous School:</label>
            <input type="text" id="previous-school" name="previous-school" required />
          </div>
          <div class="field-group">
            <label for="qual">Highest Qualification:</label>
            <select name="qual" id="qual" required>
              <option value="">--- Choose ---</option>
              <option value="high">High School</option>
              <option value="diploma">Diploma</option>
              <option value="bachelor">Bachelor's</option>
            </select>
          </div>
          <div class="field-group">
            <label for="grad-year">Graduation Year:</label>
            <input type="number" id="grad-year" name="grad-year" required />
          </div>
        </fieldset>

        <fieldset>
          <legend>PROGRAM SELECTION</legend>
          <div class="field-group">
            <label for="apply-for">Program Applying For:</label>
            <select name="apply-for" id="apply-for" required>
              <option value="">--- Choose ---</option>
              <option value="comp-sci">Computer Science</option>
              <option value="soft-eng">Software Engineering</option>
              <option value="biz-admin">Business Administration</option>
              <option value="mass-com">Mass Communication</option>
            </select>
          </div>
          <div class="field-group">
            <label for="mode-of-study">Mode of Study:</label>
            <select name="mode-of-study" id="mode-of-study" required>
              <option value="">--- Choose ---</option>
              <option value="full-time">Full Time</option>
              <option value="part-time">Part Time</option>
            </select>
          </div>
        </fieldset>

        <fieldset>
          <legend>ACCOUNT CREATION</legend>
          <div class="field-group full">
            <label for="account-email">Account Email (read-only):</label>
            <input type="email" id="account-email" name="account-email" disabled />
          </div>

          <div class="field-group">
            <label for="password">Create Password:</label>
            <input type="password" id="password" name="password" required />
          </div>
          <div class="field-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required />
            <span id="password-match-message"></span>
          </div>
          <button type="submit">APPLY</button>
        </fieldset>
      </form>
    </div>
  </div>

  <?php require_once "../includes/footer.php"; ?>

  <script>
    const password = document.getElementById("password");
    const confirm = document.getElementById("confirm-password");
    const message = document.getElementById("password-match-message");
    const form = document.getElementById("apply-form");

    function updateMessage() {
      if (password.value !== confirm.value) {
        message.textContent = "❌ Passwords do not match";
        message.className = "error";
      } else {
        message.textContent = "✅ Passwords match";
        message.className = "success";
      }
    }

    // Mirror email from Contact Information to Account Creation
    const emailField = document.getElementById('email');
    const accountEmailField = document.getElementById('account-email');

    function mirrorEmail() {
      accountEmailField.value = emailField.value;
    }

    emailField.addEventListener('input', mirrorEmail);
    window.addEventListener('load', mirrorEmail);

    password.addEventListener("input", updateMessage);
    confirm.addEventListener("input", updateMessage);

    form.addEventListener("submit", function(e) {
      if (password.value !== confirm.value) {
        e.preventDefault();
        confirm.focus();
      }
    });
  </script>
</body>

</html>