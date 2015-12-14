<?php 

function Ferret_set_up()
{
/**
*Register menus.
*/
	 register_nav_menus( array('primary' => 'Primary Navigation'));

/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ferret, use a find and replace
	 * to change 'Ferret' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'Ferret', get_template_directory() . '/languages' );
/**
*Add support for post thumb nails.
*/	
    add_theme_support( 'post-thumbnails' );
/**
*Add support for background.
*/
	$background_args = array('default-color'  => '#f2f2f2','default-repeat' => 'fixed','default-image'  => '' );
    add_theme_support( 'custom-background', $background_args );

  if ( ! isset( $content_width ) ) {
	$content_width = 600;
}


  add_theme_support('nav-menus');
 
/**
*Add support for feed links.
*/
add_theme_support( 'automatic-feed-links' );
/**
*Add support for title tag to avid hard coding.
*/
add_theme_support( 'title-tag' );  
}
add_action('after_setup_theme', 'Ferret_set_up');
/**
 * Enqueue scripts and styles.
 */
function cj_ferret_scripts() {
	wp_enqueue_style('genericon',get_template_directory_uri() .'/lib/font/genericicon/genericons/genericons.css');
	wp_enqueue_style( 'style', get_stylesheet_uri() ,array (), false, 'all');
    wp_enqueue_style('handheld',get_template_directory_uri() .'/lib/css/less-min.css',array (), false, 'all and (max-device-width:768px)');
    wp_enqueue_script( 'functions',get_template_directory_uri().'/lib/js/functions.js',array( 'jquery' ),'',true);
	wp_enqueue_script( 'ie_html5shiv',get_template_directory_uri().'/lib/js/shiv-comp.js');
		wp_style_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );
	}
add_action( 'wp_enqueue_scripts', 'cj_ferret_scripts' );
 $socialsites = array ('github','dribble','twitter','facebook','googleplus','linkedin','pinterest','flickr','vimeo','youtube','tumblr','instagram','codepen','polldaddy','skype','digg','reddit','stumbleupon','pocket','dropbox','foursquare');
function Ferret_media()
{
	global $socialsites;
	$i= 0;
	$soc = '';
  foreach ($socialsites as $arr)
  {
	  if(get_theme_mod($arr) && $i <5)
	  {
		 if($arr == 'skype')
		 {
			 $soc .= '<a href = "'.sanitize_text_field ( get_theme_mod($arr)).'" target="_blank"><span class="genericon genericon-'.$arr.' social-site"></span></a>';
		 }
		 else
		 {
			 $soc .= '<a href = "'.esc_url(get_theme_mod($arr)).'" target="_blank"><span class="genericon genericon-'.$arr.' social-site"></span></a>';
		 }
		 $i++;
	  }
	  else if($i>4)
	  {
		  break;
	  }
  }
    return $soc;
}
/*
*
*Function customizable
*
*/
add_action( 'customize_register', 'ferret_set_custom' );

