<?php
#Access session
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

#Open database connection
require('includes/connect_db.php');

#Get user_id from session
$user_id = $_SESSION['user_id'];

#Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  #Retrieve the new avatar URL from the form
  $new_avatar_url = $_POST['avatar-url'];

  #Update the user's avatar URL in the database
  $query = "UPDATE users SET avatar='$new_avatar_url' WHERE user_id=$user_id";
  mysqli_query($link, $query);

  #Close the database connection
  mysqli_close($link);

  #Redirect back to user.php
  header('Location: user.php');
  exit();
}
?>
