<?php

$username = htmlentities($_SESSION['username'], ENT_QUOTES, 'ISO-8859-15');
$sql  = "SELECT `id`, `note_name` FROM `notes` WHERE `username`=:username";
$query = $conn->prepare($sql);

$result = $query->execute(
  [
    ':username' => $username
  ]
);

if ($result) {
  while ($r = $query->fetch(PDO::FETCH_OBJ)) {
    $note_name = $r->note_name;
    $note_id   = $r->id;
    
    echo '
          <form action="notes.php" class="single-note-form" method="POST">
            <button name="edit_note" type="submit">'.$note_name.'</button>
            <input name="edit_note_title_input" type="text" value="'.$note_name.'">
            
            <button class="start-edit hidden">&#9998;</button>
            <button class="text-danger hidden" name="delete_note" type="submit">&times;</button>
            
            <button class="hidden text-success" name="edit_note_title" type="submit"><i class="fas fa-save"></i></button>
            <button class="hidden cancel-edit"><i class="text-danger">&times;</i></button>
            
            <input type="hidden" name="note_id" value="'.$note_id.'">
          </form>
        ';
  }
} else {
  echo 'Zero notes available';
}

// $result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) > 0) {
//   // create empty array for future use
//   $notes = [];
  
//   while ($row = mysqli_fetch_assoc($result)) {
//     // push all the data from $row into $notes array
//     $notes[] = [ 'id' => $row['id'], 'note_name' => $row['note_name'] ];
//   }
  
//   // close connection and return array containing note details from DB
//   mysqli_close($conn);
  
//   return $notes;
// } else {
//   mysqli_close($conn);
//   echo '<p>No notes available</p>';
// }

?>
