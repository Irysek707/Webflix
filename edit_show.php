<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted tvshow ID
    $tvshow_id = $_POST["tvshow_id"];

    // Retrieve the updated tvshow details
    $genre_name = $_POST["genre_name"];
    $tvshow_title = $_POST["tvshow_title"];
    $tvshow_description = $_POST["tvshow_description"];
    $tvshow_trailer = $_POST["tvshow_trailer"];
    $img = $_POST["img"];
    $release_year = $_POST["release_year"];
    $seasons = $_POST["num_seasons"];
    $episodes = $_POST["number_of_episodes"];

    // Prepare the UPDATE statement
    $query = "UPDATE tv_show SET genre_name = ?, tvshow_title = ?, tvshow_description = ?, tvshow_trailer = ?, img = ?, release_year = ?, language = ?, num_seasons = ?, number_of_episodes = ? WHERE tvshow_id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "sssssssssi", $genre_name, $tvshow_title, $tvshow_description, $tvshow_trailer, $img, $release_year, $language, $seasons, $episodes, $tvshow_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to admin page after successful update
            header("Location: admin.php");
            exit();
        } else {
            // An error occurred during the update
            echo "Error updating tvshow details: " . mysqli_error($link);
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
