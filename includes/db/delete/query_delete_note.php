<?php

$note_id = htmlentities($_POST['note_id'], ENT_QUOTES, 'ISO-8859-15');

// make DELETE query to the DB
$sql = "DELETE FROM `notes` WHERE `notes`.`id`=:note_id";
$query = $conn->prepare($sql);
$result = $query->execute(
  [
    ':note_id' => $note_id
  ]
);
