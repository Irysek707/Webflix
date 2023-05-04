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
                    <button type="submit" class="btn btn-primary">Add to list</button>
                    <button type="submit" class="btn btn-primary">Add review</button>
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


# Close database connection.
mysqli_close($link);
?>
  </div>

</div>
</div>


<?php
include('includes/footer.php');
?>