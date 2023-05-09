<title>Webflix | Admin panel</title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">



<link rel="icon" type="image/png" href="img/favicon.png">


<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

echo '<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h4>WEBFLIX</h4></a>
      <form class="d-flex">
      <a href="admin_logout.php"><button class="btn btn2 btn-dark btn-outline-dark" type="button">Logout</button></a>
      </form>
    </div>
    </nav>
            <br/>';


#Open database connection
require('includes/connect_db.php');

?>

<div class="wrapper">
  <div class="container movie-view">

    <div class="card">
      <div class="card-body">
        <div class="tabs2">
          <button class="tablink2 active btn btn-secondary" onclick="openTab('dashboard')">Dashboard</button>
          <button class="tablink2 btn btn-secondary" onclick="openTab('users')">Users</button>
          <button class="tablink2 btn btn-secondary" onclick="openTab('genres')">Genres</button>
          <button class="tablink2 btn btn-secondary" onclick="openTab('movies')">Movies</button>
          <button class="tablink2 btn btn-secondary" onclick="openTab('shows')">Shows</button>

          <div id="dashboard" class="tabcontent" style="display:block;">
            <br />
            <h2>Dashboard</h2><br />
            <!-- Add adashboard content here -->
            <div class="flex-container flex-cont">
              Welcome to admin panel of Webflix!
            </div>
          </div>

          <div id="users" class="tabcontent">
            <br />
            <h2>Users</h2><br />
            <!-- Add adashboard content here -->
            <div class="flex-container flex-cont">

              <?php

              // Retrieve data from the users table
              $query = "SELECT * FROM users";
              $result = mysqli_query($link, $query);

              // Check if any rows were returned
              if (mysqli_num_rows($result) > 0) {
                // Create the HTML table structure
                echo '<table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Email</th>
          <th scope="col">Registration Date</th>
          <th scope="col">Date of Birth</th>
          <th scope="col">Contact</th>
          <th scope="col">Country</th>
          <th scope="col">Permissions</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>';

                // Loop through each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<th scope="row">' . $row['user_id'] . '</th>';
                  echo '<td>' . $row['first_name'] . '</td>';
                  echo '<td>' . $row['last_name'] . '</td>';
                  echo '<td>' . $row['email'] . '</td>';
                  echo '<td>' . $row['reg_date'] . '</td>';
                  echo '<td>' . $row['dob'] . '</td>';
                  echo '<td>' . $row['contact_number'] . '</td>';
                  echo '<td>' . $row['country'] . '</td>';
                  echo '<td>' . $row['permissions'] . '</td>';
                  echo '<td>
    <button type="button" class="btn btn-secondary" onclick="openModal(' . $row['user_id'] . ', \'' . $row['first_name'] . '\', \'' . $row['last_name'] . '\', \'' . $row['email'] . '\',
    \'' . $row['pass'] . '\', \'' . $row['dob'] . '\', \'' . $row['contact_number'] . '\', \'' . $row['country'] . '\', \'' . $row['permissions'] . '\')">Edit</button>
  </td>';
                  echo '<td>
    <button type="button" class="btn btn-secondary" onclick="openDeleteModal(' . $row['user_id'] . ', \'' . $row['first_name'] . '\', \'' . $row['last_name'] . '\')">Delete</button>
  </td>';

                  echo '</tr>';
                }

                // Close the table
                echo '</tbody></table>';
              } else {
                echo 'No data found in the users table.';
              }

              ?>
            </div>
          </div>

          <script>
            function openModal(userId, firstName, lastName, email, pass, dob, contactNumber, country, permissions) {
              var modal = document.getElementById('change-details');
              var userIdInput = modal.querySelector('[name="user_id"]');
              var firstNameInput = modal.querySelector('[name="first_name"]');
              var lastNameInput = modal.querySelector('[name="last_name"]');
              var emailInput = modal.querySelector('[name="email"]');
              var passInput = modal.querySelector('[name="pass"]');
              var dobInput = modal.querySelector('[name="dob"]');
              var contactNumberInput = modal.querySelector('[name="contact_number"]');
              var countryInput = modal.querySelector('[name="country"]');
              var permissionsInput = modal.querySelector('[name="permissions"]');

              userIdInput.value = userId;
              firstNameInput.value = firstName;
              lastNameInput.value = lastName;
              emailInput.value = email;
              passInput.value = pass;
              dobInput.value = dob;
              contactNumberInput.value = contactNumber;
              countryInput.value = country;
              permissionsInput.value = permissions;

              $('#change-details').modal('show');
            }


            function openDeleteModal(userId) {
              var deleteModal = document.getElementById('deleteModal');
              var userIdInput = deleteModal.querySelector('[name="user_id"]');

              userIdInput.value = userId;

              $('#deleteModal').modal('show');
            }
          </script>

          <!-- Delete Modals -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal-label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModal-label">Delete user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="delete_user.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <div class="form-group">
                      Do you really want to delete this user?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <input type="submit" name="btnChangeName" class="btn btn-primary" value="Delete">
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>


          <!-- Change Details Modal -->
          <div class="modal fade" id="change-details" tabindex="-1" role="dialog" aria-labelledby="change-details-label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="change-details-label">Change Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="edit_user.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <div class="form-group">
                      <label for="first-name">First Name:</label>
                      <input type="text" name="first_name" id="first-name" class="form-control"
                        value="<?php echo $row['first_name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="last-name">Last Name:</label>
                      <input type="text" name="last_name" id="last-name" class="form-control"
                        value="<?php echo $row['last_name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" name="email" id="email" class="form-control"
                        value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="pass">Password:</label>
                      <input type="password" name="pass" id="pass" class="form-control"
                        value="<?php echo $row['pass']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="dob">Date of birth:</label>
                      <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="contact_number">Contact number:</label>
                      <input type="number" name="contact_number" id="contact_number" class="form-control"
                        value="<?php echo $row['contact_number']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="country">Country:</label>
                      <select name="country" id="country" class="form-control" value="<?php echo $row['country']; ?>">
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
                      <label for="permissions">Permissions:</label>
                      <select name="permissions" id="permissions" class="form-control"
                        value="<?php echo $row['permissions']; ?>">
                        <?php
                        $permissions = array(
                          "registered",
                          "blocked"
                        );

                        foreach ($permissions as $permission) {
                          echo "<option value=\"" . $permission . "\">" . $permission . "</option>";
                        }
                        ?>
                      </select>
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

          <div id="genres" class="tabcontent">
            <br />
            <h2>Genres</h2><br />
            <!-- Add adashboard content here -->
            <div class="flex-container flex-cont">
            
            <?php

              // Retrieve data from the users table
              $query1 = "SELECT * FROM genre";
              $result1 = mysqli_query($link, $query1);

              // Check if any rows were returned
              if (mysqli_num_rows($result1) > 0) {
                // Create the HTML table structure
                echo '<table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Genre Name</th>
          <th scope="col">Description</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>';

                // Loop through each row of data
                while ($row = mysqli_fetch_assoc($result1)) {
                  echo '<tr>';
                  echo '<th scope="row">' . $row['genre_name'] . '</th>';
                  echo '<td>' . $row['genre_description'] . '</td>';
                  echo '<td>
    <button type="button" class="btn btn-secondary" onclick="openGenreModal(' . $row['genre_name'] . ', \'' . $row['genre_description'] . '\')">Edit</button>
  </td>';
                  echo '<td>
    <button type="button" class="btn btn-secondary" onclick="openDeleteGenreModal(' . $row['genre_name'] . ')">Delete</button>
  </td>';

                  echo '</tr>';
                }

                // Close the table
                echo '</tbody></table>';
              } else {
                echo 'No data found in the genre table.';
              }

              ?>
            </div>
          </div>

