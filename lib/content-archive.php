<?php 
/*
*This is a template to display posts and pages on a given archive.
*
*@since 1.0.0
*
*
*/
?>
<div id = "header-banner">
<h2 class = "round">
<?php echo Ferret_title();?>
</h2>
</div>
<?php
 if(have_posts()):
 while(have_posts()):
 the_post();
?>
<?php 
get_template_part('lib/content','excerpt');
?>
<?php 
endwhile;
the_posts_pagination( array( 'mid_size' => 2,'prev_text'=>__('Back','Ferret'),'next_text'=>__('Next','Ferret'),'screen_reader_text' => ' ') );
else:
get_template_part('lib/content','error');
endif;
?>
