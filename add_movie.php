<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted movie details
    $genre_name = $_POST["genre_name"];
    $movie_title = $_POST["movie_title"];
    $movie_description = $_POST["movie_description"];
    $movie_trailer = $_POST["movie_trailer"];
    $movie_stream = $_POST["movie_stream"];
    $img = $_POST["img"];
    $release_year = $_POST["release_year"];
    $language = $_POST["language"];
    $duration = $_POST["duration"];

    // Prepare the INSERT statement
    $query = "INSERT INTO movie_stream (genre_name, movie_title, movie_description, movie_trailer, movie_stream, img, release_year, language, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sssssssss", $genre_name, $movie_title, $movie_description, $movie_trailer, $movie_stream, $img, $release_year, $language, $duration);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Movie addition successful
        header("Location: admin.php");
        exit();
    } else {
        // An error occurred during movie addition
        echo "Error adding movie: " . mysqli_error($link);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($link);
}
?>
