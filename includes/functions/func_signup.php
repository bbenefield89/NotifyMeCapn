<?php

function sign_up_form($conn_loc) {
  // create variables from user filled form and sanitize the data
  $create_username = validate_form_data($_POST['create_username']);
  $create_email    = validate_form_data($_POST['create_email']);
  $create_password = password_hash(validate_form_data($_POST['create_password']), PASSWORD_DEFAULT);
  
  // connect to the database
  include($conn_loc);
  
  // make query against the database
  $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_created`) VALUES (NULL, '$create_username', '$create_email', '$create_password', CURRENT_TIMESTAMP)";
  
  $result = mysqli_query($conn, $query);
  
  // if everything is okay create new user
  if ($result) {
    mysqli_close($conn);
    
    session_start();
    
    $_SESSION['username'] = $create_username;
    $_SESSION['email']    = $create_email;
    
    header('Location: profile.php');
  } else {
    mysqli_close($conn);
    
    echo 'Error: '.$query.'<br>'.mysqli_error($conn);
  }
}
  
?>
