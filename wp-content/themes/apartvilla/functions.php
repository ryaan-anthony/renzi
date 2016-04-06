<?php
add_action('after_setup_theme', 'apartvilla_theme_setup');
function apartvilla_theme_setup()
{
	global $wp_version;
	if(!defined('BUNCH_VERSION')) define('BUNCH_VERSION', '1.0');
	if( !defined( 'BUNCH_NAME' ) ) define( 'BUNCH_NAME', 'wp_apartvilla' );
	if( !defined( 'BUNCH_ROOT' ) ) define('BUNCH_ROOT', get_template_directory().'/');
	if( !defined( 'BUNCH_URL' ) ) define('BUNCH_URL', get_template_directory_uri().'/');	
	include_once trailingslashit(get_template_directory()) . '/includes/loader.php';
	
	load_theme_textdomain('apartvilla', get_template_directory() . '/languages');
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( 'woocommerce' );
	add_theme_support( "title-tag" );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'apartvilla'),
				'side_menu' => esc_html__('Side Menu', 'apartvilla'),
				'footer_menu' => esc_html__('Footer Menu', 'apartvilla'),
				'onepage_menu' => esc_html__('Onepage Menu', 'apartvilla'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'apartvilla_three', 1170, 308, true ); //'1170x308'
	add_image_size( 'apartvilla_four', 770, 396, true ); //'770x396'
	add_image_size( 'apartvilla_two', 370, 204, true ); //'370x204'
	add_image_size( 'apartvilla_five', 480, 331, true ); //'480x331'
	add_image_size( 'apartvilla_six', 120, 93, true ); //'120x93'
	add_image_size( 'apartvilla_seven', 670, 417, true ); //'670x417'
	add_image_size( 'apartvilla_one', 162, 162, true ); //'162x162'
	add_image_size( 'apartvilla_eight', 565, 232, true ); //'565x232'
	add_image_size( 'apartvilla_nine', 513, 298, true ); //'513x298'
	add_image_size( 'apartvilla_ten', 370, 346, true ); //'370x346'
	add_image_size( 'apartvilla_eleven', 370, 722, true ); //'370x722'
	
	
	
}
function apartvilla_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	if( class_exists( 'Bunch_Recent_Post_With_Image' ) )register_widget( 'Bunch_Recent_Post_With_Image' );
	if( class_exists( 'Bunch_Meet_Agent' ) )register_widget( 'Bunch_Meet_Agent' );
	
	
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'apartvilla' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'apartvilla' ),
	  'class'=>'',
	  'before_widget'=>'<div id="%1$s" class="widget single-sidebar %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3><span>',
	  'after_title' => '</span></h3>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'apartvilla' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'apartvilla' ),
	  'class'=>'',
	  'before_widget'=>'<article id="%1$s"  class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bottom_area_colum_1 wow fadeInUp %2$s">',
	  'after_widget'=>'</article>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'apartvilla' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'apartvilla' ),
	  'class'=>'',
	  'before_widget'=>'<div id="%1$s" class="widget single-sidebar %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3><span>',
	  'after_title' => '</span></h3>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Page Sidebar', 'apartvilla' ),
	  'id' => 'page-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'apartvilla' ),
	  'class'=>'',
	  'before_widget'=>'<div id="%1$s" class="widget single-sidebar %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3><span>',
	  'after_title' => '</span></h3>'
	));
	
	if( !is_object( _WSH() )  )  return;
	$sidebars = apartvilla_set(apartvilla_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' );
	 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(apartvilla_set($sidebar , 'topcopy')) continue ;
		
		$name = apartvilla_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = apartvilla_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  $slug ,
			'before_widget' => '<div id="%1$s" class="widget single-sidebar %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h3><span>',
			'after_title' => '</span></h3>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'apartvilla_widget_init' );

add_filter('add_to_cart_fragments', 'apartvilla_woo_add_to_cart_ajax');
function apartvilla_woo_add_to_cart_ajax( $fragments ) {
    
	global $woocommerce;
    ob_start();
	
	include get_template_directory() . '/includes/modules/wc_cart.php';
	
	$fragments['li.wc-header-cart'] = ob_get_clean();
	
    return $fragments;
}
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
function apartvilla_animate_it( $atts, $contents = null )
{
	return include get_template_directory() . '/includes/modules/shortcodes/animate_it.php';
}
function apartvilla_load_head_scripts() {
    if ( !is_admin() ) {
	$protocol = is_ssl() ? 'https' : 'http';	
    wp_enqueue_script( 'apartvilla_map_api', ''.$protocol.'://maps.google.com/maps/api/js', array(), '1.0.0', false );
	wp_enqueue_script( 'apartvilla_jquery-googlemap', get_template_directory_uri().'/js/gmap.js', array(), '1.0.0', false );
	}
    }
    add_action( 'wp_enqueue_scripts', 'apartvilla_load_head_scripts' );
//global variables
function bunch_global_variable() {
    global $wp_query;
}
/*-------------------------------------------------------------*/
function apartvilla_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $pt_serif = _x( 'on', 'PT Serif font: on or off', 'apartvilla' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'apartvilla' );
	/* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'apartvilla' );
 
    if ( 'off' !== $pt_serif || 'off' !== $open_sans || 'off' !== $raleway) {
        $font_families = array();
 
        if ( 'off' !== $pt_serif ) {
            $font_families[] = 'PT Serif:400,400italic,700,700italic';
        }
		
		if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:400,100,200,300,500,600,700,800,900';
        }
		
		if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function apartvilla_theme_slug_scripts_styles() {
    wp_enqueue_style( 'theme-slug-fonts', apartvilla_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'apartvilla_theme_slug_scripts_styles' );

function apartvilla_default_comments_on( $data ) {
    if( $data['post_type'] == 'page' ) {
        $data['comment_status'] = 'open';
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'apartvilla_default_comments_on' );

//---custome-editor-style
function apartvilla_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'apartvilla_add_editor_styles' );
//-----admin css
add_action('admin_head', 'apartvilla_admin_custom_style');

function apartvilla_admin_custom_style() {
  echo '<style>
    #setting-error-tgmpa {
      display:block !important;
    } 
  </style>';
}
function apartvilla_get_author_role()
{
    global $authordata;

    $author_roles = $authordata->roles;
    $author_role = array_shift($author_roles);

    return $author_role;
}