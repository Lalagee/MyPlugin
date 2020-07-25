add_action('wp_enqueue_scripts','my_custom_scripts');


function my_custom_scripts(){
		wp_enqueue_script( 'validate-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js?ver=5.3.2', '', '', true );
		// https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js?ver=5.3.2
 		// wp_enqueue_script( 'custom-script2', get_stylesheet_directory_uri().'/custom/test.js', '', '', true );
 		wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri().'/custom/custom-script.js', '', '', true );
 		wp_localize_script( 'custom-script', 'customscript',array('ajaxurl' => admin_url( 'admin-ajax.php' )));


}
add_action('wp_ajax_customform','customform');
add_action('wp_ajax_nopirv_customform','customform');

function customform(){

	
	if($_POST['b_name'] ==""){
		$response['message'] ='Borrower Name Is Required';
			$response['status'] = false;
			

	}
	else
	{
		$my_Post = array(
		'post_title'    => $_POST['b_name'],
        'post_status'   => 'publish',
        'post_type'   => 'CustomerData'
      );
  
        $post_id = wp_insert_post($my_Post);

        foreach ($_POST as $key => $value) {
        		add_post_meta( $post_id, $key,$value);
        }
        /*add_post_meta( $post_id, 'b_name',$_POST['b_name']);
        add_post_meta( $post_id, 'loan_amount',$_POST['loan_amount']);
        add_post_meta( $post_id, 'Terms',$_POST['Terms']);
        add_post_meta( $post_id, 'loanType',$_POST['loanType']);
		add_post_meta( $post_id, 'Property_address',$_POST['Property_address']);
		add_post_meta( $post_id, 'purpose_of_loan',$_POST['purpose_of_loan']);
		add_post_meta( $post_id, 'property',$_POST['property']);
		add_post_meta( $post_id, 'b_ssn',$_POST['b_ssn']);
		add_post_meta( $post_id, 'b_home_number',$_POST['b_home_number']);
		add_post_meta( $post_id, 'b_dob',$_POST['b_dob']);
		add_post_meta( $post_id, 'b_yrs_school',$_POST['b_yrs_school']);
		add_post_meta( $post_id, 'b_email_adderss',$_POST['b_email_adderss']);
		add_post_meta( $post_id, 'martial_status',$_POST['martial_status']);
		add_post_meta( $post_id, 'depend_num',$_POST['depend_num']);
		add_post_meta( $post_id, 'depend_ages',$_POST['depend_ages']);
		add_post_meta( $post_id, 'Present_Address_type',$_POST['Present_Address_type']);
		add_post_meta( $post_id, 'present_address',$_POST['present_address']);
		add_post_meta( $post_id, 'mailing_add',$_POST['mailing_add']);
		add_post_meta( $post_id, 'status_resid_less_2years',$_POST['status_resid_less_2years']);
		add_post_meta( $post_id, 'forn_type_a',$_POST['forn_type_a']);	
		add_post_meta( $post_id, 'forner_add_a',$_POST['forner_add_a']);
		add_post_meta( $post_id, 'no_years_a',$_POST['no_years_a']);
		add_post_meta( $post_id, 'forn_type_b',$_POST['forn_type_b']);
		add_post_meta( $post_id, 'forner_add_b',$_POST['forner_add_b']);
		add_post_meta( $post_id, 'no_years_b',$_POST['no_years_b']);
		add_post_meta( $post_id, 'name_of_employer',$_POST['name_of_employer']);
		add_post_meta( $post_id, 'address_of_employer',$_POST['address_of_employer']);
		add_post_meta( $post_id, 'years_of_employer',$_POST['years_of_employer']);
		add_post_meta( $post_id, 'self_employed',$_POST['self_employed']);
		add_post_meta( $post_id, 'typ_of_busines',$_POST['typ_of_busines']);
		add_post_meta( $post_id, 'bussiness_phone',$_POST['bussiness_phone']);
		add_post_meta( $post_id, 'employed_less2years',$_POST['employed_less2years']);
		add_post_meta( $post_id, 'n_a_eployee',$_POST['n_a_eployee']);
		add_post_meta( $post_id, 'dates',$_POST['dates']);
		add_post_meta( $post_id, 'm_income',$_POST['m_income']);
		add_post_meta( $post_id, 'self_employe_p_a',$_POST['self_employe_p_a']);
		add_post_meta( $post_id, 'pso_tit_typ_bussiness_a',$_POST['pso_tit_typ_bussiness_a']);
		add_post_meta( $post_id, 'bussi_phone_a',$_POST['bussi_phone_a']);
		add_post_meta( $post_id, 'bussi_month_income_a',$_POST['bussi_month_income_a']);
		add_post_meta( $post_id, 'self_employe_p_b',$_POST['self_employe_p_b']);
		add_post_meta( $post_id, 'pso_tit_typ_bussiness_b',$_POST['pso_tit_typ_bussiness_b']);
		add_post_meta( $post_id, 'bussi_phone_b',$_POST['bussi_phone_b']);
		add_post_meta( $post_id, 'yes_co_B',$_POST['yes_co_B']);

		add_post_meta( $post_id, 'co_m_income1',$_POST['co_m_income1']);
		add_post_meta( $post_id, 'co_m_income2',$_POST['co_m_income2']);
		add_post_meta( $post_id, 'co_m_income3',$_POST['co_m_income3']);
		add_post_meta( $post_id, 'co_m_income4',$_POST['co_m_income4']);
		add_post_meta( $post_id, 'co_m_income5',$_POST['co_m_income5']);
		add_post_meta( $post_id, 'co_m_income6',$_POST['co_m_income6']);
		add_post_meta( $post_id, 'b_total',$_POST['b_total']);
		add_post_meta( $post_id, 'com_inc_hou_exp1',$_POST['com_inc_hou_exp1']);
		add_post_meta( $post_id, 'Propose1',$_POST['Propose1']);
		add_post_meta( $post_id, 'com_inc_hou_exp2',$_POST['com_inc_hou_exp2']);
		add_post_meta( $post_id, 'Propose2',$_POST['Propose2']);
		add_post_meta( $post_id, 'com_inc_hou_exp3',$_POST['com_inc_hou_exp3']);
		add_post_meta( $post_id, 'Propose3',$_POST['Propose3']);
		add_post_meta( $post_id, 'com_inc_hou_exp4',$_POST['com_inc_hou_exp4']);
		add_post_meta( $post_id, 'Propose4',$_POST['Propose4']);
		add_post_meta( $post_id, 'com_inc_hou_exp5',$_POST['com_inc_hou_exp5']);
		add_post_meta( $post_id, 'Propose5',$_POST['Propose5']);
		add_post_meta( $post_id, 'com_inc_hou_exp6',$_POST['com_inc_hou_exp6']);
		add_post_meta( $post_id, 'Propose6',$_POST['Propose6']);
		add_post_meta( $post_id, 'com_inc_hou_exp7',$_POST['com_inc_hou_exp7']);
		add_post_meta( $post_id, 'Propose7',$_POST['Propose7']);
		add_post_meta( $post_id, 'com_inc_hou_exp8',$_POST['com_inc_hou_exp8']);
		add_post_meta( $post_id, 'Propose8',$_POST['Propose8']);

		

// co borrower information
		add_post_meta( $post_id, 'cb_name',$_POST['cb_name']);
		add_post_meta( $post_id, 'cb_ssn',$_POST['cb_ssn']);
		add_post_meta( $post_id, 'cb_home_number',$_POST['cb_home_number']);
		add_post_meta( $post_id, 'cb_dob',$_POST['cb_dob']);
		add_post_meta( $post_id, 'cb_yrs_school',$_POST['cb_yrs_school']);
		add_post_meta( $post_id, 'cb_email_adderss',$_POST['cb_email_adderss']);
		add_post_meta( $post_id, 'cb_martial_status',$_POST['cb_martial_status']);
		add_post_meta( $post_id, 'cb_depend_num',$_POST['cb_depend_num']);
		add_post_meta( $post_id, 'cb_depend_ages',$_POST['cb_depend_ages']);
		add_post_meta( $post_id, 'cb_Present_Address_type',$_POST['cb_Present_Address_type']);
		add_post_meta( $post_id, 'cb_present_address',$_POST['cb_present_address']);
		add_post_meta( $post_id, 'cb_mailing_add',$_POST['cb_mailing_add']);
		add_post_meta( $post_id, 'cb_name_of_employer',$_POST['cb_name_of_employer']);
		add_post_meta( $post_id, 'cb_address_of_employer',$_POST['cb_address_of_employer']);
		add_post_meta( $post_id, 'cb_years_of_employer',$_POST['cb_years_of_employer']);
		add_post_meta( $post_id, 'cb_self_employed',$_POST['cb_self_employed']);
		add_post_meta( $post_id, 'cb_typ_of_busines',$_POST['cb_typ_of_busines']);
		add_post_meta( $post_id, 'cb_bussiness_phone',$_POST['cb_bussiness_phone']);
		add_post_meta( $post_id, 'cb_employed_less2years',$_POST['cb_employed_less2years']);
		add_post_meta( $post_id, 'cb_n_a_employee',$_POST['cb_n_a_employee']);
		add_post_meta( $post_id, 'cb_dates',$_POST['cb_dates']);
		add_post_meta( $post_id, 'cb_m_income',$_POST['cb_m_income']);
		add_post_meta( $post_id, 'cb_self_employe_p_a',$_POST['cb_self_employe_p_a']);
		add_post_meta( $post_id, 'cb_pso_tit_typ_bussiness_a',$_POST['cb_pso_tit_typ_bussiness_a']);
		add_post_meta( $post_id, 'cb_bussi_phone_a',$_POST['cb_bussi_phone_a']);
		add_post_meta( $post_id, 'cb_bussi_month_income_a',$_POST['cb_bussi_month_income_a']);
		add_post_meta( $post_id, 'cb_self_employe_p_b',$_POST['cb_self_employe_p_b']);
		add_post_meta( $post_id, 'cb_pso_tit_typ_bussiness_b',$_POST['cb_pso_tit_typ_bussiness_b']);
		add_post_meta( $post_id, 'cb_bussi_phone_b',$_POST['cb_bussi_phone_b']);
		add_post_meta( $post_id, 'co_Borrower1',$_POST['co_Borrower1']);
		add_post_meta( $post_id, 'co_Borrower2',$_POST['co_Borrower2']);
		add_post_meta( $post_id, 'co_Borrower3',$_POST['co_Borrower3']);
		add_post_meta( $post_id, 'co_Borrower4',$_POST['co_Borrower4']);
		add_post_meta( $post_id, 'co_Borrower5',$_POST['co_Borrower5']);
		add_post_meta( $post_id, 'co_Borrower6',$_POST['co_Borrower6']);
		add_post_meta( $post_id, 'cb_total',$_POST['cb_total']);*/

        
        

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
