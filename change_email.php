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
$current_email = $_POST['current-email'];
$new_email = $_POST['new-email'];
$password = $_POST['password'];

// Check if the user with the given email and password exists.
$query = "SELECT * FROM users WHERE user_id='$user_id' AND email='$current_email' AND pass=SHA2('$password',256)";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == 1) {
  // The user exists and the password is correct, so update the email.
  $query = "UPDATE users SET email='$new_email' WHERE user_id='$user_id'";
  mysqli_query($link, $query);
  $_SESSION['email'] = $new_email; // Update the email in the session as well.

  // Redirect back to the user page.
  header("Location: user.php");
  exit();
} else {
  // The user doesn't exist or the password is incorrect.
  echo "Invalid password. Please try again.";
}

mysqli_close($link);
?>