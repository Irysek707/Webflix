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
                  <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                  <label for="pass">Password:</label>
                  <input type="password" name="pass" id="pass" class="form-control" value="<?php echo $row['pass']; ?>">
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
        <button type="button" class="btn btn-secondary" onclick="openGenreModal(\'' . $row['genre_name'] . '\', \'' . $row['genre_description'] . '\')">Edit</button>
      </td>';
              echo '<td>
        <button type="button" class="btn btn-secondary" onclick="openDeleteGenreModal(\'' . $row['genre_name'] . '\')">Delete</button>
      </td>';
              echo '</tr>';
            }

            // Close the table
            echo '</tbody></table>';
          } else {
            echo 'No data found in the genre table.';
          }
          ?>

          <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add-genre-modal">Add genre</button>
        </div>
      </div>

      <script>
        function openGenreModal(oldGenreName, genreDescription) {
          var modal = document.getElementById('change-genre-details');
          var oldGenreNameInput = modal.querySelector('[name="old_genre_name"]');
          var newGenreNameInput = modal.querySelector('[name="new_genre_name"]');
          var genreDescriptionInput = modal.querySelector('[name="genre_description"]');

          oldGenreNameInput.value = oldGenreName;
          newGenreNameInput.value = oldGenreName; // Set the new genre name to the old genre name initially
          genreDescriptionInput.value = genreDescription;

          $('#change-genre-details').modal('show');
        }

        function openDeleteGenreModal(genreName) {
          var deleteModal = document.getElementById('deleteGenreModal');
          var genreNameInput = deleteModal.querySelector('[name="genre_name"]');

          genreNameInput.value = genreName;

          $('#deleteGenreModal').modal('show');
        }
      </script>


      <!-- Add Genre Modal -->
      <div class="modal fade" id="add-genre-modal" tabindex="-1" role="dialog" aria-labelledby="add-genre-modal-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="add-genre-modal-label">Add genre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="add_genre.php">
                <label for="genre_name">Genre Name:</label>
                <input type="text" name="genre_name" id="genre_name" class="form-control">

                <label for="genre_description">Genre Description:</label>
                <input type="text" name="genre_description" id="genre_description" class="form-control">

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <input type="submit" name="btnChangeName" class="btn btn-primary" value="Save Changes">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>



      <!-- Delete Genre Modals -->
      <div class="modal fade" id="deleteGenreModal" tabindex="-1" role="dialog" aria-labelledby="deleteGenreModal-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteGenreModal-label">Delete genre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="delete_genre.php" method="post">
                <input type="hidden" name="genre_name" value="<?php echo $row['genre_name']; ?>">
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
      <div class="modal fade" id="change-genre-details" tabindex="-1" role="dialog"
        aria-labelledby="change-genre-details-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="change-genre-details-label">Change Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="edit_genre.php" method="post">
                <div class="form-group">
                  <input type="hidden" name="old_genre_name" id="old_genre_name" class="form-control"
                    value="<?php echo $row['genre_name']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="new_genre_name">New Genre Name:</label>
                  <input type="text" name="new_genre_name" id="new_genre_name" class="form-control"
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

      <?php
      // Retrieve data from the movie_stream table
      $query2 = "SELECT * FROM movie_stream";
      $result2 = mysqli_query($link, $query2);

      // Check if any rows were returned
      if (mysqli_num_rows($result2) > 0) {
        // Create the HTML table structure
        echo '<table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
        <th scope="col">Genre Name</th>
          <th scope="col">Movie Title</th>
          <th scope="col">Description</th>
          <th scope="col">Trailer</th>
          <th scope="col">Stream</th>
          <th scope="col">Image</th>
          <th scope="col">Release Year</th>
          <th scope="col">Language</th>
          <th scope="col">Duration</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>';

        // Loop through each row of data
        while ($row = mysqli_fetch_assoc($result2)) {
          echo '<tr>';
          echo '<th scope="row">' . $row['genre_name'] . '</th>';
          echo '<td>' . $row['movie_title'] . '</td>';
          echo '<td>' . $row['movie_description'] . '</td>';
          echo '<td>' . $row['movie_trailer'] . '</td>';
          echo '<td>' . $row['movie_stream'] . '</td>';
          echo '<td>' . $row['img'] . '</td>';
          echo '<td>' . $row['release_year'] . '</td>';
          echo '<td>' . $row['language'] . '</td>';
          echo '<td>' . $row['duration'] . '</td>';
          echo '<td>
        <button type="button" class="btn btn-secondary" onclick="openMovieModal(\'' . $row['id'] . '\', \'' . $row['genre_name'] . '\', 
        \'' . $row['movie_title'] . '\', \'' . $row['movie_description'] . '\', \'' . $row['movie_trailer'] . '\', \'' . $row['movie_stream'] . '\',
        \'' . $row['img'] . '\', \'' . $row['release_year'] . '\', \'' . $row['language'] . '\', \'' . $row['duration'] . '\')">Edit</button>
      </td>';
          echo '<td>
        <button type="button" class="btn btn-secondary" onclick="openDeleteMovieModal(\'' . $row['id'] . '\')">Delete</button>
      </td>';
          echo '</tr>';
        }

        // Close the table
        echo '</tbody></table>';
      } else {
        echo 'No data found in the movie_stream table.';
      }
      ?>

      <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add-movie-modal">Add movie</button>
    </div>
  </div>

  <script>
    function openMovieModal(id, genreName, movieTitle, movieDescription, movieTrailer, movieStream, img, releaseYear, language, duration) {
      var modal = document.getElementById('change-movie-details');
      var idInput = modal.querySelector('[name="id"]');
      var genreNameInput = modal.querySelector('[name="genre_name"]');
      var movieTitleInput = modal.querySelector('[name="movie_title"]');
      var movieDescriptionInput = modal.querySelector('[name="movie_description"]');
      var movieTrailerInput = modal.querySelector('[name="movie_trailer"]');
      var movieStreamInput = modal.querySelector('[name="movie_stream"]');
      var imgInput = modal.querySelector('[name="img"]');
      var releaseYearInput = modal.querySelector('[name="release_year"]');
      var languageInput = modal.querySelector('[name="language"]');
      var durationInput = modal.querySelector('[name="duration"]');

      idInput.value = id;
      genreNameInput.value = genreName;
      movieTitleInput.value = movieTitle;
      movieDescriptionInput.value = movieDescription;
      movieTrailerInput.value = movieTrailer;
      movieStreamInput.value = movieStream;
      imgInput.value = img;
      releaseYearInput.value = releaseYear;
      languageInput.value = language;
      durationInput.value = duration;

      $('#change-movie-details').modal('show');
    }

    function openDeleteMovieModal(id) {
      var deleteModal = document.getElementById('deleteMovieModal');
      var idInput = deleteModal.querySelector('[name="id"]');

      idInput.value = id;

      $('#deleteMovieModal').modal('show');
    }
  </script>



  <!-- Add Movie Modal -->
  <div class="modal fade" id="add-movie-modal" tabindex="-1" role="dialog" aria-labelledby="add-movie-modal-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add-movie-modal-label">Add Movie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="add_movie.php" method="post">
            <div class="form-group">
              <label for="addMovieGenreInput">Genre Name:</label>
              <input type="text" name="genre_name" id="genre_name" class="form-control"
                value="<?php echo $row['genre_name']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieTitleInput">Title:</label>
              <input type="text" name="movie_title" id="movie_title" class="form-control"
                value="<?php echo $row['movie_title']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieDescriptionInput">Description:</label>
              <input type="text" name="movie_description" id="movie_description" class="form-control"
                value="<?php echo $row['movie_description']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieTrailerInput">Trailer:</label>
              <input type="text" name="movie_trailer" id="movie_trailer" class="form-control"
                value="<?php echo $row['movie_trailer']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieStreamInput">Stream:</label>
              <input type="text" name="movie_stream" id="movie_stream" class="form-control"
                value="<?php echo $row['movie_stream']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieImageInput">Image:</label>
              <input type="text" name="img" id="img" class="form-control" value="<?php echo $row['img']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieReleaseYearInput">Release Year:</label>
              <input type="number" name="release_year" id="release_year" class="form-control"
                value="<?php echo $row['release_year']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieLanguageInput">Language:</label>
              <input type="text" name="language" id="language" class="form-control"
                value="<?php echo $row['language']; ?>">
            </div>
            <div class="form-group">
              <label for="addMovieDurationInput">Duration:</label>
              <input type="number" name="duration" id="duration" class="form-control"
                value="<?php echo $row['duration']; ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <input type="submit" name="btnAddMovie" class="btn btn-primary" value="Add Movie">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Delete Movie Modal -->
  <div class="modal fade" id="deleteMovieModal" tabindex="-1" role="dialog" aria-labelledby="deleteMovieModal-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteMovieModal-label">Delete Movie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="delete_movie.php" method="post">
            <input type="hidden" name="id" id="deleteMovieInput" value="">
            <div class="form-group">
              <p>Are you sure you want to delete this movie?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <input type="submit" name="btnDeleteMovie" class="btn btn-primary" value="Delete">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Movie Modal -->
  <div class="modal fade" id="change-movie-details" tabindex="-1" role="dialog"
    aria-labelledby="change-movie-details-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="change-movie-details-label">Edit Movie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="edit_movie.php" method="post">
            <input type="hidden" name="id" id="editMovieIdInput" value="">
            <div class="form-group">
              <label for="editMovieGenreInput">Genre Name:</label>
              <input type="text" name="genre_name" id="editMovieGenreInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieTitleInput">Title:</label>
              <input type="text" name="movie_title" id="editMovieTitleInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieDescriptionInput">Description:</label>
              <input type="text" name="movie_description" id="editMovieDescriptionInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieTrailerInput">Trailer:</label>
              <input type="text" name="movie_trailer" id="editMovieTrailerInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieStreamInput">Stream:</label>
              <input type="text" name="movie_stream" id="editMovieStreamInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieImageInput">Image:</label>
              <input type="text" name="img" id="editMovieStreamInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieImageInput">Release Year:</label>
              <input type="number" name="release_year" id="editMovieStreamInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieImageInput">Language:</label>
              <input type="text" name="language" id="editMovieStreamInput" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="editMovieImageInput">Duration:</label>
              <input type="number" name="duration" id="editMovieStreamInput" class="form-control" value="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <input type="submit" name="btnChangeName" class="btn btn-primary" value="Save Changes">
            </div>


        </div>
      </div>
    </div>
  </div>

    <div id="shows" class="tabcontent">
      <br />
      <h2>Shows</h2><br />
      <!-- Add adashboard content here -->
      <div class="flex-container flex-cont">
      <?php
      // Retrieve data from the tv_show table
      $query3 = "SELECT * FROM tv_show";
      $result3 = mysqli_query($link, $query3);

      // Check if any rows were returned
      if (mysqli_num_rows($result3) > 0) {
        // Create the HTML table structure
        echo '<table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
        <th scope="col">Genre Name</th>
          <th scope="col">Show Title</th>
          <th scope="col">Description</th>
          <th scope="col">Trailer</th>
          <th scope="col">Image</th>
          <th scope="col">Release Year</th>
          <th scope="col">Language</th>
          <th scope="col">Seasons</th>
          <th scope="col">Episodes</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>';

        // Loop through each row of data
        while ($row = mysqli_fetch_assoc($result3)) {
          echo '<tr>';
          echo '<th scope="row">' . $row['genre_name'] . '</th>';
          echo '<td>' . $row['tvshow_title'] . '</td>';
          echo '<td>' . $row['tvshow_description'] . '</td>';
          echo '<td>' . $row['tvshow_trailer'] . '</td>';
          echo '<td>' . $row['img'] . '</td>';
          echo '<td>' . $row['release_year'] . '</td>';
          echo '<td>' . $row['language'] . '</td>';
          echo '<td>' . $row['num_seasons'] . '</td>';
          echo '<td>' . $row['number_of_episodes'] . '</td>';
          echo '<td>
        <button type="button" class="btn btn-secondary" onclick="openShowModal(\'' . $row['tvshow_id'] . '\', \'' . $row['genre_name'] . '\', 
        \'' . $row['tvshow_title'] . '\', \'' . $row['tvshow_description'] . '\', \'' . $row['tvshow_trailer'] . '\', \'' . $row['img'] . '\', 
        \'' . $row['release_year'] . '\', \'' . $row['language'] . '\', \'' . $row['num_seasons'] . '\', \'' . $row['number_of_episodes'] . '\')">Edit</button>
      </td>';
          echo '<td>
        <button type="button" class="btn btn-secondary" onclick="openDeleteShowModal(\'' . $row['tvshow_id'] . '\')">Delete</button>
      </td>';
          echo '</tr>';
        }

        // Close the table
        echo '</tbody></table>';
      } else {
        echo 'No data found in the tv_show table.';
      }
      ?>

      <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add-show-modal">Add show</button>
    </div>
  </div>

  <script>