function ferret_set_custom($wp_customize)
{

$wp_customize->add_panel( 'ferret_logo_settings', array(
        'priority'       =>   200,
        'capability'     =>   'edit_theme_options',
        'title'          =>   __( 'Logo Settings', 'Ferret' ), 
        'description'    =>   __('customize Logo', 'Ferret'),
    ));

    $wp_customize->add_section( 'ferret_logo_section', array(
        'title'         =>    __( 'Logo Settings', 'Ferret' ), 
        'priority'      =>    1, 
        'capability'    =>    'edit_theme_options', 
        'panel'         =>    'ferret_logo_settings',
    ));

     $wp_customize->add_setting( 'ferret_show_logo', 
       array(
          'default' => true, 
          'type' => 'theme_mod', 
          'capability' => 'edit_theme_options', 
          'transport' => 'refresh', 
          'sanitize_callback' => 'ferret_sanitize_checkbox',
       ) 
    );

    $wp_customize->add_control( 'ferret_show_logo', array(
        'type'     => 'checkbox',
        'priority' => 1,
        'section'  => 'ferret_logo_section',
        'label'    => __('Show Logo.', 'Ferret'),
    ));	

    $wp_customize->add_section( 'ferret_logo_upload_section', array(
        'title'         =>    __( 'Upload a Logo', 'Ferret' ), 
        'priority'      =>    2, 
        'capability'    =>    'edit_theme_options', 
        'panel'         =>    'ferret_logo_settings',
    ));
	
	$wp_customize->add_setting( 'ferret_upload_logo', array(
	'default'          => esc_url(get_stylesheet_directory_uri().'/lib/images/photo.jpg'),
	'sanitize_callback' => 'esc_url_raw',
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'logo',array(
               'label'      => __( 'Upload a logo.recommended width 73px,height 100px', 'Ferret' ),
               'section'    => 'ferret_logo_upload_section',
               'settings'   => 'ferret_upload_logo', 
           )
       )
   );
	
	$wp_customize -> add_setting('header_color',
	array(
	'default' => '#090909',
  'sanitize_callback' => 'ferret_sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
  'label' => __( 'Header Background Color', 'Ferret' ),
  'section' => 'colors',
) ) );
$wp_customize -> add_setting('header_colr',
	array(
	'default' => '#FFFFFF',
  'sanitize_callback' => 'ferret_sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_colr', array(
  'label' => __( 'Header Text Color', 'Ferret' ),
  'section' => 'colors',
) ) );
$wp_customize -> add_setting('content_color',
	array(
	'default' => '#FFFFFF',
  'sanitize_callback' => 'ferret_sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_color', array(
  'label' => __( 'Main Content Area Background Color', 'Ferret' ),
  'section' => 'colors',
) ) );
$wp_customize -> add_setting('widget_color',
	array(
	'default' => '#f0f0f0',
  'sanitize_callback' => 'ferret_sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_color', array(
  'label' => __( 'Widget Background Color', 'Ferret' ),
  'section' => 'colors',
) ) );
	$wp_customize->add_panel( 'ferret_social_icons_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'title'          => __('Social Media Sites','Ferret'),
        'description'    => __('Link your website to your social media account.(max 5)','Ferret'),
    ) );

	global $socialsites;
	foreach($socialsites as $social)
	{
	$wp_customize->add_section( 'social_'.$social , array(
        'title'      => $social,
        'priority'   => '3',
        'panel'      => 'ferret_social_icons_panel'
    ) );
        // icon 3
		if($social == 'skype')
			{
        $wp_customize->add_setting( $social , array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( $social, array(
                   'label'      => $social,
				   'description' => __('Write your Skype name in this format skype:skypecontact eg skype:john.doe?call<br />Make sure to indicate?call or ?chat after the name2 to initiate communication if they have installed skype.','Ferret'),
				   'input_attrs' => array(
			       'placeholder' => 'skype:name1.name2?call',
					),
				   'section'    => 'social_'.$social,
                   'settings'   => $social,
               )
       );
	   
			}
		else 
			{
				$wp_customize->add_setting( $social , array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control( $social, array(
                   'label'      => $social,
				   'description' => __("Write the ",'Ferret'). $social .__("account link, eg http://www.",'Ferret').$social__(".com/accountname this should be provided from the ",'Ferret'). $social.__(" site.",'Ferret'),
                   'section'    => 'social_'.$social,
                   'settings'   => $social
               )
       );
			}
	}
	$wp_customize->add_panel( 'ferret_font_panel', array(
        'priority'       => 20,
        'capability'     => 'edit_theme_options',
        'title'          => __('Site font-family and size','Ferret'),
        'description'    => __('Customize your site fonts to your liking.','Ferret'),
    ) );
	$wp_customize->add_section( 'ferret_body_font' , array(
        'title'      => __( 'Main Content Font', 'Ferret' ),
        'priority'   => '3',
        'panel'      => 'ferret_font_panel'
    ) );
	$wp_customize->add_setting('main_font_family',array(
		'default' => 'Georgia',
		'sanitize_callback' => 'sanitize_text_field ',
	));
	$wp_customize->add_control('main_font_family',array(
		'type' => 'text',
  'priority' => 10, // Within the section.
  'section' => 'ferret_body_font',
  'label' => __( 'Main Font Family.','Ferret' ),
  'description' => __( 'Set the font family of the main content text.<br />If you plan on setting many families do so separated with comma','Ferret' ),
  'input_attrs' => array(
    'placeholder' => __( 'font-family','Ferret' ),
  ),
) );
$wp_customize->add_setting('heading_font_family',array(
		'default' => 'Lucida, Arial',
		'sanitize_callback' => 'sanitize_text_field ',
	));
	$wp_customize->add_control('heading_font_family',array(
		'type' => 'text',
  'section' => 'ferret_body_font',
  'label' => __( 'Heading Font Family.','Ferret' ),
  'description' => __( 'Set the font family of the heading text.<br />If you plan on setting many families do so separated with comma','Ferret' ),
  'input_attrs' => array(
    'placeholder' => __( 'font-family1, font-family2','Ferret' ),
  ),
) );
$wp_customize -> add_setting('heading_color',
	array(
	'default' => '#008000',
  'sanitize_callback' => 'ferret_sanitize_hex_color',
	));
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'heading_color',array(
  'section' => 'ferret_body_font',
  'label' => __( 'Main Font Family.','Ferret' ),
  'description' => __( 'Set the font color of the post, comment and widget headings.','Ferret' ),
) ));



}






