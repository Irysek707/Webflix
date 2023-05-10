<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted old genre name, new genre name, and genre description
    $old_genre_name = $_POST["old_genre_name"];
    $new_genre_name = $_POST["new_genre_name"];
    $genre_description = $_POST["genre_description"];

    // Prepare the UPDATE statement
    $query = "UPDATE genre SET genre_name = ?, genre_description = ? WHERE genre_name = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sss", $new_genre_name, $genre_description, $old_genre_name);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Update successful
        header("Location: admin.php");
        exit();
    } else {
        // An error occurred during the update
        echo "Error updating genre details: " . mysqli_error($link);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($link);
}

?>
