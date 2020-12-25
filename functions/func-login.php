<?php
// LOGIN
function pt_login_member() {

  		// Get variables
		$user_login		= $_POST['pt_user_login'];	
		$user_pass		= $_POST['pt_user_pass'];
		$error = array();


		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false) ){
			$error[] = __('Session token has expired, please reload the page and try again', 'ptheme');
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_pass) ){
			$error[] = __('Please fill all form fields', 'ptheme');
	 	} else { // Now we can insert this account

	 		$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass), false );

		    if( is_wp_error($user) ){
				$error[] = $user->get_error_message();
			} else{
				$error[] = __('Успешно! Перенаправляем в личный кабинет ..', 'ptheme');
				//wp_redirect( '/profile/' );
			}
		 }
		 
		// ответ в виде json

		echo json_encode(array(
			'error' => $error
		));

	 	die();
}

add_action('wp_ajax_nopriv_pt_login_member', 'pt_login_member');
