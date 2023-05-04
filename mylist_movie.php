<?php

session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

#Get user_id from session
$user_id = $_SESSION['user_id'];

#Get passed product id and assign it to a variable.
if (isset($_GET['id']))
  $id = $_GET['id'];

#Open database connection
require('includes/connect_db.php');

#Retrive selective item data from 'movie' database table.
$q = "SELECT * FROM movie_stream WHERE id = $id";
$r = mysqli_query($link, $q);

# Check if movie is already in the user's list
$q = "SELECT * FROM my_list WHERE user_id = $user_id AND id = $movie_id";
$r = mysqli_query($link, $q);
$in_list = ($r->num_rows > 0);

# Handle adding or removing the movie from the user's list
if (isset($_POST['add_to_list'])) {
  $q = "INSERT INTO my_list (user_id, id, type) VALUES ($user_id, $movie_id, 'Movie')";
  mysqli_query($link, $q);
  $in_list = true;
} elseif (isset($_POST['remove_from_list'])) {
  $q = "DELETE FROM my_list WHERE user_id = $user_id AND id = $movie_id";
  mysqli_query($link, $q);
  $in_list = false;
}



function checkout($page = 'test.php')
{
    if (isset($_GET['id']))
      $id = $_GET['id'];
    # Begin URL with protocol, domain, and current directory.
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    # Remove trailing slashes then append page name to URL.
    $url = rtrim($url, '/\\');
    $url .= '/' . $page . '?id=' . $id;
    # Execute redirect then quit.
    header("Location: $url");
    exit();
}

checkout();

?>