<title>Webflix | User profile</title>
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
            <div class="avatar-wrapper">
              <img src="<?php echo $row['avatar']; ?>" class="img-fluid mb-3 avatar" alt="Avatar">
              <div class="overlay">
                <button class="btn btn-secondary change-avatar-btn" data-toggle="modal"
                  data-target="#change-avatar-modal">Change Avatar</button>
              </div>
            </div>

            <div class="modal fade" id="change-avatar-modal" tabindex="-1" role="dialog"
              aria-labelledby="change-avatar-modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="change_avatar.php" method="post">
                      <div class="form-group">
                        <label for="avatar-url">Avatar URL:</label>
                        <input type="url" name="avatar-url" id="avatar-url" class="form-control" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="btnChangeAvatar" class="btn btn-primary" value="Save Changes">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <h3 class="card-title">
              <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
            </h3>
            <p class="card-text">
              <?php echo $row['email']; ?>
            </p>
            <button class="btn btn-secondary change-password-btn" data-toggle="modal"
              data-target="#change-password-modal">Change Password</button>

            <!-- Change password Modal -->
            <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog"
              aria-labelledby="change-password-modal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="change_password.php" method="post">
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="current-password">Current Password:</label>
                        <input type="password" name="current-password" id="current-password" class="form-control"
                          required>
                      </div>
                      <div class="form-group">
                        <label for="new-password">New Password:</label>
                        <input type="password" name="new-password" id="new-password" class="form-control" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="btnChangePassword" class="btn btn-primary" value="Save Changes">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <div class="tabs">
              <button class="tablink active btn btn-secondary" onclick="openTab('account-details')">Account
                Details</button>
              <button class="tablink btn btn-secondary" onclick="openTab('my-list')">My List</button>
              <button class="tablink btn btn-secondary" onclick="openTab('my-reviews')">My Reviews</button>

              <div id="account-details" class="tabcontent" style="display:block;">
                <br />
                <h2>Account Details</h2><br />
                <!-- Add account details content here -->
                <div class="flex-container flex-cont">
                  <p class="card-text">
                    <strong>Name:</strong>
                    <?php echo $row['first_name']; ?>
                    <?php echo $row['last_name']; ?>
                    <button class="btn btn-secondary btn-sm" data-toggle="modal"
                      data-target="#change-name-modal">Edit</button>
                  </p>
                  <p class="card-text">
                    <strong>Email:</strong>
                    <?php echo $row['email']; ?>
                    <button class="btn btn-secondary btn-sm" data-toggle="modal"
                      data-target="#email-modal">Edit</button>

                  </p>
                  <p class="card-text">
                    <strong>Date of birth:</strong>
                    <?php echo $row['dob']; ?>
                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#dob-modal">Edit</button>
                  </p>
                  <p class="card-text">
                    <strong>Contact:</strong>
                    <?php echo $row['contact_number']; ?>
                    <button class="btn btn-secondary btn-sm" data-toggle="modal"
                      data-target="#changeContactModal">Edit</button>
                  </p>
                  <p class="card-text">
                    <strong>Country:</strong>
                    <?php echo $row['country']; ?>
                    <button class="btn btn-secondary btn-sm" data-toggle="modal"
                      data-target="#changeCountryModal">Edit</button>
                  </p>

                  <br />
                  <h3 class="card-title">Subscription Status</h3><br />
                  <?php

                  # Retrieve items from 'users' database table.
                  $q = "SELECT * FROM subscriptions WHERE user_id={$_SESSION[user_id]}";
                  $r = mysqli_query($link, $q);


                  if (mysqli_num_rows($r) > 0) {

                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                      echo '<p><strong>Subscription status:</strong> ' . $row['status'] . ' </p>';

                      if ($row['status'] == "active") {

                        echo '<p><strong>Next payment due:</strong> ' . $row['expiration_date'] . ' </p>';
                      } else {
                        echo '<a href="subscription.php" style="text-decoration: none !important"><button type="button" class="btn btn-dark btn-block">Subscribe now</button></a>';
                      }
                    }

                  } else {
                    echo '<p><strong>Subscription status:</strong> inactive </p>
			              <a href="subscription.php" style="text-decoration: none !important"><button type="button" class="btn btn-dark btn-block">Subscribe now</button></a>';

                  }
                  ?>

                </div>

                <!-- Change Name Modal -->
                <div class="modal fade" id="change-name-modal" tabindex="-1" role="dialog"
                  aria-labelledby="change-name-modal-label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="change-name-modal-label">Change Name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="change_name.php" method="post">
                          <div class="form-group">
                            <label for="first-name">First Name:</label>
                            <input type="text" name="first-name" id="first-name" class="form-control"
                              value="<?php echo $row['first_name']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="last-name">Last Name:</label>
                            <input type="text" name="last-name" id="last-name" class="form-control"
                              value="<?php echo $row['last_name']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="btnChangeName" class="btn btn-primary" value="Save Changes">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Change Email Modal -->
                <div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="email-modal-label"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="email-modal-label">Change Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="change_email.php" method="post">
                          <div class="form-group">
                            <label for="current-email">Current Email:</label>
                            <input type="email" name="current-email" id="current-email" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="new-email">New Email:</label>
                            <input type="email" name="new-email" id="new-email" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Change DOB Modal -->
                <div class="modal fade" id="dob-modal" tabindex="-1" role="dialog"
                  aria-labelledby="change-dob-modal-label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="change-dob-modal-label">Change Date of Birth</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="change_dob.php" method="post">
                          <div class="form-group">
                            <label for="dob">New Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                          </div>
                          <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Change Contact Modal -->
              <div class="modal fade" id="changeContactModal" tabindex="-1" role="dialog"
                aria-labelledby="changeContactModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="changeContactModalLabel">Change Contact Number</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="change_contact.php" method="post">
                        <div class="form-group">
                          <label for="current-contact-number" class="col-form-label">Current Contact Number:</label>
                          <input type="text" class="form-control" id="current-contact-number"
                            name="current-contact-number" required>
                        </div>
                        <div class="form-group">
                          <label for="new-contact-number" class="col-form-label">New Contact Number:</label>
                          <input type="text" class="form-control" id="new-contact-number" name="new-contact-number">
                        </div>
                        <div class="form-group">
                          <label for="password" class="col-form-label">Password:</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Change Country Modal -->
              <div class="modal fade" id="changeCountryModal" tabindex="-1" aria-labelledby="changeCountryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="changeCountryModalLabel">Change Country</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="change_country.php" method="post">
                        <div class="form-group">
                          <label for="newCountry">New Country</label>
                          <select class="form-control" placeholder="Country" aria-label="Country" name="country" id="country">
          <?php
          $countries = array(
            "United Kingdom",
            "Argentina",
            "Australia",
            "Belgium",
            "Brazil",
            "Canada",
            "Chile",
            "China",
            "Colombia",
            "Denmark",
            "Egypt",
            "Finland",
            "France",
            "Germany",
            "Ghana",
            "India",
            "Italy",
            "Japan",
            "Kenya",
            "Mexico",
            "Morocco",
            "Netherlands",
            "New Zealand",
            "Nigeria",
            "Norway",
            "Peru",
            "Poland",
            "Portugal",
            "Russia",
            "South Africa",
            "South Korea",
            "Spain",
            "Sweden",
            "Switzerland",
            "Tunisia",
            "United States"
          );

          foreach ($countries as $country) {
            echo "<option value=\"" . $country . "\">" . $country . "</option>";
          }
          ?>
        </select>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div id="my-list" class="tabcontent">
                <br />
                <h2>My List</h2>
                <!-- Add My List content here -->
              </div>

              <div id="my-reviews" class="tabcontent">
                <br />
                <h2>My Reviews</h2><br />
                <div class="container">
                <?php
                  # Retrieve items from 'mov-review' database table.
                  $a = "SELECT * FROM mov_rev WHERE id=$user_id ORDER BY post_date DESC";

                  $b = mysqli_query($link, $a);
                  if (mysqli_num_rows($b) > 0) {
                  echo '<h3>Movie reviews</h3><div class="container">';
                  while ($row = mysqli_fetch_array($b, MYSQLI_ASSOC)) {
                  echo '<div class="alert alert-dark" role="alert">
                          <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
                          <p>Rating:  ' . $row['rate'] . ' &#9734</p>
                          <p>' . $row['message'] . '</p>
                          <hr>
                          <footer class="blockquote-footer">
                          <cite title="Source Title"> ' . $row['post_date'] . '</cite>
                          <br><br>
                          <button type="button" class="btn btn-light btn-block">
                          <a href="delete_post.php?post_id=' . $row['post_id'] . '"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
                          </footer>
                          </button>
                        </div>';
                  }
                  } else {
                  echo '<h3>Movie reviews</h3><div class="container">
                          <br>
                          <p>You have no movie reviews.</p>
                          </div>';
                    }
                ?>
                </div>

                
                <div class="container">
                <?php
                  # Retrieve items from 'tv-review' database table.
                  $c = "SELECT * FROM tv_rev WHERE id=$user_id ORDER BY post_date DESC";

                  $d = mysqli_query($link, $c);
                  if (mysqli_num_rows($d) > 0) {
                  echo '<h3>TV Show reviews</h3><div class="container">';
                  while ($row = mysqli_fetch_array($d, MYSQLI_ASSOC)) {
                  echo '<div class="alert alert-dark" role="alert">
                          <h4 class="alert-heading">' . $row['tvshow_title'] . '  </h4>
                          <p>Rating:  ' . $row['rate'] . ' &#9734</p>
                          <p>' . $row['message'] . '</p>
                          <hr>
                          <footer class="blockquote-footer">
                          <cite title="Source Title"> ' . $row['post_date'] . '</cite>
                          <br><br>
                          <button type="button" class="btn btn-light btn-block">
                          <a href="delete_post.php?post_id=' . $row['post_id'] . '"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
                          </footer>
                          </button>
                        </div>';
                  }
                  } else {
                  echo '<h3>TV Show reviews</h3><div class="container">
                          <br>
                          <p>You have no show reviews.</p>
                          </div>';
                    }
                ?>
                </div>
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

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