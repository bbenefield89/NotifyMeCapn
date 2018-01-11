<?php

$note_id    = htmlentities($_POST['note_id'], ENT_QUOTES, 'ISO-8859-15');
$note_name = htmlentities($_POST['edit_note_title_input'], ENT_QUOTES, 'ISO-8859-15');

$sql = "UPDATE `notes` SET `note_name`=:note_name WHERE `notes`.`id`=:note_id";
$query = $conn->prepare($sql);
$result = $query->execute(
  [
    ':note_id'    => $note_id,
    ':note_name' => $note_name
  ]
);
