<title>Webflix</title>
<script src="script.js"></script>

<?php

#Set page title and display header section
include('includes/logout.php');

# Open database connection
require('includes/connect_db.php');

# display search form
echo '<form method="GET" action="">
  <input type="text" name="query" placeholder="Search movies and TV shows...">
  <button type="submit">Search</button>
</form>';

# get search query from form submission
if (isset($_GET['query'])) {
  $search_query = mysqli_real_escape_string($link, $_GET['query']);

  # search for movie and TV show titles
  $sql1 = "SELECT id, movie_title AS title FROM movie_stream WHERE movie_title LIKE '%$search_query%'";
  $sql2 = "SELECT tvshow_id, tvshow_title AS title FROM tv_show WHERE tvshow_title LIKE '%$search_query%'";

  $result1 = mysqli_query($link, $sql1);
  $result2 = mysqli_query($link, $sql2);

  # Display search results
  if (mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
    echo '<ul>';
    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
      $url = 'movie.php?id=' . $row['id'];
      echo '<li><a href="' . $url . '">' . $row['title'] . '</a></li>';
    }
    while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
      $url = 'tvshow.php?id=' . $row['tvshow_id'];
      echo '<li><a href="' . $url . '">' . $row['title'] . '</a></li>';
    }
    echo '</ul>';
  } else {
    echo 'No results found.';
  }
}

# Close database connection.
mysqli_close($link);




  

include('includes/footer.php');

?>
