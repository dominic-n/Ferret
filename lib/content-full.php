<?php
/*
*Template to produce single.
*/
?>

<span class = "allex">
<header id = "ex-header">
<h2 class = "title"><?php the_title();?></h2>
<hr />
<span class = "time"><span class="genericon genericon-time" title="Time"></span><span class = 'linkab'><a class = "linka lnk" href= "<?php the_permalink(); ?>"><?php echo date("F j,Y",get_post_time());?></a></span></span> 
 | <span class = "author"><span class="genericon genericon-user"title = "User"></span> <span class = "linka"><?php the_author_posts_link();?></span></span>
<?php if(current_user_can( 'edit_posts')) {?>
 <span class = "alignright" style="display:inline; margin:0px;">
<a href = "<?php  get_edit_post_link();?>">
<span class="genericon genericon-edit"title = "Edit"></span>
</a>
</span>
<?php } ?>
 <hr />
</header>
<div id = "pos-ex" class = "content-post">
<!-- featured image -->
    <?php if ( '' != get_the_post_thumbnail() ) { ?>
      <div class="exc-featured-image thumbnail">
          <?php the_post_thumbnail('featured-single'); ?>
      </div>
    <?php } ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 

$gte = get_the_content();
if($gte == ''):
_e('This post seems to contain nothing.','Ferret');
else:
echo the_content();
endif;
?>
</div>
</div>
<?php custom_wp_link_pages(array('before' => '<nav class="page-nav"><p><span class = "ona">' . __('Pages:', 'Ferret').'</span>', 'after' => '</p></nav>',
    'link_before'       => '<span class="page-link">',
    'link_after'        => '</span>',
)); ?>
<footer class = 'ex-footer' >
<?php 
if(is_single())
{
if(get_the_category() != '')
{
	?>
<hr />
<span class = "categ">
<span class="genericon genericon-category" title = "Category"></span> <span class = "linka"><?php echo the_category(', ');?></span>
</span>
<?php 
}
?>
<hr />
<?php 
if(get_the_tags() != '')
{
	?>
	<span class = 'genericon genericon-tag' title = "Tag"></span>
	<?php 
	echo the_tags('');
	?>
	<hr />
	<?php 
}
}
if(is_page())
{
	?>
	<hr />
	<?php 
}
?>

</footer>
<br />
<?php
if(is_single())
{
	?>
<div id = "post_nav">
<br /><br />
<hr />



<div class="inline">
<span class = "previous_post"><?php 
if(get_previous_post_link()):
 
$format = __('Previous Post: ','Ferret').'%link';
previous_post_link($format); 
endif;
?></span>
</div>
<div class="inline">
<span class = "next_post"><?php
if(get_next_post_link()):
$format = __('Next Post: ','Ferret').'%link';
 next_post_link($format);
endif;
 ?></span>
</div>

<hr />
<br />
</div>
<?php }
 ?>
<div id = "post_comments">
<?php 
comments_template();
?>
</div>
</span>
