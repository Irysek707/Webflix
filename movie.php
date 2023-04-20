<title>ECinema | Movie</title>

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
	while($row = $r->fetch_assoc()) {
		// Check user subscription
		$subscribed = true; // Replace with actual check

		echo "<tr>";
		echo "<td>" . $row["id"] . "</td>";
		echo "<td>" . $row["movie_title"] . "</td>";
		echo "<td><iframe width='300' height='200' src='" . $row["movie_trailer"] . "'></iframe></td>";

		// Display stream or subscribe button
		if ($subscribed) {
			echo "<td><a href='" . $row["movie_stream"] . "'>Watch Now</a></td>";
		} else {
			echo "<td><button class='btn'>Subscribe</button></td>";
		}

		echo "<td><img src='" . $row["img"] . "' alt='" . $row["movie_title"] . "'></td>";
		echo "</tr>";
	}
}


# Close database connection.
mysqli_close($link);
?>