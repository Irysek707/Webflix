<?php
#DISPLAY COMPLETE LOGGED IN PAGE
#Access session
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

#Get passed product id and assign it to a variable.
if (isset($_GET['id']))
  $id = $_GET['id'];

#Open database connection
require('includes/connect_db.php');

#Retrieve selective item data from 'tv_show' database table.
$q = "SELECT * FROM tv_show WHERE tvshow_id = $id";
$r = mysqli_query($link, $q);

#Get the movie title and assign it to a variable
$tvshow_title = '';
if ($r->num_rows > 0) {
  while ($row = $r->fetch_assoc()) {
    $tvshow_title = $row['tvshow_title'];
    // // Check user subscription
    // $subscribed = true; // Replace with actual check
    ?>

      <title>Webflix |
        <?php echo $tvshow_title; ?>
      </title>
      <!-- other meta tags and stylesheets -->

      <?php
      #Set page title and display header section
        include('includes/logout.php');
?>

    <?php
  }
}

# Close database connection.
mysqli_close($link);
?>




<?php #DISPLAY COMPLETE LOGGED IN PAGE
#Access session
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

#Get user_id from session
$user_id = $_SESSION['user_id'];



#Get passed product id and assign it to a variable.
if (isset($_GET['id']))
  $id = $_GET['id'];

#Open database connection
require('includes/connect_db.php');

#Retrive selective item data from 'tvshow' database table.
$q = "SELECT * FROM tv_show WHERE tvshow_id = $id";
$r = mysqli_query($link, $q);

//Get subscription status
$s = "SELECT status FROM subscriptions WHERE user_id = $user_id AND expiration_date >= CURDATE()";
$t = mysqli_query($link, $s);

if ($t && $t->num_rows > 0) {
  $row = $t->fetch_assoc();
  $subscribed = ($row['status'] == 'active');
} else {
  $subscribed = false;
}



