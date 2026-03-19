// Fake data for now (later comes from backend)
const studentData = {
  firstName: "Amir",
  assignmentsPending: 1,
  gpa: 3.8,
  status: "Active"
};

// Insert dynamic values
document.getElementById("studentName").textContent = studentData.firstName;
document.getElementById("assignmentCount").textContent =
  studentData.assignmentsPending + " Pending";
document.getElementById("gpa").textContent = studentData.gpa;
document.getElementById("status").textContent = studentData.status;

// Notification logic
const notification = document.getElementById("notification");

if (studentData.assignmentsPending > 0) {
  notification.classList.remove("hidden");
  notification.classList.add("blink");
} else {
  notification.classList.add("hidden");
}