<?php
#DISPLAY COMPLETE LOGGED IN PAGE
#Access session
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
  require('login_tools.php');
  load();
}

include('includes/logout.php');

#Access session
session_start();

#Open database connection
require('includes/connect_db.php');

#Get user_id from session
$user_id = $_SESSION['user_id'];

# Retrieve user info from 'users' database table.
$q = "SELECT * FROM users WHERE user_id={$user_id}";
$r = mysqli_query($link, $q);
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

?>
<div class="wrapper">
  <div class="container movie-view">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          <div class="avatar-container">
  <img src="<?php echo $row['avatar']; ?>" class="img-fluid mb-3 avatar" alt="Avatar">
  <div class="overlay">
    <button class="change-avatar-btn">Change Avatar</button>
  </div>
</div>

            <h3 class="card-title">
              <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
            </h3>
            <p class="card-text">
              <?php echo $row['email']; ?>
            </p>
            <p class="card-text">
              <?php echo $row['dob']; ?>
            </p>
            <p class="card-text">
              <?php echo $row['contact_number']; ?>
            </p>
            <p class="card-text">
              <?php echo $row['country']; ?>
            </p>
            <a href="change_password.php" class="btn btn-primary">Change Password</a>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <div class="tabs">
              <button class="tablink active btn" onclick="openTab('account-details')">Account Details</button>
              <button class="tablink btn" onclick="openTab('my-list')">My List</button>
              <button class="tablink btn" onclick="openTab('my-reviews')">My Reviews</button>

              <div id="account-details" class="tabcontent" style="display:block;">
              <h2>Account Details</h2>
                <!-- Add account details content here -->


                <h3 class="card-title">Subscription Status</h3>
              </div>

              <div id="my-list" class="tabcontent">
              <br/><h2>My List</h2>
                <!-- Add My List content here -->
              </div>

              <div id="my-reviews" class="tabcontent">
              <br/><h2>My Reviews</h2>
                <!-- Add My Reviews content here -->
              </div>
            </div>
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

<script>
  function openTab(tabName) {
    var i;
    var x = document.getElementsByClassName("tabcontent");
    var tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");
  }

  document.addEventListener("DOMContentLoaded", function (event) {
    openTab('account-details');
  });
</script>

<?php
# Close database connection.
mysqli_close($link);

include('includes/footer.php');
?>