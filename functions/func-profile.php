<?php

global $current_user, $wp_roles;

function update_user_profile() {

    $userID = esc_attr($_POST['user-id']);
    $userMail = esc_attr($_POST['user-email']);
    $userName = esc_attr($_POST['first-name']);
    $error = array();    

    /* Update user information. */

    if (!empty($userMail)) {
        if (!is_email($userMail))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        else {
            wp_update_user( array ('ID' => $userID, 'user_email' => $userMail));
        }
    }

    if (!empty($userName)) {
        update_user_meta($userID, 'first_name', $userName);    
    } 
    
    echo json_encode(array(
        'name' => $userName,
        'error' => $error
    ));

    die;

}

add_action('wp_ajax_update_user_profile', 'update_user_profile');

?>