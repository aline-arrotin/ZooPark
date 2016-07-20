<?php
/*
Template Name: Contact
*/
?>
<?php

//If the form is submitted
if(isset($_POST['submitted'])) {
 //If there is no error, send the email
  if(trim($_POST['checking']) !== '') {
   $captchaError = true;
 } else {
  //Prénom
   if(trim($_POST['first_name']) === '') {
     $first_nameError = _e('You forgot to indicate your firstname.', 'zootheme');
     $hasError = true;
   } else {
     $firstname = trim($_POST['first_name']);
   }
  //Nom
   if(trim($_POST['last_name']) === '') {
     $last_nameError = _e('You forgot to indicate your name.', 'zootheme');
     $hasError = true;
   } else {
     $lastname = trim($_POST['last_name']);
   }

//Email
   if(trim($_POST['email']) === '')  {
     $emailError = _e('You forgot to indicate your email address.', 'zootheme');
     $hasError = true;
   }
   // else if (!preg_match("/^( [a-zA-Z0-9] )+( [a-zA-Z0-9\._-] )*@( [a-zA-Z0-9_-] )+( [a-zA-Z0-9\._-] +)+$/", trim($_POST['email']))) {

   else if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
     $emailError = _e('You indicated a wrong email address.', 'zootheme');
     $hasError = true;
   } else {
     $email = trim($_POST['email']);
   }

  //Textarea
   if(trim($_POST['comments']) === '') {
     $commentError = _e('You forgot to indicate your comment.', 'zootheme');
     $hasError = true;
   } else {
     if(function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['comments']));
    } else {
      $comments = trim($_POST['comments']);
    }
  }
}

if(!isset($hasError)) {
  $emailTo = 'aline.arrotin@gmail.com';
  $subject = 'Contact Form Submission from '.$first_name;
  //$sendCopy = trim($_POST['sendCopy']);
  $body = "Name: $last_name nnEmail: $email nnComments: $comments";
  $headers = 'From: My Site <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;

  mail($emailTo, $subject, $body, $headers);

  //if($sendCopy == true) {
  $subject = 'You emailed ZooPark';
  $headers = 'From: ZooPark info@zoopark.esy.es';
  mail($email, $subject, $body, $headers);
  //}

  $emailSent = true;
}
} ?>
<?php get_header(); ?>
<?php 
//If the email was sent, show a thank you message
//Otherwise show form
if(isset($emailSent) && $emailSent == true) {
  ?>
  <div class="container">
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <h1>Thanks, <?=$firstname;?></h1>
            <p>Votre email a bien été envoyé.<br>
              Un membre de l'équipe vous contactera bientôt.</p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php } else { ?>
    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

       <?php if(isset($hasError) || isset($captchaError)) { ?>
       <p class="error">
         Il y a une erreur dans la soumission du formulaire.
         <p>
           <?php } ?>

           <div class="ask section">
            <div class="container">
              <div class="row">
                <div class="header-forms col s12 center white-text">
                  <i class="material-icons">contacts</i>
                  <h3>
                    <?php _e('A particular request, leave us your details.', 'zootheme') ?>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <form action="<?php the_permalink(); ?>" method="post" class="col s12">
                <div class="row">
                  <div class="input-field col s6">
                    <input id="first_name" required name="first_name" type="text" class="validate" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>"><?php if($first_nameError != '') { ?><span class="error"><?=$first_nameError;?></span><?php } ?>
                    <label for="first_name"><?php _e('Firstname', 'zootheme') ?></label>
                  </div>
                  <div class="input-field col s6">
                    <input id="last_name" required name="last_name" type="text" class="validate" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>"><?php if($last_nameError != '') { ?><span class="error"><?=$last_nameError;?></span><?php } ?>
                    <label for="last_name"><?php _e('Name', 'zootheme') ?></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons grey-text">email</i>
                    <input id="email" required name="email" type="email" placeholder="email" class="validate" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><?php if($emailError != '') { ?><span class="error"><?=$emailError;?></span><?php } ?>
                  </div>
                  <div class="input-field col s6">
                    <i class="material-icons grey-text">today</i>
                    <input type="date" class="datepicker">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea required name="comments" id="textarea1" class="materialize-textarea"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea><?php if($commentError != '') { ?><span  class="error"><?=$commentError;?></span><?php } ?>
                    <label for="textarea1"><?php _e('Your request', 'zootheme') ?></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input type="checkbox" id="test5" name="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo 'checked'; ?>/>
                    <label for="test5"><?php _e('I wish to be contacted by phone', 'zootheme') ?></label>
                  </div>
                  <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" disabled placeholder="<?php _e('I am not editable', 'zootheme') ?>" type="tel" class="validate">
                    <label for="icon_telephone">Téléphone</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                    <button type="submit" id="download-button" class="btn-large waves-effect waves-light brown lighten-1"><?php _e('Email-us', 'zootheme') ?></button>
                  </div>
                  <div class="input-field col s6">
                   <label for="checking" class="screenReader"><?php _e('If you want to send this form, don\'t write in this field.', 'zootheme') ?></label>
                   <input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" />
                 </div>
               </div>
             </form>
           </div>
         </div>
       <?php endwhile; ?>
     <?php endif; ?>
     <?php } ?>
       <div class="company section">
         <?php if(have_posts()) :
         while(have_posts()) : the_post();
         $image1 = get_field("image1"); ?>
         <div class="container">
          <div class="row">
            <div class="col s12">
              <h3 class="white-text"><?php the_field('titre1'); ?></h3>
              <p class="grey-text text-lighten-4"><?php the_field('description'); ?></p>
            </div>
          </div>
        </div>
          <?php endwhile; ?>
  <?php endif; ?>
      </div>
<?php get_footer(); ?>