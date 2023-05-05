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

<br/>
<h1>Login to admin panel</h1>
<br />
<div class="container">
  <div class="row g-3">
    <form action="admin_login_action.php" method="post" class="form3">
      <div class="col">
        <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email">
      </div><br />
      <div class="col">
        <input type="password" class="form-control" placeholder="Password" aria-label="password" name="pass">
      </div><br /> 
      <center><a href="forgot_password.php">Forgot password?</a></center><br/>
      <div class="col elo">
        <input type="submit" class="btn btn-dark  btn-block" value="Login">
      </div>
    </form>
  </div>
</div>