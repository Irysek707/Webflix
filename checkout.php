<title>Webflix | Subscribed</title>

<?php

#Set page title and display header section
include('includes/logout.php');

session_start();

# Open database connection.
require('includes/connect_db.php');

#Get user_id from session
$user_id = $_SESSION['user_id'];

$sub = "SELECT * FROM subscriptions WHERE user_id = $user_id";
$result = mysqli_query($link, $sub);
$row = mysqli_fetch_assoc($result);

?>

<div class="wrapper">
	<div class="container movie-view containerSub">
		<center>
			<h1>Welcome to Webflix subscription</h1>
		</center>
		<div class="flex-container">
			<div class="d-flex flex-wrap">
				<div class="flex-fill">
					<div class="d-flex flex-wrap">
						<div class="flex-fill containerSub"><br />
							<center>Thank you for subscribing to Webflix! Here are some details about your
									subscription:</center>
						</div>
						<div class="flex-fill containerSub"><br />
							<p>
								<center><strong>Subscription id:</strong> #<?php echo $row['subscription_id']; ?></center>
							</p>
						</div>
						<div class="flex-fill">
							<p>
								<center><strong>Next payment due:</strong> <?php echo $row['expiration_date']; ?></center>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br />
		<center>
			<h2>Reccommendations</h2>
		</center>

		<?php
		#Open database connection
		require('includes/connect_db.php');

		#Retrive movies from 'movie' table
		$q = "SELECT * FROM movie_stream ORDER BY RAND() LIMIT 3;";
		$r = mysqli_query($link, $q);

		echo '<div class="container">';
		if (mysqli_num_rows($r) > 0) {
			# Display body section.
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
				echo '<div class="card card3">
		<a href="movie.php?id=' . $row['id'] . '"><img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['movie_title'] . '"></a>
	</div>';
			}

			# Close database connection.
			mysqli_close($link);

		}
		?>
	</div>
</div>

<?php
#Display footer section
include('includes/footer.php');
?>