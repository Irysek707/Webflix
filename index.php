<title>Webflix</title>
<script src="script.js"></script>

<?php

#Set page title and display header section
include('includes/logout.php');

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