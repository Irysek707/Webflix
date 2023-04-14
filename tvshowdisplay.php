<?php

    #Open database connection
    require('includes/connect_db.php');


    #Retrive titles tagged as TV Shows
    $q = "SELECT * FROM tv_show";

    $r = mysqli_query($link, $q);

    echo '<h3>TV Shows</h3><div class="container">';
    if (mysqli_num_rows($r) > 0) {
        # Display body section.
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '<div class="card" style="width: 18rem;">
                <img src="' . $row['img'] . '" class="card-img-top" alt="Movie">
                <div class="card-body">
                <h4 class="card-title">' . $row['tvshow_title'] .  '</h4>';

                if (array_key_exists('movie_title', $row)) {
                    echo '<a href="movie.php?id=' . $row['id'] . '" class="btn btn-secondary">Watch Now</a>';
                } else {
                    echo '<a href="tvshow.php?id=' . $row['id'] . '" class="btn btn-secondary">Watch Now</a>';
                }

                echo'</div>
            </div>';
        }

        # Close database connection.
        mysqli_close($link);
    }
    # Or display message.
    else {
        echo '<p>There are currently no TV Shows.</p>';
    }
    echo '</div>';
?>