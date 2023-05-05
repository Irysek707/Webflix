<?php
// Retrieve the movie_id and user_id from the POST request
$movie_id = $_POST['movie_id'];
$user_id = $_POST['user_id'];

// Check if movie is already in the user's list
$q = "SELECT * FROM my_list WHERE user_id = $user_id AND id = $movie_id";
$r = mysqli_query($link, $q);
$in_list = ($r->num_rows > 0);

# Handle adding or removing the movie from the user's list
if ($in_list) {
  $q = "DELETE FROM my_list WHERE user_id = $user_id AND id = $movie_id";
  mysqli_query($link, $q);
} else {
  $q = "INSERT INTO my_list (user_id, id, type) VALUES ($user_id, $movie_id, 'Movie')";
  mysqli_query($link, $q);
}

// Redirect back to movie.php
header("Location: test.php?id=$movie_id");
exit;
?>
