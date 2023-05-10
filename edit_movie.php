<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted movie ID
    $movie_id = $_POST["id"];

    // Retrieve the updated movie details
    $genre_name = $_POST["genre_name"];
    $movie_title = $_POST["movie_title"];
    $movie_description = $_POST["movie_description"];
    $movie_trailer = $_POST["movie_trailer"];
    $movie_stream = $_POST["movie_stream"];
    $img = $_POST["img"];
    $release_year = $_POST["release_year"];
    $language = $_POST["language"];
    $duration = $_POST["duration"];

    // Prepare the UPDATE statement
    $query = "UPDATE movie_stream SET genre_name = ?, movie_title = ?, movie_description = ?, movie_trailer = ?, movie_stream = ?, img = ?, release_year = ?, language = ?, duration = ? WHERE id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "sssssssssi", $genre_name, $movie_title, $movie_description, $movie_trailer, $movie_stream, $img, $release_year, $language, $duration, $movie_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to admin page after successful update
            header("Location: admin.php");
            exit();
        } else {
            // An error occurred during the update
            echo "Error updating movie details: " . mysqli_error($link);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing the statement
        echo "Error: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
}
?>