function openShowModal(tvshowId, genreName, tvshowTitle, tvshowDescription, tvshowTrailer, img, releaseYear, language, seasons, episodes) {
  var modal = document.getElementById('change-show-details');
  var tvshowIdInput = modal.querySelector('[name="tvshow_id"]');
  var genreNameInput = modal.querySelector('[name="genre_name"]');
  var tvshowTitleInput = modal.querySelector('[name="tvshow_title"]');
  var tvshowDescriptionInput = modal.querySelector('[name="tvshow_description"]');
  var tvshowTrailerInput = modal.querySelector('[name="tvshow_trailer"]');
  var imgInput = modal.querySelector('[name="img"]');
  var releaseYearInput = modal.querySelector('[name="release_year"]');
  var languageInput = modal.querySelector('[name="language"]');
  var seasonsInput = modal.querySelector('[name="num_seasons"]');
  var episodesInput = modal.querySelector('[name="number_of_episodes"]');
  
  tvshowIdInput.value = tvshowId;
  genreNameInput.value = genreName;
  tvshowTitleInput.value = tvshowTitle;
  tvshowDescriptionInput.value = tvshowDescription;
  tvshowTrailerInput.value = tvshowTrailer;
  imgInput.value = img;
  releaseYearInput.value = releaseYear;
  languageInput.value = language;
  seasonsInput.value = seasons;
  episodesInput.value = episodes;

  $('#change-show-details').modal('show');
}

