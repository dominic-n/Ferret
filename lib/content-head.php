<div id = 'front-header'>
<span class = "lost">
<span class= 'f-header'>
<?php if(ferret_sanitize_checkbox(get_theme_mod( 'ferret_show_logo',true)) ):?>
<span class = 'img'>
<a href = "<?php echo esc_url( home_url( '/' ) );?>">
<img src = "<?php echo esc_url( get_theme_mod( 'ferret_upload_logo',esc_url(get_stylesheet_directory_uri().'/lib/images/photo.jpg')) ); ?>" height="100px" width="73px"/>
</a>
</span>
<?php else: ?>
<span class = 'img'>
<img src = "" style="visibility:hidden;"height="100px" width="73px"/>
</span>
<?php endif;?>
<span class = "nav">
</span>
</span>
<div id = "site-descript">
<span class = "site-title">
<a href = "<?php echo esc_url( home_url( '/' ) );?>">
<?php echo get_bloginfo( 'title' );?>
</a>
</span>
<span class = "site-descript">
<?php echo get_bloginfo( 'description' );?>
</span>
</div>
<div id ="log">
<?php Ferret_log_details();?>
</div>
<?php 
if(Ferret_media() != ''):
?>
<div id = "social-media" class = "tes">
<?php 
echo Ferret_media();
?>
</div>
<?php 
endif;
?>
</span>
<span class='fixed'>
<span class = 'tes'>
<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
</span>
<span class = 'search-bar'>
<form method = 'get' action = '<?php echo esc_url( home_url( '/' ) ); ?>' name = 'search'>
<input type = 'text' name = 's' class = 'search-input' id = 'searchinput' placeholder = '<?php _e('Search','Ferret');?>'/>
<span class="genericon genericon-search"></span>
</form>
</span>
</span>
</div>