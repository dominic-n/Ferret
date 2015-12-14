<?php 
/*
*@Description: This is a template to display the home page of the theme and is one of the two mandatory files required for any WordPress theme.
*@Author: Dominic_N.
*@Package: WordPress.
*@Sub-Package: Ferret.
*@Since: V 1.0.0.
*/
?>

<?php 
//We call the Header Template.
  get_header();
?>


<?php 
get_template_part('lib/content','archive');
?>

<?php 
//Footer Template.
  get_footer();
?>