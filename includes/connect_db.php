<?php # CONNECT TO MySQL DATABASE.

# Connect on 'localhoast' for user to database.
$link = mysqli_connect('localhost', 'HNDSOFTS2A15', 'gjXv9H7RH9', 'HNDSOFTS2A15');
if (!$link) {
	# Otherwise fail gracefully and explain the error.
	die('Could not connect to MySQL: ' . mysqli_error());
}
?>