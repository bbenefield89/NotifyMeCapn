<?php
session_start();

if (isset($_SESSION['username'])) {
  header('Location: notes.php');
}

include('includes/header.php'); 

?>

<div class="container-fluid">
  
  <div class="row">
    <header class="index-header col-12 py-5 alert-primary text-center">
      <h1 class="mx-auto mb-5">The simplest way to take notes and stay organized.</h1>
      <p class="lead mx-auto">Jot down a few ideas, remember your cousin's birthday next Tuesday and DO NOT forget your anniversary ever. again.</p>
    </header><!-- header -->
  </div><!-- row -->
  
  <div class="index-main-row row mb-5 pt-5">
    <main class="index-main col-12">
      <h2 class="text-center mb-5">Why use NotifyMeCapn!?</h2>
      
      <div class="row text-center">
        <div class="col-10 offset-1 mb-5 col-md-6 offset-md-0 col-lg-4">
          <h3>Modern</h3>
          <i class="fab fa-android fa-5x"></i>
          <p class="lead">Take NotifyMeCapn! anywhere in the world. As long as you have a connection to the internet and a modern browser, you'll be just fine!
        </div>
        
        <div class="col-10 offset-1 mb-5 col-md-6 offset-md-0 col-lg-4">
          <h3>Stay organized</h3>
          <i class="fas fa-sitemap fa-5x"></i>
          <p class="lead">60% of American's state that they have an easier time staying organized while using NotifyMeCapn!
        </div>
        
        <div class="col-10 offset-1 mb-5 col-md-6 offset-md-0 col-lg-4">
          <h3>Work Together</h3>
          <i class="far fa-handshake fa-5x"></i>
          <p class="lead">Can't spell? Let your buddy do the typing, he was always the nerdy one</p>
        </div>
        
        <div class="col-10 offset-1 mb-5 col-md-6 offset-md-0 col-lg-4">
          <h3>Go back in time</h3>
          <i class="far fa-calendar-alt fa-5x"></i> 
          <p class="lead">"Wow, I wrote that last week!" Our state-of-the-art technology will stand the test of time.
        </div>
        
        <div class="col-10 offset-1 mb-5 col-md-6 offset-md-0 col-lg-4">
          <h3>Quick Search</h3>
          <i class="fab fa-searchengin fa-5x"></i>
          <p class="lead">Easy-to-navigate sidebar allows for quick scanning to find your notes faster than ever</p>
        </div>
        
        <div class="col-10 offset-1 mb-5 col-md-6 offset-md-0 col-lg-4">
          <h3>It's free!</h3>
          <i class="far fa-money-bill-alt fa-5x"></i>
          <p class="lead">I mean, how else am I going to get you to try this out?</p>
        </div>
      </div><!-- row -->
    </main><!-- main -->
  </div><!-- row -->

<?php include('includes/footer.php'); ?>
