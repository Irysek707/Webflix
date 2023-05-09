<title>Webflix</title>

<?php

#Set page title and display header section
include('includes/logout.php');


# Get the user's ID from the session
$user_id = $_SESSION['user_id'];

# Retrieve user info from the 'users' database table
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  # Redirect if the user's permissions are 'blocked'
  if ($row['permissions'] === 'blocked') {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>You are Blocked</strong> Your access to this page is blocked.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  }
}

echo '<div class="container"><h1 style="font-size: 5rem;">Welcome to Webflix</h1></div><br/>';

// Action 
include('action.php');

// Comedy 
include('comedy.php');

// Crime 
include('crime.php');

// Documentary 
include('documentary.php');

// Drama 
include('drama.php');

// Fantasy 
include('fantasy.php');

// Horror 
include('horror.php');

// Romance 
include('romance.php');

// Science Fiction 
include('sciencefiction.php');

// Thriller 
include('thriller.php');

// TC Show 
include('tvshowdisplay.php');

#Display footer section
include('includes/footer.php');

?>