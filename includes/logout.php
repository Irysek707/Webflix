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
    require('login_tools.php');
    load();
  }
  ?>

<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="index.php" style="font-family: 'Anton', sans-serif;"><img class="icon"
      src="img/logo2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Hello,
          <?php echo "{$_SESSION['first_name']} {$_SESSION['last_name']}"; ?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="user.php">Account details</a>
          <a class="dropdown-item" href="my_reviews.php">Review history</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>

        <li class="nav-item">
        <a class="nav-link active" href="coming_soon.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="all_titles.php">Subscriptions</a>
      </li>
      </li>
    </ul>
  </div>
</nav>
<br />