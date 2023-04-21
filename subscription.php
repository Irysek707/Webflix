<title>Webflix | Subscriptions</title>
<script src="script.js"></script>

<?php
include('includes/logout.php');

echo('
<!-- Section 2: Subscription Info -->
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
                        <br/>
                        <a href="payment.php" class="btn btn2 btn-lg mr-4 btn-outline-dark">Subscribe now</a>
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
                        <br/>
                        <a href="payment.php" class="btn btn2 btn-lg mr-4 btn-outline-dark">Subscribe now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>');


include('includes/footer.php');
?>