function ferret_customize_css()
{
?>

<style>
#front-header,.fixed{background:<?php echo ferret_sanitize_hex_color(get_theme_mod('header_color','#090909'));?>; color:<?php echo ferret_sanitize_hex_color(get_theme_mod('header_colr','#FFFFFF'));?>;}
#log a,#site-descript a{color:<?php echo ferret_sanitize_hex_color(get_theme_mod('header_colr','#FFFFFF'));?>;}
.search-input{color:<?php echo ferret_sanitize_hex_color(get_theme_mod('header_colr','#FFFFFF'));?>; background:<?php echo ferret_sanitize_hex_color(get_theme_mod('header_color','#090909'));?>; border-bottom-color:<?php echo ferret_sanitize_hex_color(get_theme_mod('header_colr','#FFFFFF'));?>;}
.content-post{font-family:<?php echo sanitize_text_field(get_theme_mod('main_font_family','Georgia'));?>;}
.widget-title, .rounded,.title,#respond h3,#comments,.widgettitle,.identity{color:<?php echo ferret_sanitize_hex_color(get_theme_mod('heading_color','#008000'));?>;}
.widget-title, .rounded,.title,.round{font-family:<?php echo sanitize_text_field(get_theme_mod('heading_font_family','Lucida, Arial'));?>;}
</style>
	 
<?php 
    
}
add_action( 'wp_head', 'ferret_customize_css');

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function ferret_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function ferret_sanitize_hex_color( $color ) {
	if ( '' === $color )
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}

/*
*Function to place correct  identifier depending on type.
*/
if(!function_exists('ferret_identifier')):
  function ferret_identifier($arr)
  {
	if(in_array('sticky',$arr))
	{
		echo '<span class="genericon genericon-pinned identity" title = "sticky-post"> </span>';
	}
	
	else if(in_array('format-video',$arr))
	{
		echo '<span class="genericon genericon-videocamera identity"></span>';
	}
	else if(in_array('format-aside',$arr))
	{
		echo '<span class="genericon genericon-aside identity"></span>';
	}
	else if(in_array('format-status',$arr))
	{
		echo '<span class="genericon genericon-status identity"></span>';
	}
	else if(in_array('format-link',$arr))
	{
		echo '<span class="genericon genericon-link identity"></span>';
	}
	else if(in_array('format-quote',$arr))
	{
		echo '<span class="genericon genericon-quote identity"></span>';
	}
	else if(in_array('format-chat',$arr))
	{
		echo '<span class="genericon genericon-chat identity"></span>';
	}
	else if(in_array('format-image',$arr))
	{
		echo '<span class="genericon genericon-image identity"></span>';
	}
	else if(in_array('format-gallery',$arr))
	{
		echo '<span class="genericon genericon-picture identity"></span>';
	}
	else if(in_array('format-audio',$arr))
	{
		echo '<span class="genericon genericon-audio identity"></span>';
	}
	else if(in_array('page',$arr))
	{
		echo '<span class="genericon genericon-book identity" title = "post"> </span>';
	}
	else if(in_array('post',$arr))
	{
		echo '<span class="genericon genericon-document identity" title = "post"> </span>';
	}
  }
