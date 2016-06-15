<?php
/**
 * This file is Only for Backup!
 * If 'Careers Form' in cf7 is being deleted/ changed... we can rebuild the form with this code.
 */
?>

<div class="modal-content">
    <div class="form-group">[text* name id:name class:input-theme placeholder "*Name"]</div>
    <div class="form-group">[email* email id:email class:input-theme placeholder "*Email"]</div>
    <div class="form-group">[tel* phone id:phone class:input-theme placeholder "*Phone Number"]</div>
    <div class="form-group"><div id="file_uploader_btn" class="btn btn--floated-icon btn-bright fluid"><span class="file_name">Upload Resumes</span><img src="http://213.52.130.243/~bankpoalim/wp-content/themes/bankpoalim/images/icons/arrow-up.png" alt="" class="icon"></div><div class="file_uploader">[file file-386]</div></div>
    <p class="captcha-note">Please type the characters you see in the picture below</p>[recaptcha]
</div>
<footer class="modal-footer">[submit class:btn class:btn-default class:align-center class:fluid class:submit "Apply"]</footer>

<div id="msg-sent-modal" class="modal-wrapper">
  <div class="modal message-sent-modal modal--narrow">
    <button type="button" data-role="close-modal" class="btn btn-blank btn-close-modal"><img src="http://213.52.130.243/~bankpoalim/wp-content/themes/bankpoalim/images/icons/times.png" alt="" class="icon"></button>
    <div class="modal-content"><img src="http://213.52.130.243/~bankpoalim/wp-content/themes/bankpoalim/images/icons/check-xl.png" alt="" class="icon">
      <div class="conformation">[response]</div>
    </div>
  </div>
</div>


<!-- contact Us Form -->
<form id="contact-form" class="form-theme">
  <div class="form-group select-wrapper">[select branch class:input-theme class:select-reset "Branch 1" "Branch 2"]</div>
  <div class="form-group">[text* name class:input-theme placeholder "*Name"]</div>
  <div class="form-group">[tel* phone class:input-theme placeholder "*Phone"]</div>
  <div class="form-group">[email* email class:input-theme placeholder "*Email"]</div>
  <div class="form-group">[text company class:input-theme placeholder "Company Name"]</div>
  <div class="form-group">[text subject class:input-theme placeholder "subject"]</div>
  <div class="form-group">[textarea content class:input-theme placeholder "content"]</div>
  <div class="form-group"><p class="captcha-note">Please type the characters you see in the picture below</p>[recaptcha]</div>
  <div class="form-group">[submit id:contact-submit class:btn class:btn-default class:fluid "Apply"]</div>
</form>
