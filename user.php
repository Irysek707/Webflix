<title>ECinema | User Account</title>

<?php # DISPLAY COMPLETE REGISTRATION PAGE.

# Access session.
session_start();

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
	require('login_tools.php');
	load();
}

$page_title = 'User Area ';
include('includes/logout.php');

# Open database connection.
require('includes/connect_db.php');

# Retrieve items from 'users' database table.
$q = "SELECT * FROM users WHERE user_id={$_SESSION[user_id]}";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {

	echo '
	<div class="container">
	  <div class="row">
  ';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '
	<div class="col-sm">
	  <div class="alert alert-dark" alert-dismissible fade show" role="alert">
		</button>	
	  <h1>' . $row['first_name'] . ' ' . $row['last_name'] . '<strong>  </h1><hr>
	   User ID : EC2022/' . $row['user_id'] . ' 
	   <hr>
	   Email :  ' . $row['email'] . '
	  <hr>
	  Registration Date :  ' . $row['reg_date'] . ' 
	  <hr>
	  <!-- Button trigger modal -->
	<button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#password">
		<i class="fa fa-edit"></i>  Change Password
	</button>
	 </div>
    </div>
	
    
	';
	}

	# Close database connection.
	#mysqli_close( $link ) ; 
} else {
	echo '<h3>No user details.</h3>

';
}



# Retrieve items from 'users' database table.
$q = "SELECT * FROM users WHERE user_id={$_SESSION[user_id]}";
$r = mysqli_query($link, $q);


if (mysqli_num_rows($r) > 0) {

	echo '<div class="col-sm">';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '
	
		<div class="alert alert-dark" alert-dismissible fade show" role="alert">
		   </button>
			<h1>Card Stored</h1><hr>
			 Card Holder : ' . $row['first_name'] . '  ' . $row['last_name'] . ' </p>
			 <hr>
			 Card Number : ' . $row['card_number'] . ' </p>
			 <hr>
			 Expire Date : ' . $row['exp_month'] . '   ' . $row['exp_year'] . '</p>
			 <hr>
			<button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#card">
			Update Card 
			</button>
		</div>
	</div>
	';
	}

	# Close database connection.
	#mysqli_close( $link ) ; 
} else {
	echo '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		   </button>
			<h1>Card Stored</h1>
			<h3>No card stored.</h3>
		</div>
		
';
}

# Retrieve items from 'users' database table.
$q = "SELECT * FROM subscriptions WHERE user_id={$_SESSION[user_id]}";
$r = mysqli_query($link, $q);


if (mysqli_num_rows($r) > 0) {

	echo '<div class="col-sm">';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '
	
		<div class="alert alert-dark" alert-dismissible fade show" role="alert">
		   </button>
			<h1>Subscription</h1><hr>
			Subscription status : ' . $row['status'] . ' </p><hr/>';

			if ($row['status'] == "active" ){

		echo'
			Expiration date : ' . $row['expiration_date'] . ' </p>
		</div>
	</div>
	';}
	else {
		echo'
        <a href="subscription.php" style="text-decoration: none !important"><button type="button" class="btn btn-dark btn-block">Subscribe now</button></a>';
	}
	}

	# Close database connection.
	#mysqli_close( $link ) ; 
} else {
	echo '<div class="col-sm">
	<div class="alert alert-dark" alert-dismissible fade show" role="alert">
		   </button>
			<h1>Subscription</h1><hr>
			Subscription status : inactive </p><hr/>
			<a href="subscription.php" style="text-decoration: none !important"><button type="button" class="btn btn-dark btn-block">Subscribe now</button></a>
		</div>
	</div>
	';
	
}


?>



<!--  =============================
=====    Modal Change Password   =======
	=================================== -->


<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="change_password.php" method="post">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Confirm Email"
							value="<?php if (isset($_POST['email']))
	                       echo $_POST['email']; ?>" required>

					</div>
					<div class="form-group">
						<input type="password" name="pass1" class="form-control" placeholder="New Password"
							value="<?php if (isset($_POST['pass1']))
	                       echo $_POST['pass1']; ?>" required>

					</div>
					<div class="form-group">
						<input type="password" name="pass2" class="form-control" placeholder="Confirm New Password"
							value="<?php if (isset($_POST['pass2']))
	                       echo $_POST['pass2']; ?>" required>

					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="btnChangePassword" class="btn btn-secondary btn-block"
								value="Save Changes" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--  =============================
=====    Modal Change Card   =======
	=================================== -->


<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="card" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Update Payment Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="change_card.php" method="post">
					<div class="form-group">
						<input type="text" name="card_number" class="form-control" placeholder="Card Number "
							value="<?php if (isset($_POST['card_number']))
	                       echo $_POST['card_number']; ?>" required>

					</div>
					<div class="form-group">
						<input type="text" name="exp_month" class="form-control" placeholder="MM"
							value="<?php if (isset($_POST['exp_month']))
	                       echo $_POST['exp_month']; ?>" required>

					</div>
					<div class="form-group">
						<input type="text" name="exp_year" class="form-control" placeholder="YY"
							value="<?php if (isset($_POST['pass2']))
	                       echo $_POST['pass2']; ?>" required>

					</div>
					<div class="form-group">
						<input type="text" name="cvv" class="form-control"
							placeholder="CVV '3 digits found on the back of card'"
							value="<?php if (isset($_POST['cvv']))
	                       echo $_POST['cvv']; ?>" required>

					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="btnChangePassword" class="btn btn-secondary btn-block"
								value="Save Changes" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>