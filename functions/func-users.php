<?php

global $current_user;

// редирект, когда залогинтлись
add_action( 'admin_init', 'redirect_so_15396771' );

function redirect_so_15396771()
{   
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX )  
        return;

    if ( !current_user_can('delete_users') ) {
        
        wp_redirect( site_url( '/profile/' ) );
        exit();
    }
}

// редирект, когда вышли
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( '/' );
         exit();
}

// remove dash panel

$user = wp_get_current_user();
$role = ( array )$user->roles;
$role = $role[0];
if ($role === "subscriber") {
    add_filter('show_admin_bar', '__return_false');
}        

?>