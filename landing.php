<title>Webflix</title>
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

#Set page title and display header section
$page_title = 'Home';

echo '<br><div class="container"><img src="img/logo2.png"></div><br/>';

#Open database connection
require('includes/connect_db.php');

echo('
	<h1>Welcome to our website!</h1>
	<p>Please either register or login to continue:</p>
	<a href="login.php"><button
                    class="btn btn-dark" type="button">Login</button></a>
	</form>
	<a href="register.php"><button type="button"
            class="btn btn-dark">Register</button></a>
	</form>'
);

#Display footer section
include('includes/footer.php');

?>
