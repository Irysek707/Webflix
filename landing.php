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

#Open database connection
require('includes/connect_db.php');


echo '<nav class="navbar bg-body-tertiary">
<div class="container-fluid">
<a class="navbar-brand" href="index.php"><h4>WEBFLIX</h4>
  <form class="d-flex">
  <a href="login.php"><button class="btn btn2 btn-dark btn-outline-dark" type="button">Sign in</button></a>
  </form>
</div>
</nav>
        <br/>';

echo '<br><div class="container"><img src="img/logo2.png"></div><br/><br/>';
?>

<!-- Modal HTML -->
<div id="blockedModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">You are Blocked</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Your access to this page is blocked.</p>
      </div>
    </div>
  </div>
</div>

<?php
echo ('
<!-- Section 1: Short Intro -->
<section id="intro" class="text-center">
	<h1>Webflix</h1>
	<p>Unlimited Movies and TV Shows. Watch anywhere. Cancel anytime.</p>
	<div class="d-flex justify-content-center">
		<a href="register.php" class="btn btn2 btn-lg mr-4 btn-outline-dark">Sign Up</a>
		<a href="login.php" class="btn btn2 btn-lg btn-outline-dark">Sign In</a>
	</div>
</section>
<br/><br/>

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
					</div>
				</div>
			</div>
		</div>
        <br/>
        <a href="register.php" class="btn btn-lg mr-4 btn-outline-dark">Subscribe now</a>
	</div>
</section>


<!-- Section 3: Frequently Asked Questions -->
<section id="faq" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 class="text-center mb-5">Frequently Asked Questions</h2>
        <div class="accordion" id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn2 btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <span class="arrow-icon">+</span> What is Webflix?
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Webflix is a video streaming service that allows you to watch unlimited movies and TV shows on your favorite devices.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn2 btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span class="arrow-icon">+</span> How much does Webflix cost?
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Webflix offers two subscription plans: Monthly subscription for £9.99/month and Yearly subscription for £99.99/year. Both plans allow you to watch unlimited movies and TV shows on your favorite devices.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn2 btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <span class="arrow-icon">+</span> How can I cancel my Webflix subscription?
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                You can cancel your Webflix subscription anytime by visiting your account settings on the Webflix website or app. If you cancel your subscription, you will still have access to Webflix until the end of your billing period.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
'
);

#Display footer section
include('includes/footer.php');

?>