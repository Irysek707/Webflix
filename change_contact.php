<?php
session_start();

require('includes/connect_db.php');

// Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

$user_id = $_SESSION['user_id'];

// Get the submitted form data.
$current_contact_number = $_POST['current-contact-number'];
$new_contact_number = $_POST['new-contact-number'];
$password = $_POST['password'];

// Check if the user with the given contact number and password exists.
$query = "SELECT * FROM users WHERE user_id='$user_id' AND contact_number='$current_contact_number' AND pass=SHA2('$password',256)";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == 1) {
  // The user exists and the password is correct, so update the contact number.
  $query = "UPDATE users SET contact_number='$new_contact_number' WHERE user_id='$user_id'";
  mysqli_query($link, $query);

  // Redirect back to the user page.
  header("Location: user.php");
  exit();
} else {
  // The user doesn't exist or the password is incorrect.
  echo "Invalid contact number or password. Please try again.";
}

mysqli_close($link);
?>
