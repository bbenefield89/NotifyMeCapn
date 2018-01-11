<?php

$username = htmlentities($_SESSION['username'], ENT_QUOTES, 'ISO-8859-15');
$note_name = htmlentities($_POST['note_name'], ENT_QUOTES, 'ISO-8859-15');

// make CREATE query to db and return the results
$sql = "INSERT INTO `notes` (`id`, `username`, `note_name`, `note_content`, `date_created`) VALUES (NULL, :username, :note_name, '', CURRENT_TIMESTAMP)";
$query = $conn->prepare($sql);

$result = $query->execute(
  [
    ':username'  => $username,
    ':note_name' => $note_name
  ]
);

if ($result) {
  $conn = NULL;
} else {
  echo 'ERROR';
  $conn = NULL;
}

?>