function openDeleteShowModal(tvshowId) {
  var deleteModal = document.getElementById('deleteShowModal');
  var tvshowIdInput = deleteModal.querySelector('[name="tvshow_id"]');

  tvshowIdInput.value = tvshowId;

  $('#deleteShowModal').modal('show');
}
</script>




  <!-- Add Show Modal -->
  <div class="modal fade" id="addShowModal" tabindex="-1" role="dialog" aria-labelledby="add-show-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-show-modal-label">Add Show</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_show.php" method="post">
          <div class="form-group">
            <label for="addShowGenreInput">Genre Name:</label>
            <input type="text" name="genre_name" id="genre_name" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowTitleInput">Title:</label>
            <input type="text" name="tvshow_title" id="tvshow_title" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowDescriptionInput">Description:</label>
            <input type="text" name="tvshow_description" id="tvshow_description" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowTrailerInput">Trailer:</label>
            <input type="text" name="tvshow_trailer" id="tvshow_trailer" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowImageInput">Image:</label>
            <input type="text" name="img" id="img" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowReleaseYearInput">Release Year:</label>
            <input type="number" name="release_year" id="release_year" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowLanguageInput">Language:</label>
            <input type="text" name="language" id="language" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowSeasonsInput">Seasons:</label>
            <input type="number" name="num_seasons" id="num_seasons" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="addShowEpisodesInput">Episodes:</label>
            <input type="number" name="number_of_episodes" id="number_of_episodes" class="form-control" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" name="btnAddShow" class="btn btn-primary" value="Add Show">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



  <!-- Delete Show Modal -->
