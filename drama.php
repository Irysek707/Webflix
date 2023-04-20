<?php
    # Open database connection
    require('includes/connect_db.php');

    # Retrieve titles tagged as Drama from movie_stream table
    $q = "SELECT * FROM movie_stream WHERE genre_name = 'Drama'";
    $r = mysqli_query($link, $q);

    echo '<h3>Drama</h3><div class="container">';
    
    if (mysqli_num_rows($r) > 0) {
        # Display movie titles
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="card" style="width: 18rem;">
                <img src="' . $row['img'] . '" class="card-img-top" alt="Movie">
                <div class="card-body">
                <h4 class="card-title">' . $row['movie_title'] .  '</h4>
                <a href="movie.php?id=' . $row['id'] . '" class="btn btn-secondary">Watch Now</a>
                </div>
            </div>';
        }
    }
    
    # Retrieve titles tagged as Drama from tv_show table
    $q = "SELECT * FROM tv_show WHERE genre_name = 'Drama'";
    $r = mysqli_query($link, $q);

    if (mysqli_num_rows($r) > 0) {
        # Display TV show titles
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="card" style="width: 18rem;">
                <img src="' . $row['img'] . '" class="card-img-top" alt="TV Show">
                <div class="card-body">
                <h4 class="card-title">' . $row['tvshow_title'] .  '</h4>
                <a href="tvshow.php?id=' . $row['tvshow_id'] . '" class="btn btn-secondary">Watch Now</a>
                </div>
            </div>';
        }
    }
    
    # Close database connection.
    mysqli_close($link);
    
    # Display message if there are no titles
    if (mysqli_num_rows($r) == 0) {
        echo '<p>There are currently no titles showing.</p>';
    }
    
    echo '</div>';
?>
