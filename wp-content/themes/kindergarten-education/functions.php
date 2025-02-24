<?php
/**
 * Kindergarten Education functions and definitions
 * @package Kindergarten Education
 */

/* Theme Setup */
if ( ! function_exists( 'kindergarten_education_setup' ) ) :

function kindergarten_education_setup() {

	$GLOBALS['content_width'] = apply_filters( 'kindergarten_education_content_width', 640 );
	
	load_theme_textdomain( 'kindergarten-education', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('kindergarten-education-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kindergarten-education' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', kindergarten_education_font_url() ) );

}
endif; // kindergarten_education_setup
add_action( 'after_setup_theme', 'kindergarten_education_setup' );

/*radio button sanitization*/
 function kindergarten_education_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function kindergarten_education_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function kindergarten_education_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/* Theme Widgets Setup */
function kindergarten_education_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'kindergarten-education' ),
		'description'   => __( 'Appears on posts and pages', 'kindergarten-education' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$kindergarten_education_widget_areas = get_theme_mod('footer_widget_areas', '4');
	for ($i=1; $i<=$kindergarten_education_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'kindergarten-education' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'kindergarten_education_widgets_init' );


/* Theme Font URL */
function kindergarten_education_font_url() {
	$font_url      = '';
	$font_family   = array();
	$font_family[] = 'Dosis:200,300,400,500,600,700,800';
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Alex Brush';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	$font_family[] = 'Dancing Script:400,700';
	
	$query_args = array(
		'family' => rawurlencode(implode('|', $font_family)),
	);
	$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function kindergarten_education_scripts() {
	wp_enqueue_style( 'kindergarten-education-font', kindergarten_education_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'kindergarten-education-block-style', get_theme_file_uri('/css/blocks.css') );
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/css/bootstrap.css');
	wp_enqueue_style( 'kindergarten-education-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'kindergarten-education-style', 'rtl', 'replace' );	
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );

	// Paragraph
	$kindergarten_education_paragraph_color       = get_theme_mod('kindergarten_education_paragraph_color', '');
	$kindergarten_education_paragraph_font_family = get_theme_mod('kindergarten_education_paragraph_font_family', '');
	$kindergarten_education_paragraph_font_size   = get_theme_mod('kindergarten_education_paragraph_font_size', '');
	// "a" tag
	$kindergarten_education_atag_color       = get_theme_mod('kindergarten_education_atag_color', '');
	$kindergarten_education_atag_font_family = get_theme_mod('kindergarten_education_atag_font_family', '');
	// "li" tag
	$kindergarten_education_li_color       = get_theme_mod('kindergarten_education_li_color', '');
	$kindergarten_education_li_font_family = get_theme_mod('kindergarten_education_li_font_family', '');
	
	// H1
	$kindergarten_education_h1_color       = get_theme_mod('kindergarten_education_h1_color', '');
	$kindergarten_education_h1_font_family = get_theme_mod('kindergarten_education_h1_font_family', '');
	$kindergarten_education_h1_font_size   = get_theme_mod('kindergarten_education_h1_font_size', '');
	// H2
	$kindergarten_education_h2_color       = get_theme_mod('kindergarten_education_h2_color', '');
	$kindergarten_education_h2_font_family = get_theme_mod('kindergarten_education_h2_font_family', '');
	$kindergarten_education_h2_font_size   = get_theme_mod('kindergarten_education_h2_font_size', '');
	// H3
	$kindergarten_education_h3_color       = get_theme_mod('kindergarten_education_h3_color', '');
	$kindergarten_education_h3_font_family = get_theme_mod('kindergarten_education_h3_font_family', '');
	$kindergarten_education_h3_font_size   = get_theme_mod('kindergarten_education_h3_font_size', '');
	// H4
	$kindergarten_education_h4_color       = get_theme_mod('kindergarten_education_h4_color', '');
	$kindergarten_education_h4_font_family = get_theme_mod('kindergarten_education_h4_font_family', '');
	$kindergarten_education_h4_font_size   = get_theme_mod('kindergarten_education_h4_font_size', '');
	// H5
	$kindergarten_education_h5_color       = get_theme_mod('kindergarten_education_h5_color', '');
	$kindergarten_education_h5_font_family = get_theme_mod('kindergarten_education_h5_font_family', '');
	$kindergarten_education_h5_font_size   = get_theme_mod('kindergarten_education_h5_font_size', '');
	// H6
	$kindergarten_education_h6_color       = get_theme_mod('kindergarten_education_h6_color', '');
	$kindergarten_education_h6_font_family = get_theme_mod('kindergarten_education_h6_font_family', '');
	$kindergarten_education_h6_font_size   = get_theme_mod('kindergarten_education_h6_font_size', '');

	$kindergarten_education_custom_css = '
		p,span{
		    color:'.esc_html($kindergarten_education_paragraph_color).'!important;
		    font-family: '.esc_html($kindergarten_education_paragraph_font_family).';
		    font-size: '.esc_html($kindergarten_education_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($kindergarten_education_atag_color).'!important;
		    font-family: '.esc_html($kindergarten_education_atag_font_family).';
		}
		li{
		    color:'.esc_html($kindergarten_education_li_color).'!important;
		    font-family: '.esc_html($kindergarten_education_li_font_family).';
		}
		h1{
		    color:'.esc_html($kindergarten_education_h1_color).'!important;
		    font-family: '.esc_html($kindergarten_education_h1_font_family).'!important;
		    font-size: '.esc_html($kindergarten_education_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($kindergarten_education_h2_color).'!important;
		    font-family: '.esc_html($kindergarten_education_h2_font_family).'!important;
		    font-size: '.esc_html($kindergarten_education_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($kindergarten_education_h3_color).'!important;
		    font-family: '.esc_html($kindergarten_education_h3_font_family).'!important;
		    font-size: '.esc_html($kindergarten_education_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($kindergarten_education_h4_color).'!important;
		    font-family: '.esc_html($kindergarten_education_h4_font_family).'!important;
		    font-size: '.esc_html($kindergarten_education_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($kindergarten_education_h5_color).'!important;
		    font-family: '.esc_html($kindergarten_education_h5_font_family).'!important;
		    font-size: '.esc_html($kindergarten_education_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($kindergarten_education_h6_color).'!important;
		    font-family: '.esc_html($kindergarten_education_h6_font_family).'!important;
		    font-size: '.esc_html($kindergarten_education_h6_font_size).'!important;
		}
	';
	wp_add_inline_style('kindergarten-education-basic-style', $kindergarten_education_custom_css);

	
	/* Theme Color sheet */
	require get_parent_theme_file_path( '/theme-color-option.php' );
	wp_add_inline_style( 'kindergarten-education-basic-style',$kindergarten_education_custom_css );
	wp_enqueue_script( 'tether-js', esc_url(get_template_directory_uri()) . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'kindergarten-education-customscripts', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kindergarten_education_scripts' );

define('KINDERGARTEN_EDUCATION_LIVE_DEMO',__('https://www.buywptemplates.com/kindergarten-education-pro/', 'kindergarten-education'));
define('KINDERGARTEN_EDUCATION_BUY_PRO',__('https://www.buywptemplates.com/themes/kindergarten-education-wordpress-theme/', 'kindergarten-education'));
define('KINDERGARTEN_EDUCATION_PRO_DOC',__('https://buywptemplates.com/demo/docs/kindergarten-education-pro/', 'kindergarten-education'));
define('KINDERGARTEN_EDUCATION_FREE_DOC',__('https://buywptemplates.com/demo/docs/free-kindergarten-education/', 'kindergarten-education'));
define('KINDERGARTEN_EDUCATION_PRO_SUPPORT',__('https://www.buywptemplates.com/support/', 'kindergarten-education'));
define('KINDERGARTEN_EDUCATION_FREE_SUPPORT',__('https://wordpress.org/support/theme/kindergarten-education/', 'kindergarten-education'));
define('KINDERGARTEN_EDUCATION_CREDIT',__('https://www.buywptemplates.com/themes/free-education-wordpress-theme/', 'kindergarten-education'));

if ( ! function_exists( 'kindergarten_education_credit' ) ) {
	function kindergarten_education_credit(){
		echo "<a href=".esc_url(KINDERGARTEN_EDUCATION_CREDIT).">".esc_html__('Education WordPress Theme','kindergarten-education')."</a>";
	}
}

/* Excerpt Limit Begin */
function kindergarten_education_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Switch sanitization */
if ( ! function_exists( 'kindergarten_education_switch_sanitization' ) ) {
	function kindergarten_education_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/* Integer sanitization */
if ( ! function_exists( 'kindergarten_education_sanitize_integer' ) ) {
	function kindergarten_education_sanitize_integer( $input ) {
		return (int) $input;
	}
}

function kindergarten_education_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'kindergarten_education_loop_columns');
if (!function_exists('kindergarten_education_loop_columns')) {
	function kindergarten_education_loop_columns() {
		$kindergarten_education_columns = get_theme_mod( 'kindergarten_education_per_columns', 3 );
		return $kindergarten_education_columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'kindergarten_education_shop_per_page', 20 );
function kindergarten_education_shop_per_page( $cols ) {
  	$kindergarten_education_cols = get_theme_mod( 'kindergarten_education_product_per_page', 9 );
	return $kindergarten_education_cols;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';

/* Get Started */
require get_template_directory() . '/inc/dashboard/get_started_info.php';