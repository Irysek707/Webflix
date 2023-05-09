<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>


<link rel="icon" type="image/png" href="img/favicon.png">

<?php
  #Access session.
  session_start();

  #Redirect if not logged in.
  if (!isset($_SESSION['user_id'])) {
    echo '<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h4>WEBFLIX</h4></a>
      <form class="d-flex">
      <a href="login.php"><button class="btn btn2 btn-dark btn-outline-dark" type="button">Sign in</button></a>
      </form>
    </div>
    </nav>
            <br/>';
  }
  else {
  #Access session.
  session_start();

  #Redirect if not logged in.
  if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
  }

#Open database connection
require('includes/connect_db.php');

# Get the user's ID from the session
$user_id = $_SESSION['user_id'];

# Retrieve user info from the 'users' database table
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  # Redirect if the user's permissions are 'blocked'
  if ($row['permissions'] === 'blocked') {
    header('Location: index.php');
    exit();
  }
}

    echo'<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php"><h4>WEBFLIX</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <img src="';?><?php echo $row['avatar']; ?><?php echo'" class="avatar-mini" alt="Avatar">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Hello,';?>
          <?php echo "{$_SESSION['first_name']} {$_SESSION['last_name']}"; ?>
        <?php
        echo'</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="user.php">Account details</a>
          <a class="dropdown-item" href="my_reviews.php">Review history</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>

        <li class="nav-item">
        <a class="nav-link active" href="coming_soon.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="subscription.php">Subscriptions</a>
      </li>
      </li>
    </ul>

  
    <form class="d-flex" role="search" method="GET" action="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <!-- <button class="btn btn-sm btn-outline-secondary" type="submit">Search</button> -->
    </form>
  </div>
</nav>
<br />';

# Open database connection
require('includes/connect_db.php');

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
      header("Location: $url");
      exit();
    }
    while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
      $url = 'tvshow.php?id=' . $row['tvshow_id'];
      header("Location: $url");
      exit();
    }
    echo '</ul>';
  } else {
    echo '<center>No results found.</center>';
  }
}

# Close database connection.
mysqli_close($link);
  }
?>