<div class="modal fade" id="deleteShowModal" tabindex="-1" role="dialog" aria-labelledby="deleteShowModal-label"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteShowModal-label">Delete Show</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="delete_show.php" method="post">
          <input type="hidden" name="tvshow_id" id="delete-tvshow-id" value="">
          <div class="form-group">
            <p>Are you sure you want to delete this show?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" name="btnDeleteShow" class="btn btn-primary" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


  <!-- Edit Show Modal -->
<div class="modal fade" id="change-show-details" tabindex="-1" role="dialog"
  aria-labelledby="change-show-details-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="change-show-details-label">Edit Show</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="edit_show.php" method="post">
          <input type="hidden" name="tvshow_id" id="editShowIdInput" value="">
          <div class="form-group">
            <label for="editShowGenreInput">Genre Name:</label>
            <input type="text" name="genre_name" id="editShowGenreInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowTitleInput">Title:</label>
            <input type="text" name="tvshow_title" id="editShowTitleInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowDescriptionInput">Description:</label>
            <input type="text" name="tvshow_description" id="editShowDescriptionInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowTrailerInput">Trailer:</label>
            <input type="text" name="tvshow_trailer" id="editShowTrailerInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowImageInput">Image:</label>
            <input type="text" name="img" id="editShowImageInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowReleaseYearInput">Release Year:</label>
            <input type="number" name="release_year" id="editShowReleaseYearInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowLanguageInput">Language:</label>
            <input type="text" name="language" id="editShowLanguageInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowSeasonsInput">Seasons:</label>
            <input type="number" name="num_seasons" id="editShowSeasonsInput" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="editShowEpisodesInput">Episodes:</label>
            <input type="number" name="number_of_episodes" id="editShowEpisodesInput" class="form-control" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" name="btnChangeDetails" class="btn btn-primary" value="Save Changes">
          </div>
        </form>
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