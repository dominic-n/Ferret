<?php 
/*
*@Description: This file contains the header part of the document.
*@subPackage: Ferret.
*@since: v 1.0.0.
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head>
   <meta charset = "<?php bloginfo('charset'); ?>"/>
   <?php
	if(get_bloginfo('description')):
   ?>
   <meta name = "description" content = "<?php bloginfo('description'); ?>" />
   <?php
    endif;
   ?>
 
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php
     if ( ! function_exists( '_wp_render_title_tag' ) ) {
	 function theme_slug_render_title() {
   ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
   <?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
    }
   ?>
 <?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
	wp_head();
 ?>
 </head>
 <body <?php body_class(); ?>>
 <?php get_template_part('lib/content','head'); ?>
 <div id = "cont">
 <?php echo Ferret_header_bar();?>
 <div id = "mainLoop" class = "loop blockin">
