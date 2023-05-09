<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted user ID
    $user_id = $_POST["user_id"];

    // Prepare the DELETE statement
    $query = "DELETE FROM users WHERE user_id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Deletion successful
        header("Location: admin.php");
        exit();
    } else {
        // An error occurred during deletion
        echo "Error deleting user: " . mysqli_error($link);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($link);
}
?>
