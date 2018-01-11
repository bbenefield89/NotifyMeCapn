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
    header('Location: profile.php');
  } else {
    echo 'Passwords do not match';
  }
} else {
  echo 'Username not found in the database';
}

// $formUsername = mysqli_real_escape_string($conn, $_POST['login_username'] );
// $formPass = mysqli_real_escape_string($conn, $_POST['login_password'] );

// // create query
// $query  = "SELECT id, username, password FROM users WHERE username='$formUsername'";
// // store the result
// $result = mysqli_query($conn, $query);

// // verify is result is returned
// if ( mysqli_num_rows( $result ) > 0 ) {
//   // store basic user data in variables
//   while ( $row = mysqli_fetch_assoc( $result ) ) {
//     $id         = $row['id'];
//     $username   = $row['username'];
//     $hashedPass = $row['password'];
//   }
  
//   // verify hashed password with the user submitted password
//   if ( password_verify( $formPass, $hashedPass ) ) {
//     // if details are correct, store data in SESSION VARIABLES
//     $_SESSION['id']       = $id;
//     $_SESSION['username'] = $username;
    
//     header('Location: profile.php');
//   } else {
//     // passwords did not verify
//     echo '<div class="alert alert-danger">Wrong username/password combo. Try again</div>';
//   }
// } else {
//   // if query returns no results from the database
//     echo '<div class="alert alert-danger">No such user was found in the database. Try again <a class="close" data-dismiss="alert">&times;</a></div>';
// }

?>
