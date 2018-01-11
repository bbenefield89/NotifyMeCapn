<?php

session_start();

// if user is not logged in
if (!$_SESSION['username']) {
  header('Location: index.php');
}

// functions
// CREATE a note into the DB
function insert_note() {
  include('includes/connection.php');
  include('includes/db/create/query_insert_note.php');
  $conn = NULL;
}

// query DB for pre-existing notes
function select_notes() {
  include('includes/connection.php');
  include('includes/db/read/query_saved_notes.php');
  $conn = NULL;
}

// UPDATE selected note
function edit_note() {
  include('includes/connection.php');
  include('includes/db/update/query_edit_note.php');
  $conn = NULL;
}

// UPDATE add content to note
function add_note_content() {
  include('includes/connection.php');
  include('includes/db/update/query_add_note_content.php');
  $conn = NULL;
}

// UPDATE the note title
function edit_note_title() {
  include('includes/connection.php');
  include('includes/db/update/query_edit_note_title.php');
  $conn = NULL;
}

// DELETE selected note from DB
function delete_note() {
  include('includes/connection.php');
  include('includes/db/delete/query_delete_note.php');
  $conn = NULL;
}

include('includes/header.php'); 

?>

<div class="notes-container container-fluid pt-4">
  <div class="row mb-5">
    <div class="col-12">
      
      <div class="row">
        <div class="saved-notes col-10 offset-1 col-md-4 offset-md-0">
          <header class="text-center">
            <h2>Saved Notes</h2>
          </header>
          <div class="pt-2">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-inline px-1" method="POST">
              <input class="form-control mb-1 mr-1" name="note_name" type="text">
              <input class="btn btn-success btn-sm" name="create_note" type="submit" value="Save">
            </form>
            
            <?php
            
              if (isset($_POST['create_note'])) {
                insert_note();
              } elseif (isset($_POST['delete_note'])) {
                delete_note();
              } elseif (isset($_POST['edit_note_title'])) {
                edit_note_title();
              }
              
              select_notes();
                            
            ?>
            
          </div>
        </div><!-- col -->
        
        <div class="current-note col-10 offset-1 col-md-8 offset-md-0">
          <header class="text-center">
            <h2>Current Note</h2>
          </header>
          <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            
            <?php

              if (isset($_POST['edit_note'])) {
                edit_note();
              } elseif (isset($_POST['note_submit'])) {
                add_note_content();
              } else {
                echo '<textarea></textarea>';
              }
              
            ?>
            
            <input class="btn btn-success btn-lg" name="note_submit" type="submit" value="Save">
          </form>
        </div><!-- col -->
      </div><!-- row -->
        
    </div><!-- col -->
  </div><!-- row -->

<?php include('includes/footer.php'); ?>
