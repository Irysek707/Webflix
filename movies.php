<title>Webflix | Movies</title>

<?php
#Access session
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

include('includes/logout.php');

    # Open database connection
    require('includes/connect_db.php');

    # Retrieve all titles from movie_stream table
    $q = "SELECT * FROM movie_stream";
    $r = mysqli_query($link, $q);

    # Retrieve titles tagged as Action from movie_stream table
    $a = "SELECT * FROM movie_stream WHERE genre_name = 'Action'";
    $b = mysqli_query($link, $a);

    # Retrieve titles tagged as Comedy from movie_stream table
    $c = "SELECT * FROM movie_stream WHERE genre_name = 'Comedy'";
    $d = mysqli_query($link, $c);

    # Retrieve titles tagged as Crime from movie_stream table
    $e = "SELECT * FROM movie_stream WHERE genre_name = 'Crime'";
    $f = mysqli_query($link, $e);

    # Retrieve titles tagged as Documentary from movie_stream table
    $g = "SELECT * FROM movie_stream WHERE genre_name = 'Documentary'";
    $h = mysqli_query($link, $g);

    # Retrieve titles tagged as Drama from movie_stream table
    $i = "SELECT * FROM movie_stream WHERE genre_name = 'Drama'";
    $j = mysqli_query($link, $i);

    # Retrieve titles tagged as Fantasy from movie_stream table
    $k = "SELECT * FROM movie_stream WHERE genre_name = 'Fantasy'";
    $l = mysqli_query($link, $k);

    # Retrieve titles tagged as Horror from movie_stream table
    $m = "SELECT * FROM movie_stream WHERE genre_name = 'Horror'";
    $n = mysqli_query($link, $m);

    # Retrieve titles tagged as Romance from movie_stream table
    $o = "SELECT * FROM movie_stream WHERE genre_name = 'Romance'";
    $p = mysqli_query($link, $o);

    # Retrieve titles tagged as Science Fiction from movie_stream table
    $s = "SELECT * FROM movie_stream WHERE genre_name = 'Science Fiction'";
    $t = mysqli_query($link, $s);

    # Retrieve titles tagged as Thriller from movie_stream table
    $u = "SELECT * FROM movie_stream WHERE genre_name = 'Thriller'";
    $v = mysqli_query($link, $u);
?>

<div class="wrapper">
    <div class="container movie-view">
        <div class="tabs tabs2">
              <button class="tablink2 active btn btn-secondary" onclick="openTab('all')">All movies</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('action')">Action</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('comedy')">Comedy</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('crime')">Crime</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('documentary')">Documentary</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('drama')">Drama</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('fantasy')">Fantasy</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('horror')">Horror</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('romance')">Romance</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('sci-fi')">Science fiction</button>
              <button class="tablink2 btn btn-secondary" onclick="openTab('thriller')">Thriller</button>

              <div id="all" class="tabcontent" style="display:block;">
                <br />
                <h2>All movies</h2>
                  <?php
                  if (mysqli_num_rows($r) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>

            </div>
            <div id="action" class="tabcontent">
                <br />
                <h2>Action movies</h2>
                  <?php
                  if (mysqli_num_rows($b) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($b, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="comedy" class="tabcontent">
                <br />
                <h2>Comedy movies</h2>
                
                <?php
                  if (mysqli_num_rows($d) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($d, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="crime" class="tabcontent">
                <br/>
                <h2>Crime movies</h2>
                  <?php
                  if (mysqli_num_rows($f) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($f, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="documentary" class="tabcontent">
                <br />
                <h2>Documentary movies</h2>
                  <?php
                  if (mysqli_num_rows($h) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($h, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="drama" class="tabcontent">
                <br />
                <h2>Drama movies</h2>
                  <?php
                  if (mysqli_num_rows($j) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($j, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="fantasy" class="tabcontent">
                <br />
                <h2>Fantasy movies</h2>
                  <?php
                  if (mysqli_num_rows($l) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($l, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="horror" class="tabcontent">
                <br />
                <h2>Horror movies</h2>
                  <?php
                  if (mysqli_num_rows($n) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="romance" class="tabcontent">
                <br />
                <h2>Romance movies</h2><br />
                  <?php
                  if (mysqli_num_rows($p) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="sci-fi" class="tabcontent">
                <br />
                <h2>Science fiction movies</h2>
                  <?php
                  if (mysqli_num_rows($t) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
            <div id="thriller" class="tabcontent">
                <br />
                <h2>Thriller movies</h2>
                  <?php
                  if (mysqli_num_rows($v) == 0) {
                      echo "No movies to display";
                  } else {
                      echo '<div class="carousel">';
                      $count = 0;
                      while ($row = mysqli_fetch_array($v, MYSQLI_ASSOC)) {
                          if ($count > 0 && $count % 3 == 0) {
                              echo '</div><div class="carousel">';
                          }
                          echo '<div class="card card3">
                                <a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
                            </div>';
                          $count++;
                      }
                      echo '</div>';
                  }
                  ?>
            </div>
        </div>
    </div>
</div>

<script>
  function openTab(tabName) {
    var i;
    var x = document.getElementsByClassName("tabcontent");
    var tablink2s = document.getElementsByClassName("tablink2");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    for (i = 0; i < tablink2s.length; i++) {
      tablink2s[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");
  }

  document.addEventListener("DOMContentLoaded", function (event) {
    openTab('all');
  });
</script>

<?php
# Close database connection.
mysqli_close($link);

include('includes/footer.php');
?>