<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Remove About User
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Removes the section about the user (i.e. the biography) from user profiles.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


defined( 'ABSPATH' ) || die;

add_action( 'user_edit_form_tag', function () {
    ob_start( function ( $content ) {
        $start = '<h2>(?:' . __( 'About Yourself' ) . '|' . __( 'About the user' ) . ')</h2>';
        $stop = '<h2>' . __( 'Account Management' ) . '</h2>';
        return preg_replace( "`$start.*(?=$stop)`s", '', $content, 1 );
    } );
} );

add_action( 'show_user_profile', 'ob_end_flush' );
add_action( 'edit_user_profile', 'ob_end_flush' );