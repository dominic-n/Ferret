</div><!--End of #mainLoop. -->
<div id = "sideba"  class = "blockin">
<?php get_sidebar(); ?>
</div>
<br />
<footer id = "mainfooter">
<hr />
<div class = "footertext">
<?php 
_e('Theme developed and maintained by ','Ferret');
?>
Dominic_N. &copy; <a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo get_bloginfo( 'title' );?> </a>2015
<?php 
if((date('Y')) > 2015)echo ' - '.date('Y');
?>
</div>
</footer>
</div><!-- end of #cont-->
<?php wp_footer();?>
</body>
</html>
