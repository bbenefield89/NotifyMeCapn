<?php

$note_id = htmlentities($_POST['note_id'], ENT_QUOTES, 'ISO-8859-15');
$note_content = htmlentities($_POST['note_content'], ENT_QUOTES, 'ISO-8859-15');

// INSERT query to the DB
$sql    = "UPDATE `notes` SET `note_content`=:note_content WHERE `notes`.`id`=:note_id";
$query  = $conn->prepare($sql);
$result = $query->execute(
  [
    ':note_id'      => $note_id,
    ':note_content' => $note_content
  ]
);

if ($result) {
  edit_note();
} else {
  echo '<textarea></textarea>';
}
