<?php

/**
 * Plugin Name: Leave Notes
 * Plugin URI: None
 * Description: A simple way to leave notes on within your WordPress admin panel. Use it to remind yourself of things to do, or leave a note for your users.
 * Version: 1.0
 * Author: John Bagnall
 * Author URI: None
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_action( 'admin_menu', 'leave_notes_menu' );

function leave_notes_menu(){
  $page_title = 'Leave Notes Plugin';
  $menu_title = 'Leave Notes';
  $capability = 'manage_options';
  $menu_slug  = 'leave-notes';
  $function   = 'leave_notes_page';
  $icon_url   = 'dashicons-media-code';
  $position   = 4;
  add_menu_page( $page_title,
                 $menu_title, 
                 $capability, 
                 $menu_slug, 
                 $function, 
                 $icon_url, 
                 $position );
}

function leave_notes_page() {
    ?>
    <h1>Leave Notes</h1>
    <form>
        Title: <input type="text"></br>
        Note: <textarea rows="20" cols="100"></textarea>
    </form>
    <?php
}