// Display tvshows
if ($r->num_rows > 0) {
  while ($row = $r->fetch_assoc()) {


    ?>
    <div class="wrapper">
      <div class="container movie-view">
        <h1>
          <?php echo $row['tvshow_title']; ?>
        </h1>
        <div class="flex-container">
          <div class="box">
            <div class="d-flex flex-wrap">
              <div class="flex-fill">
                <div class="d-flex flex-wrap">
                  <div class="flex-fill"><br />
                    <p>
                      <?php echo $row['tvshow_description']; ?>
                    </p>
                  </div>
                  <div class="flex-fill">
                    <p><strong>Genre:</strong>
                      <?php echo $row['genre_name']; ?>
                    </p>
                    <p><strong>Release Year:</strong>
                      <?php echo $row['release_year']; ?>
                    </p>
                    <p><strong>Language:</strong>
                      <?php echo $row['language']; ?>
                    </p>
                    <p><strong>Seasons:</strong>
                      <?php echo $row['num_seasons']; ?>
                    </p>
                    <p><strong>Episodes:</strong>
                      <?php echo $row['number_of_episodes']; ?>
                    </p>

                    <!-- Adding reviews -->
                    <?php
                    echo '<div class="container"><br><br><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Review</button><br></div>';
                    ?>

                    <!-- Review Modal -->
                    <div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="rev">TV Show Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="tv_post_action.php" method="post" accept-charset="utf-8">
                              <div class="form-check">
                                <label for="tvshow_title">TV Show Title: </label>
                                <input type="text" class="form-control" name="tvshow_title" value="<?php echo $row['tvshow_title']; ?>"required>
                                <label for="rate">Rate Show: </label>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="rate" value="5">&#9734; &#9734;
                                      &#9734; &#9734; &#9734;
                                    </label>
                                    <br />
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="rate" value="4">&#9734; &#9734;
                                      &#9734; &#9734;
                                    </label>

                                    <br />
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="rate" value="3">&#9734; &#9734;
                                      &#9734;
                                    </label>

                                    <br />
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="rate" value="2">&#9734; &#9734;
                                    </label>

                                    </br>
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="rate" value="1">&#9734;
                                    </label>
                                  </div>

                                  <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <input class="btn btn-dark" type="submit" value="Post Review">
                                    </div>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="d-flex flex-wrap">
              <div class="flex-fill mr-3">
                <iframe width='450' height='300' src="<?php echo $row['tvshow_trailer']; ?>" style="border:none;"></iframe>
              </div>
            </div>
          </div>
        </div>

        <div class="containerTV">

          <?php
          // Display stream or subscribe button
          if ($subscribed) {

            # Get the distinct seasons from the episodes table.
            $a = "SELECT DISTINCT season FROM episodes";
            $b = mysqli_query($link, $a);

            # Loop through each season and check if there are episodes for that season.
            while ($row = mysqli_fetch_assoc($b)) {
              $season = $row['season'];
              $check_a = "SELECT * FROM episodes WHERE season = $season AND tvshow_id = $id";
              $check_b = mysqli_query($link, $check_a);

              # If there are episodes for the season, display the accordion.
              if (mysqli_num_rows($check_b) > 0) {
                echo "<h2>Season $season</h2>";
                echo "<div class='accordion' id='season$season'>";

                # Loop through each episode and create an accordion card for it.
                while ($episode_row = mysqli_fetch_assoc($check_b)) {
                  $episode_number = $episode_row['episode_number'];
                  $episode_title = $episode_row['episode_title'];
                  $episode_description = $episode_row['episode_description'];
                  $episode_stream = $episode_row['episode_link'];

                  echo "<div class='card2'>";
                  echo "<div class='card-header' id='episode${season}_${episode_number}'>";
                  echo "<h2 class='mb-0'>";
                  echo "<button class='btn collapsed' type='button' data-toggle='collapse' data-target='#collapse_${season}_${episode_number}' aria-expanded='false' aria-controls='collapse_${season}_${episode_number}'>";
                  echo "Episode $episode_number: $episode_title";
                  echo "</button>";
                  echo "</h2>";
                  echo "</div>";
                  echo "<div id='collapse_${season}_${episode_number}' class='collapse' aria-labelledby='episode${season}_${episode_number}' data-parent='#season$season'>";
                  echo "<div class='card-body'>";
                  echo "<h3>Episode $episode_number: $episode_title</h3><br/>";
                  echo "$episode_description <br/><br/>";
                  echo "<center><iframe width='450' height='300' src='$episode_stream' style='border:none;'></iframe></center>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }

                echo "</div><br/>";
              }
            }

          } else {
            echo '<br/><a href="subscription.php"><button class="btn btn-dark btn-outline-dark">Subscribe to watch the show</button></a>';
          }
  }
}
?>

</div>

<div class="flex-container">
  <div class="box"><br/><br/>
<?php
#Get passed product id and assign it to a variable.
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  #Open database connection
  require('includes/connect_db.php');

  #Retrieve selective item data from 'tv_show' database table.
  $q = "SELECT * FROM tv_show WHERE tvshow_id = $id";
  $r = mysqli_query($link, $q);

  #Fetch the row from the result set and get the tvshow title
  if ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      $tvshow_title = $row['tvshow_title'];
  } else {
      # Handle error if the row is not found
      echo "No data found for id $id";
      exit;
  }

  # Retrieve items from 'tv_rev' database table.
  $a = "SELECT * FROM tv_rev WHERE tvshow_title='$tvshow_title' ORDER BY post_date DESC";
  $b = mysqli_query($link, $a);

  if (mysqli_num_rows($b) > 0) {
      echo '<h3>Reviews</h3><div class="containerReview">';
      while ($row = mysqli_fetch_array($b, MYSQLI_ASSOC)) {
          echo '<div class="flex-column"><p><h4>Rating:  ' . $row['rate'] . ' &#9734</h4></p>
                    <p>' . $row['message'] . '</p>
                    <footer class="blockquote-footer">
                    <span>' . $row['first_name'] . ' ' . $row['last_name'] . '</span> 
                    <br/>
                    <cite title="Source Title"> ' . $row['post_date'] . '</cite>
                    <br><br>
                    </button></footer></div>';
      }
  } else {
      echo '<h3>Reviews</h3><div class="container">
                <br>
                <p>There is no reviews for this tv show.</p>
                </div>';
  }
}
?>
</div>
</div>

<?php
# Close database connection.
mysqli_close($link);
?>

  </div>
</div>


<?php
include('includes/footer.php');
?>