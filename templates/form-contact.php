<?php




function Contact_form(){
 ?>

 <form method="post" id="post_contact_form">
    <label for="cf_name">Name</label>
    <input type =text name="cf_name" id="cf_name" class="required">
    
    <label for="cf_email">Email</label>
    <input type =email name="cf_email" id="cf_email" class="required">
    
    <label for="cf_subject">Subject</label>
    <input type =text name="cf_subject" id="cf_subject" class="required">
    
    <label for="cf_message">Message</label>
    <input type ="text" name="cf_message" id="cf_message" class="required">
    <input type="hidden" name="action" value="postformdata">

    <input type="submit" name="cf-submitted" >


 </form>
<?php
}

add_shortcode('my_contact_form','Contact_form')

?>





