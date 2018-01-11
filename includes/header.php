<?php

// session_start();

if (isset($_POST['create_signup'])) {
  // connect to the database
  include('includes/connection.php');
  include('includes/db/create/query_create_account.php');
  $conn = NULL;
}

// if login form is submitted
if ( isset($_POST[ 'login' ]) ) {
  include('includes/connection.php');
  include('includes/db/read/query_login.php');
  $conn = NULL;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- FONTAWESOME 5 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <title>NotifyMeCapn!</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand ml-3 ml-sm-5 pl-sm-5" href="/notifyme">NMC!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-3 ml-sm-auto mr-sm-5 pr-sm-5">
        
      <?php if (isset($_SESSION['username'])) : ?>
        
        <li class="nav-item">
          <a class="nav-link" href="/notifyme/logout.php">
              Log out
          </a>
        </li>
        
      <?php else : ?>
        
        <li class="nav-item mr-5 dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Log in
          </a>
          <div class="dropdown-menu">
            <form method="POST" action="<?php htmlspecialchars($_POST['PHP_SELF']); ?>">
              <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control form-control-lg" id="username" type="text" name="login_username">
              </div>
              
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control form-control-lg" id="password" type="password" name="login_password">
              </div>
              
              <input class="btn btn-primary btn-lg" type="submit" name="login" value="Log in">
            </form>
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Create an account
          </a>
          <div class="dropdown-menu">
            <form method="POST" action="<?php htmlspecialchars($_POST['PHP_SELF']); ?>">
              <div class="form-group">
                <label for="create-username">Username</label>
                <input class="form-control form-control-lg" id="create-username" type="text" name="create_username">
              </div>
              
              <div class="form-group">
                <label for="create-email">Email</label>
                <input class="form-control form-control-lg" id="create-email" type="email" name="create_email">
              </div>
              
              <div class="form-group">
                <label for="create-password">Password</label>
                <input class="form-control form-control-lg" id="create-password" type="password" name="create_password">
              </div>
              
              <input class="btn btn-primary btn-lg" type="submit" name="create_signup" value="Create Account!">
            </form>
          </div>
        </li>
        
      <?php endif; ?>
      
      </ul>
    </div>
  </nav>
