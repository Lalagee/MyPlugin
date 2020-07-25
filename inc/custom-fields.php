<?php


// This function add_meta_box by unique id, title and

function Contactform_add_custom_box()
{
    
    add_meta_box(
            'wporg_box_id',           // Unique ID
            'Contact Form Data',  // Box title
            'Contactform_custom_box_html',  // Content callback, must be of type callable
            'ContactFormData'              // Post type
        );
    
}
add_action('add_meta_boxes', 'Contactform_add_custom_box');


function Contactform_custom_box_html($post)
{
    $name = get_post_meta($post->ID,'cf_name',true);
    $email = get_post_meta($post->ID,'cf_email',true);
    $sub = get_post_meta($post->ID,'cf_subject',true);
    $msg = get_post_meta($post->ID,'cf_message',true);
    ?>
    
    <label for="cf_name">Name</label>
    <input type ="text" name="cf_name" id="cf_name" readonly="" value="<?= (empty($name)? '': $name); ?>" class="postbox">
    
    <label for="cf_email">Email</label>
    <input type ="email" name="cf_email" id="cf_email" readonly="" value="<?= (empty($email)? '': $email); ?>" class="postbox">
    
    <label for="cf_subject">Subject</label>
    <input type="text" name="cf_subject" id="cf_subject" readonly="" value="<?= (empty($sub)? '': $sub); ?>" class="postbox">
    
    <label for="cf_message">Message</label>
    <input type ="text" name="cf_message" id="cf_message" readonly="" value="<?= (empty($msg)? '': $msg); ?>" class="postbox">
    
    <?php
}


?>