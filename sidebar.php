<?php
/**
 * main sidebar template.
 */
?>

<!-- load widgets if any -->
<?php if ( is_active_sidebar( 'sidebar-primary' ) ) {
	dynamic_sidebar('sidebar-primary');
} else { 
_e('This sidebar seems to contain no widgets. Go to customization > widgets and add widgets to primary sidebar.','Ferret');
} ?>