<script>
  function openGenreModal(genreName, genreDescription) {
    var genreModal = document.getElementById('genre-edit');
    var genreNameInput = genreModal.querySelector('[name="genre_name"]');
    var genreDescriptionInput = genreModal.querySelector('[name="genre_description"]');

    genreNameInput.value = genreName;
    genreDescriptionInput.value = genreDescription;

    $('#genre-edit').modal('show');
  }


  function openDeleteGenreModal(userId) {
    var deleteGenreModal = document.getElementById('delete-genre-modal');
    var genreNameInput = deleteGenreModal.querySelector('[name="genre_name"]');

    genreNameInput.value = genreName;

    $('#delete-genre-modal').modal('show');
  }
</script>

<!-- Delete Genre Modals -->
<div class="modal fade" id="delete-genre-modal" tabindex="-1" role="dialog" aria-labelledby="delete-genre-modal-label"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-genre-modal-label">Delete genre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="delete_genre.php" method="post">
          <input type="hidden" name="ganre_name" value="<?php echo $row['genre_name']; ?>">
          <div class="form-group">
            Do you really want to delete this genre?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" name="btnChangeName" class="btn btn-primary" value="Delete">
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Change Genre Modal -->
<div class="modal fade" id="genre-edit" tabindex="-1" role="dialog" aria-labelledby="genre-edit-label"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="genre-edit-label">Change Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="edit_genre.php" method="post">
          <div class="form-group">
            <label for="genre_name">Genre Name:</label>
            <input type="text" name="genre_name" id="genre-name" class="form-control"
              value="<?php echo $row['genre_name']; ?>">
          </div>
          <div class="form-group">
            <label for="genre_description">Description:</label>
            <input type="text" name="genre_description" id="genre_description" class="form-control"
              value="<?php echo $row['genre_description']; ?>">
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




            </div>
          </div>

          <div id="movies" class="tabcontent">
            <br />
            <h2>Movies</h2><br />
            <!-- Add adashboard content here -->
            <div class="flex-container flex-cont">
              hhh
            </div>
          </div>

          <div id="shows" class="tabcontent">
            <br />
            <h2>Shows</h2><br />
            <!-- Add adashboard content here -->
            <div class="flex-container flex-cont">
              hhh
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
    openTab('dashboard');
  });
</script>


<?php
# Close database connection.
mysqli_close($link);
?>