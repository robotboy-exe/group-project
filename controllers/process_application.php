<?php
session_start();
require_once "../includes/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Personal Information ---
    $registrationDate = $_POST['dor'];
    $fullName = $_POST['fullName'];
    $placeOfBirth = $_POST['pob'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];

    // --- Contact Information ---
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $postCode = $_POST['postCode'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // --- Academic Background ---
    $previousSchool = $_POST['previous-school'];
    $qualification = $_POST['qual'];
    $graduationYear = $_POST['grad-year'];

    // --- Program Selection ---
    $program = $_POST['apply-for'];
    $studyMode = $_POST['mode-of-study'];

    // --- Account ---
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email already applied
$checkStmt = $conn->prepare("SELECT id FROM applications WHERE email = ?");
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$result = $checkStmt->get_result();

if ($result->num_rows > 0) {
    header("Location: ../views/apply.php?error=email_exists");
exit();
}

// Check if email already exists in users
$userCheck = $conn->prepare("SELECT id FROM users WHERE email = ?");
$userCheck->bind_param("s", $email);
$userCheck->execute();
$userResult = $userCheck->get_result();

if ($userResult->num_rows > 0) {
    header("Location: ../views/apply.php?error=email_exists");
exit();
}

    $appStmt = $conn->prepare("INSERT INTO applications 
        (registration_date, full_name, place_of_birth, date_of_birth, nationality, gender, marital_status, 
        address, city, state, country, postcode, email, phone, previous_school, qualification, graduation_year, 
        program, study_mode, password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $appStmt->bind_param("ssssssssssssssssssss", 
        $registrationDate, $fullName, $placeOfBirth, $dob, $nationality, $gender, $marital,
        $address, $city, $state, $country, $postCode, $email, $phone, $previousSchool, $qualification,
        $graduationYear, $program, $studyMode, $password
    );

    if ($appStmt->execute()) {

        header("Location: ../views/application-success.php");
        exit();

    } else {
        echo "Error saving application: " . $appStmt->error;
    }

    $appStmt->close();
    $conn->close();
}
?>
