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

#Retrieve selective item data from 'movie' database table.
$q = "SELECT * FROM movie_stream WHERE id = $id";
$r = mysqli_query($link, $q);

#Get the movie title and assign it to a variable
$movie_title = '';
if ($r->num_rows > 0) {
  while ($row = $r->fetch_assoc()) {
    $movie_title = $row['movie_title'];
    // // Check user subscription
    ?>

      <title>Webflix |
        <?php echo $movie_title; ?>
      </title>

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

#Retrive selective item data from 'movie' database table.
$q = "SELECT * FROM movie_stream WHERE id = $id";
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



// Display movies
if ($r->num_rows > 0) {
  while ($row = $r->fetch_assoc()) {


    ?>
    <div class="wrapper">
      <div class="container movie-view">
        <h1>
          <?php echo $row['movie_title']; ?>
        </h1>
        <div class="flex-container">
          <div class="box">
            <div class="d-flex flex-wrap">
              <div class="flex-fill">
                <div class="d-flex flex-wrap">
                  <div class="flex-fill"><br />
                    <p>
                      <?php echo $row['movie_description']; ?>
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
                    <p><strong>Duration:</strong>
                      <?php echo $row['duration']; ?> min
                    </p>

                    <?php
                      // Display stream or subscribe button
                      if ($subscribed) {
                    ?>
                    <!-- Adding reviews -->
                    <?php
                    echo '<div class="container"><br><br><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br></div>';
                    ?>

                    <!-- Review Modal -->
                    <div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="rev">Movie Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="post_action.php" method="post" accept-charset="utf-8">
                              <div class="form-check">
                                <label for="movie_title">Movie Title: </label>
                                <input type="text" class="form-control" name="movie_title" value="<?php echo $row['movie_title']; ?>"required>
                                <label for="rate">Rate Movie: </label>
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

                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="d-flex flex-wrap">
              <div class="flex-fill mr-3">
                <iframe width='450' height='300' src="<?php echo $row['movie_trailer']; ?>" style="border:none;"></iframe>
              </div>
            </div>
          </div>
        </div>


        <div style="display: flex; flex-direction: column;">
        <?php
        // Display stream or subscribe button
        if ($subscribed) {
          ?>

          <div class="accordion" id="watchNow">
            <div class="card2">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-dark btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Watch now
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#watchNow">
                <div class="card-body">
                  <iframe width='450' height='300' src="<?php echo $row['movie_stream']; ?>" style="border:none;"></iframe>
                </div>
              </div>
            </div>
          </div>

          <?php
        } else {
          echo '<br/><a href="subscription.php"><button class="btn btn-dark btn-outline-dark">Subscribe to watch the movie</button></a>';
        }
  }
}
?>

<div class="flex-container">
  <div class="box"><br/><br/>
<?php
#Get passed product id and assign it to a variable.
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  #Open database connection
  require('includes/connect_db.php');

  #Retrieve selective item data from 'movie' database table.
  $q = "SELECT * FROM movie_stream WHERE id = $id";
  $r = mysqli_query($link, $q);

  #Fetch the row from the result set and get the movie title
  if ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      $movie_title = $row['movie_title'];
  } else {
      # Handle error if the row is not found
      echo "No data found for id $id";
      exit;
  }

  # Retrieve items from 'mov-review' database table.
  $a = "SELECT * FROM mov_rev WHERE movie_title='$movie_title' ORDER BY post_date DESC";
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
                <p>There is no reviews for this movie.</p>
                </div>';
  }
}
?>
</div>
</div>
</div>


  </div>

</div>
</div>


<?php

# Close database connection.
mysqli_close($link);

include('includes/footer.php');
?>