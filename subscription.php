<title>Webflix | Subscriptions</title>
<?php
  #Access session.
  session_start();

  #Redirect if not logged in.
  if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
  }

  include('includes/navbar.php');

#Open database connection
require('includes/connect_db.php');

# Get the user's ID from the session
$user_id = $_SESSION['user_id'];

# Retrieve user info from the 'users' database table
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  # Redirect if the user's permissions are 'blocked'
  if ($row['permissions'] === 'blocked') {
    header('Location: index.php');
    exit();
  }
}
?>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: 'AQWAg2qRpEb2nqKbdkpfMinJgU-wfqoSPsQSLE9U2apT6fB79vy-EN95vbTBTMXBf7Mn6pFzSCyaOU-b',
			production: '<insert your production client id>'
		},
		style:
		{
			color: 'black',
			label: 'paypal',
			tagline: 'false'
		},
		commit: true,
		payment: function (data, actions) {
			return actions.payment.create({
				payment: {
					transactions: [{
						amount: { total: '9.99', currency: 'GBP' }
					}]
				}
			});
		},
		onAuthorize: function (data, actions) {
			return actions.payment.execute().then(function () {
				window.location.replace("checkout-monthly.php");

			});
		}
	}, '#paypal-button');
</script>
<script>

	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: 'AQWAg2qRpEb2nqKbdkpfMinJgU-wfqoSPsQSLE9U2apT6fB79vy-EN95vbTBTMXBf7Mn6pFzSCyaOU-b',
			production: '<insert your production client id>'
		},
		style:
		{
			color: 'black',
			label: 'paypal',
			tagline: 'false'
		},
		commit: true,
		payment: function (data, actions) {
			return actions.payment.create({
				payment: {
					transactions: [{
						amount: { total: '99.99', currency: 'GBP' }
					}]
				}
			});
		},
		onAuthorize: function (data, actions) {
			return actions.payment.execute().then(function () {
				window.location.replace("checkout-yearly.php");
			});
		}
	}, '#paypal-button2');
</script>

<?php


echo ('
<!-- Section 2: Subscription Info -->
<div class="wrapper2">
<section id="subscription" class="text-center py-5">
	<div class="container-fluid">
		<h2>Subscription Plans</h2>
		<p>Choose the plan that works for you.</p>
		<div class="row mx-0">
			<div class="col-md-6 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<h3>Monthly</h3>
						<p class="card-text">£9.99 / month</p>
						<ul class="list-unstyled">
							<li>Unlimited movies and TV shows</li>
							<li>HD available</li>
							<li>Cancel anytime</li>
						</ul>
						Subscribe now<br/>
                        <div id="paypal-button"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<h3>Yearly</h3>
						<p class="card-text">£99.99 / year</p>
						<ul class="list-unstyled">
							<li>Unlimited movies and TV shows</li>
							<li>4HD available</li>
							<li>Huge yearly discount</li>
						</ul>
                        Subscribe now<br/>
                        <div id="paypal-button2"></div>
					</div>
				</div>
			</div>
		</div>
		</div>
</section>
</div>');


include('includes/footer.php');

// Close database linkection
mysqli_close($link);
?>