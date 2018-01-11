<?php

$note_id = htmlentities($_POST['note_id'], ENT_QUOTES, 'ISO-8859-15');
$sql = "SELECT `id`, `note_content` FROM `notes` WHERE `id`=:note_id";
$query = $conn->prepare($sql);

$query->execute(
  [
    ':note_id' => $note_id
  ]
);

$result = $query->fetch(PDO::FETCH_OBJ);
$note_id = $result->id;
$note_content = $result->note_content;

echo '
      <textarea name="note_content">'.$note_content.'</textarea>
      <input type="hidden" name="note_id" value="'.$note_id.'">
';

?>
