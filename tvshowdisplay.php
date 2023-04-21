<?php
    # Open database connection
    require('includes/connect_db.php');

    # Retrieve titles tagged as TV Show from movie_stream table
    $q = "SELECT * FROM tv_show";
    $r = mysqli_query($link, $q);

    echo '<h3>TV Shows</h3>';

    # Display movies and TV shows in carousel
?>
<div id="MyCarosel10" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">

        <?php
            $count = 0;

            # Display movies
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                if ($count == 0) {
                    echo '<div class="carousel-item active">';
                } elseif ($count % 3 == 0) {
                    echo '</div><div class="carousel-item">';
                }
                echo '<div class="card card3">
                          <a href="tvshow.php?id=' . $row['tvshow_id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['tvshow_title'] . '"></a>
                      </div>';
                $count++;
            }

            # Display TV shows
            while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
                if ($count % 3 == 0) {
                    echo '</div><div class="carousel-item">';
                }
                if ($count == 0) {
                    echo '<div class="carousel-item active">';
                }
                echo '<div class="card card3">
                          <a href="tvshow.php?id=' . $row['tvshow_id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['tvshow_title'] . '"></a>
                      </div>';
                $count++;
            }

            # Close carousel items
            if ($count % 3 != 0) {
                echo '</div>';
            }
        ?>
        
    </div>
    <a class="carousel-control-prev" href="#MyCarosel10" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#MyCarosel10" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
    # Close database connection.
    mysqli_close($link);
    
    # Display message if there are no titles
    if ((mysqli_num_rows($r) == 0) && (mysqli_num_rows($r2) == 0)) {
        echo '<p>There are currently no titles showing.</p>';
    }
    
    echo '</div>';
?>