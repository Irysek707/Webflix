<?php
# Access session.
session_start();

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
}

#Open database connection
require('includes/connect_db.php');

if (isset($_GET['post_id']))
    $post_id = $_GET['post_id'];

$sql = "DELETE FROM tv_rev WHERE post_id='$post_id'";
if ($link->query($sql) === TRUE) {
    # Redirect to the previous page.
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error deleting record: " . $link->error;
}