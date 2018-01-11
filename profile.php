<?php

session_start();

if (!$_SESSION['username']) {
  header('Location: index.php');
}

include('includes/header.php');

?>

<h1>Profile Page</h1>
<a class="btn btn-primary btn-lg d-block" href="/notifyme/notes.php">Notes</a>

<?php include('includes/footer.php'); ?>
