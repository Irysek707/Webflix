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
$email = $_POST['email'];
$current_password = $_POST['current-password'];
$new_password = $_POST['new-password'];

// Check if the user with the given email and current password exists.
$query = "SELECT * FROM users WHERE user_id='$user_id' AND email='$email' AND pass=SHA2('$current_password',256)";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == 1) {
  // The user exists and the current password is correct, so update the password.
  $query = "UPDATE users SET pass=SHA2('$new_password',256) WHERE user_id='$user_id'";
  mysqli_query($link, $query);
  $_SESSION['pass'] = $new_password; // Update the password in the session as well.

  // Redirect back to the user page.
  header("Location: user.php");
  exit();
} else {
  // The user doesn't exist or the current password is incorrect.
  echo "Invalid email or password. Please try again.";
}

mysqli_close($link);
?>
