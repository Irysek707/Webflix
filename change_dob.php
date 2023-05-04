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
$dob = $_POST['dob'];
$password = $_POST['password'];

// Check if the user with the given email and current password exists.
$query = "SELECT * FROM users WHERE user_id='$user_id' AND pass=SHA2('$password',256)";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == 1) {
  // The user exists and the password is correct, so update the date of birth.
  $query = "UPDATE users SET dob='$dob' WHERE user_id='$user_id'";
  mysqli_query($link, $query);
  $_SESSION['dob'] = $dob; // Update the date of birth in the session as well.

  // Redirect back to the user page.
  header("Location: user.php");
  exit();
} else {
  // The user doesn't exist or the password is incorrect.
  echo "Invalid password. Please try again.";
}

mysqli_close($link);
?>
