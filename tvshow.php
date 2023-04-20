<title>ECinema | TV Show</title>

<?php #DISPLAY COMPLETE LOGGED IN PAGE
#Access session
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
	require('login_tools.php');
	load();
}

#Set page title and display header section
$page_title = 'TV Show';
include('includes/logout.php');

#Get passed product id and assign it to a variable.
if (isset($_GET['id']))
	$id = $_GET['id'];
else
	die("Error: TV show ID not specified.");

#Open database connection
require('includes/connect_db.php');

#Retrive selective item data from 'tv_show' database table.
$q = "SELECT * FROM tv_show WHERE tvshow_id = $id";
$r = mysqli_query($link, $q);

// Check if there are any rows returned by the query
if ($r->num_rows > 0) {
	// Display tv show details
	echo "<table>";
	while($row = $r->fetch_assoc()) {
		// Check user subscription
		$subscribed = true; // Replace with actual check

		echo "<tr>";
		echo "<td>" . $row["tvshow_id"] . "</td>";
		echo "<td>" . $row["tvshow_title"] . "</td>";
		echo "<td><iframe width='300' height='200' src='" . $row["tvshow_trailer"] . "'></iframe></td>";

		// Display stream or subscribe button
		if ($subscribed) {
			echo "<td><a href='" . $row["tvshow_trailer"] . "'>Watch Now</a></td>";
		} else {
			echo "<td><button class='btn'>Subscribe</button></td>";
		}

		echo "<td><img src='" . $row["img"] . "' alt='" . $row["tvshow_title"] . "'></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	die("Error: TV show not found.");
}

# Close database connection.
mysqli_close($link);
