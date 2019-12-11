<?php

/**
 * Plugin Name: Leave Notes
 * Plugin URI: None
 * Description: A simple way to leave notes on within your WordPress admin panel. Use it to remind yourself of things to do, or leave a note for your users.
 * Version: 1.0
 * Author: John Bagnall
 * Author URI: None
 */

// defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_action( 'admin_menu', 'leave_notes_menu' );

function leave_notes_menu(){
  $page_title = 'Leave Notes Plugin';
  $menu_title = 'Leave Notes';
  $capability = 'manage_options';
  $menu_slug  = 'leave-notes';
  $function   = 'custom_form';
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



function custom_form() {
 ?>
    <form action ="<?php echo $_SERVER['REQUEST_URI']; ?>" method ="post">

    <label for name=""> Title</label><br>
    <input type = "text" name = "title" id = "title" placeholder = "Enter Title">
    <label for name=""> Note:</label><br>
    <textarea type = "text" name = "note" id = "note" placeholder = "Enter Note"></textarea>
    <input type = "submit" name = "submit" value = "Insert">

    </form>
 <?php
}


if($_POST['submit']) {
 global $wpdb;
 $table_name ='plugin_notes';
 $title = $_POST['title'];
 $note = $_POST['note'];
 
 $success = $wpdb->insert('plugin_notes', array(
   "title" => $title,
   "note" => $note,
));
 if($success) {
 echo ' Inserted successfully';
      } else {
   echo 'not';
   }
}
?>