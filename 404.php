<?php 
get_header();
?>
<span class = "groupedf">
<h1 class = "fourohfour gradtext">404</h1>
<h2 class = "gradtext contentnf"><?php _e('Content Not Found','Ferret');?></h2>
</span>
<p class = "lucida">
<?php _e('Sorry, The content you are looking for is not available.','Ferret')?>
<br />
<?php _e('Try searching and see if you might get something similar.','Ferret')?>
<br />
<?php
get_search_form(); 
?>
</p>
<?php 
get_footer();
?>