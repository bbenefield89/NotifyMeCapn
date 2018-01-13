 
/****************
** SAVED NOTES **
****************/

// toggle the `saved notes` side panel visibility
$('.saved-notes header').click((e) => {
  $('header + div').slideToggle('slow');
});

  // displays advanced options a user can take on a single saved note
  // i.e.: edit note, delete note
  const singleNoteForm = document.querySelectorAll('.single-note-form');
  const editNoteButton = document.querySelectorAll('button[name="edit_note"]');
  const editNoteTitleInput = document.querySelectorAll('input[name="edit_note_title_input"]');
  const editNoteTitle = document.querySelectorAll('button[name="edit_note_title"]');
  const cancelEditButton = document.querySelectorAll('.cancel-edit');

for (let i = 0; i < singleNoteForm.length; i++) {
  // clicking on the `pencil` icon will hide the note title and replace it with an input
  startEdit[i].addEventListener('click', (e) => {
    e.preventDefault();
    
    editNoteButton[i].style.display = 'none';
    editNoteTitleInput[i].style.display = 'inline-block';
    startEdit[i].style.display = 'none';
    deleteNote[i].style.display = 'none';
    editNoteTitle[i].style.display = 'inline-block';
    cancelEditButton[i].style.display = 'inline-block';
  });
  
  // this will cancel any edits made to the note title
  cancelEditButton[i].addEventListener('click', (e) => {
    e.preventDefault();
      
    editNoteButton[i].style.display = 'inline-block';
    editNoteTitleInput[i].style.display = 'none';
    editNoteTitle[i].style.display = 'none';
    cancelEditButton[i].style.display = 'none';
    startEdit[i].style.display = 'inline-block';
    deleteNote[i].style.display = 'inline-block';
  });
}
