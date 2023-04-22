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

    <!DOCTYPE html>
    <html>

    <head>
      <title>Webflix |
        <?php echo $tvshow_title; ?>
      </title>
      <!-- other meta tags and stylesheets -->

      <?php
      #Set page title and display header section
        include('includes/logout.php');
?>

    </head>

    <body>
      <!-- page content here -->
    </body>

    </html>

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
              $check_a = "SELECT * FROM episodes WHERE season = $season";
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
            echo '<br/><a href="subscription.php"><button class="btn btn-dark btn-outline-dark">Subscribe to watch the tvshow</button></a>';
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