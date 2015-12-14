<?php
/*
*Template to produce an excerpt used in archive, home (if set for latest posts in settings),
*category among others.
*/
?>
<span class = "allex">
<header id = "ex-header">
<?php ferret_identifier(get_post_class());?><a class = "linka lnk" href= "<?php the_permalink(); ?>"><h2 class = "title"><?php the_title();?></h2></a>
<hr />
<span class = "time"><span class="genericon genericon-time" title="Time"></span><span class = 'linkab'><a class = "linka lnk" href= "<?php the_permalink(); ?>"><?php echo date("F j,Y",get_post_time());?></a></span></span> 
 | <span class = "author"><span class="genericon genericon-user"title = "User"></span> <span class = "linka"><?php the_author_posts_link();?></span></span>
<hr />
</header>
<div id = "pos-ex" class = "content-post content-excep">
<!-- featured image -->
    <?php if ( '' != get_the_post_thumbnail() ) { ?>
      <div class="exc-featured-image thumbnail">
          <?php the_post_thumbnail('featured-single'); ?>
      </div>
    <?php } ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 

$gte = get_the_excerpt();
if($gte == ''):
_e('This post seems to contain nothing.','Ferret');
else:
echo the_excerpt();
endif;
?>
</div>
</div>
<footer class = 'ex-footer' >
<?php 
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
?>
</footer>
<br />
</span>
