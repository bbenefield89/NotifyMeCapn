<?php

$formUsername = htmlentities($_POST['login_username'], ENT_QUOTES, 'ISO-8859-15');
$formPassword = htmlentities($_POST['login_password'], ENT_QUOTES, 'ISO-8859-15');

$sql = "SELECT `id`, `username`, `password` FROM `users` WHERE `username`=:username";
$query = $conn->prepare($sql);

$query->execute(
  [
    ':username' => $formUsername
  ]
);

if ($query->rowCount() > 0) {
  while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    $id              = $row->id;
    $username        = $row->username;
    $hashed_password = $row->password;
  }
  
  if (password_verify($formPassword, $hashed_password)) {
    $_SESSION['username'] = htmlentities($username, ENT_QUOTES, 'ISO-8859-15');
    header('Location: notes.php');
  } else {
    echo 'Passwords do not match';
  }
} else {
  echo 'Username not found in the database';
}

?>
