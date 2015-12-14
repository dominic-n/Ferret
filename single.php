<?php 
/*
*This template displays a post content.
*/
?>
<?php 
get_header();
the_post();
get_template_part('lib/content','full');
get_footer(); 
?>