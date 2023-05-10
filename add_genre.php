<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted genre name and description
    $genre_name = $_POST["genre_name"];
    $genre_description = $_POST["genre_description"];

    // Prepare the INSERT statement
    $query = "INSERT INTO genre (genre_name, genre_description) VALUES (?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ss", $genre_name, $genre_description);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Genre addition successful
        header("Location: admin.php");
        exit();
    } else {
        // An error occurred during genre addition
        echo "Error adding genre: " . mysqli_error($link);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($link);
}
?>
