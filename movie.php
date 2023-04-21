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
    // Check user subscription
    $subscribed = true; // Replace with actual check
?>

<!DOCTYPE html>
<html>
<head>
  <title>Webflix | <?php echo $movie_title; ?></title>
  <!-- other meta tags and stylesheets -->
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

#Set page title and display header section
$page_title = 'Movie';
include('includes/logout.php');



#Get passed product id and assign it to a variable.
if (isset($_GET['id']))
  $id = $_GET['id'];

#Open database connection
require('includes/connect_db.php');

#Retrive selective item data from 'movie' database table.
$q = "SELECT * FROM movie_stream WHERE id = $id";
$r = mysqli_query($link, $q);
// Display movies
if ($r->num_rows > 0) {
  while ($row = $r->fetch_assoc()) {
    // Check user subscription
    $subscribed = true; // Replace with actual check


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
          echo "<td><a href='" . $row["movie_stream"] . "'>Watch Now</a></td>";
        } else {
          echo "<td><button class='btn'>Subscribe</button></td>";
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