endif;

 /**
 * Register our sidebars and widgetized areas.
 *
 */

function ferret_widgets_init() {

	register_sidebar( array(
		'name'          => __('right sidebar','Ferret'),
		'id'            => 'sidebar-primary',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="rounded">',
		'after_title'   => '</h3>',
	) );
}
function Ferret_log_details()
{
	if ( is_user_logged_in() ) {
    echo '<a href = "'.wp_logout_url(  get_permalink()  ).'">'.__('Logout','Ferret').'</a>';
	}
	else 
	{
		echo '<a href = "'.wp_login_url(  get_permalink()  ).'">'.__('Login','Ferret').'</a> '.__('or', 'Ferret').' <a href="'. wp_registration_url( get_permalink() ) .'">'.__('Register','Ferret').'</a>';
	}
}
if ( ! function_exists( 'ferret_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function ferret_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link linkb">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s ', 'Ferret' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'ferret_excerpt_more' );
endif;

add_action( 'widgets_init', 'ferret_widgets_init' );

function Ferret_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'Ferret');
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      return __('Posts For ','Ferret').apply_filters('single_term_title', $term->name);
    } elseif (is_post_type_archive()) {
      return __('Posts For ','Ferret').apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      return sprintf(__('Daily Archives: %s', 'Ferret'), get_the_date());
    } elseif (is_month()) {
      return sprintf(__('Monthly Archives: %s', 'Ferret'), get_the_date('F Y'));
    } elseif (is_year()) {
      return sprintf(__('Yearly Archives: %s', 'Ferret'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      return sprintf(__('Author Archives: %s', 'Ferret'), $author->display_name);
    } else {
      return __('Posts For ','Ferret').single_cat_title('', false);
    }
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'Ferret'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'Ferret');
  } else {
    return get_the_title();
  }
}
if(!function_exists('Ferret_header_bar')):
    function Ferret_header_bar()
	{
		if(! is_home())
		{
			$r = '<span class = "topbar"><hr /><a class = "homelnk" href="'.esc_url( home_url( '/' ) ).'"><span class="genericon genericon-home"></span></a>';
			if(is_single())
			{
				$c = get_the_category();
				$cat_name = $c[0]->name;
				$cat_id = get_cat_ID($cat_name);
				$cat_link = get_category_link($cat_id);
				$r .= ' | <a class = "lik" href = "'.$cat_link.'">'.$cat_name.'</a>';
			}
			$r .= ' | '.Ferret_title().'<hr /></span>';
		}
		else {$r = '';}
		return $r;
	}
endif;
function custom_wp_link_pages( $args = '' ) {
	$defaults = array(
		'before' => '<p id="post-pagination">' . __( 'Pages:','Ferret' ),
		'after' => '</p>',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number',
		'nextpagelink' => __( 'Next page','Ferret' ),
		'previouspagelink' => __( 'Previous page'.'Ferret' ),
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= ' ';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= _wp_link_page( $i );
				else
					$output .= '<span class="current-post-page">';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>';
				}
				$output .= $after;
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}
function ce4_excerpt_length($length) {
    return 75;
}
add_filter('excerpt_length', 'ce4_excerpt_length');

function ce4_excerpt_more($more) {
    global $post;
    return '...<a href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'ce4_excerpt_more');
function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );
?>	