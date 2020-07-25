<?php
include 'custom-fields.php';
include plugin_dir_path( __FILE__ ).'../templates/form-contact.php';
add_action('wp_enqueue_scripts','my_custom_scripts');


function my_custom_scripts(){
	if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        //Enqueue
        wp_enqueue_script( 'jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js','','',true );
    }
		wp_enqueue_script( 'validate-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js?ver=5.3.2', '', '', true );
		// https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js?ver=5.3.2
 		// wp_enqueue_script( 'custom-script2', get_stylesheet_directory_uri().'/custom/test.js', '', '', true );
 		wp_enqueue_script( 'custom-script', plugin_dir_url( __FILE__ ).'../assets/custom-script.js', '', '', true );
 		wp_localize_script( 'custom-script', 'customscript',array('ajaxurl' => admin_url( 'admin-ajax.php' )));


}
add_action('wp_ajax_postformdata','customform');
add_action('wp_ajax_nopirv_postformdata','customform');

   

function customform(){
	
	if($_POST['cf_name'] ==""){
		$response['message'] ='Name Is Required';
			$response['status'] = false;
			

	}
	else
	{
		$my_Post = array(
		'post_title'    => $_POST['cf_name'],
        'post_status'   => 'publish',
        'post_type'   => 'contactformdata'
      );
  
        $post_id = wp_insert_post($my_Post);
        foreach ($_POST as $key => $value) {
        		add_post_meta( $post_id, $key,$value);
        }
            

        $response['message'] ='form submitted successfully';
		$response['status'] = true;
	}
	return response_json($response);

			
}

function response_json($data){
   header('Content-Type: application/json');
   echo json_encode($data);
   wp_die();
}




?>