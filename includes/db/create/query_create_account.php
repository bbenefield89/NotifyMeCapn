<?php

$create_username = htmlentities($_POST['create_username'], ENT_QUOTES, 'ISO-8859-15');
$create_email = htmlentities($_POST['create_email'], ENT_QUOTES, 'ISO-8859-15');
$create_password = password_hash(htmlentities($_POST['create_password'], ENT_QUOTES, 'ISO-8859-15'), PASSWORD_DEFAULT);

// make query against the database
$sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_created`) VALUES (NULL, :username, :email, :password, CURRENT_TIMESTAMP)";
$query = $conn->prepare($sql);

$create = $query->execute(
  [
    ':username' => $create_username,
    ':email' => $create_email,
    ':password' => $create_password
  ]
);

if ($create) {
  $_SESSION['username'] = $create_username;
  header('Location: notes.php');
} else {
  echo 'Woops';
}

?>
