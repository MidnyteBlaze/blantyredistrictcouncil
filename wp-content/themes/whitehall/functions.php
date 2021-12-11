<?php require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'whitehall_setup_theme' );
add_action( 'after_setup_theme', 'whitehall_load_default_hooks' );


function whitehall_setup_theme() {

	load_theme_textdomain( 'whitehall', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
    add_image_size( 'whitehall_120x120', 120, 120, true ); //Testimonials V1
    add_image_size( 'whitehall_270x270', 270, 270, true ); //Team V1 & V2
    add_image_size( 'whitehall_370x270', 370, 270, true ); //Blog V1 & Grid
    add_image_size( 'whitehall_270x290', 270, 290, true ); //Services V1 & V3
    add_image_size( 'whitehall_270x370', 270, 370, true ); //Departments V2 & V3
    add_image_size( 'whitehall_370x455', 370, 455, true ); //Events
    add_image_size( 'whitehall_470x250', 470, 250, true ); //Blog V2
    add_image_size( 'whitehall_60x60', 60, 60, true ); //Testimonials V2
    add_image_size( 'whitehall_370x400', 370, 400, true ); //Portfolio V1
    add_image_size( 'whitehall_370x320', 370, 320, true ); //Portfolio V2
    add_image_size( 'whitehall_370x265', 370, 265, true ); //Portfolio V3
    add_image_size( 'whitehall_370x560', 370, 560, true ); //Portfolio V3
    add_image_size( 'whitehall_770x560', 770, 560, true ); //Portfolio V3
    add_image_size( 'whitehall_730x500', 730, 500, true ); //Our Blog & Blog Single
    add_image_size( 'whitehall_70x70', 70, 70, true ); //Blog Sidebar
	
	/*---------- Register image sizes ends ----------*/



	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top_menu' => esc_html__( 'Top Menu', 'whitehall' ),
		'main_menu' => esc_html__( 'Main Menu', 'whitehall' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'whitehall' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'whitehall' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'whitehall_admin_init', 2000000 );
}

/**
 * [whitehall_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function whitehall_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [whitehall_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function whitehall_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'whitehall' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'whitehall' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'whitehall' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	) );
	register_sidebar(array(
		'name' => esc_html__( 'Blog Listing', 'whitehall' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'whitehall' ),
		'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'whitehall'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'whitehall'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
			'name' => esc_html__('Department Widget', 'whitehall'),
			'id' => 'department-sidebar',
			'description' => esc_html__('Widgets in this area will be shown in Service Details Area.', 'whitehall'),
			'before_widget' => '<div id="%1$s" class="department-widget widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3><div class="title-shape"></div></div>'
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget Two', 'whitehall'),
			'id' => 'footer-sidebar-2',
			'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'whitehall'),
			'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
			'after_widget'=>'</div></div>',
			'before_title' => '<div class="widget-title"><h4>',
			'after_title' => '</h4></div>'
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget RTL', 'whitehall'),
			'id' => 'footer-sidebar-3',
			'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'whitehall'),
			'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
			'after_widget'=>'</div></div>',
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3></div>'
		));
	}
	
	if ( ! is_object( whitehall_WSH() ) ) {
		return;
	}

	$sidebars = whitehall_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( whitehall_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'whitehall_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function whitehall_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'whitehall' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'whitehall' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'whitehall' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'whitehall' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'whitehall' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'whitehall' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'whitehall' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'whitehall' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'whitehall' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'whitehall_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function whitehall_enqueue_scripts() {
	//styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );	
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'whitehall-main', get_stylesheet_uri() );
	wp_enqueue_style( 'whitehall-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'whitehall-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'whitehall-color', get_template_directory_uri() . '/assets/css/color.css' );
	wp_enqueue_style( 'whitehall-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'whitehall-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl-theme', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'nav-tool', get_template_directory_uri().'/assets/js/nav-tool.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri().'/assets/js/bxslider.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/countdown.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'whitehall-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'whitehall_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function whitehall_fonts_url() {
	
	$fonts_url = '';

		$font_families['DM+Sans'] = 'DM Sans:ital,wght@0,400,0,500,0,700,1,400,1,500,1,700';
		$font_families['Merriweather+Sans'] = 'Merriweather Sans:ital,wght@0,300,0,400,0,500,0,600,0,700,0,800,1,300,1,400,1,500,1,600,1,700,1,800';

		$font_families = apply_filters( 'WHITEHALL/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function whitehall_theme_styles() {
    wp_enqueue_style( 'whitehall-theme-fonts', whitehall_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'whitehall_theme_styles' );
add_action( 'admin_enqueue_scripts', 'whitehall_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) whitehall_set function

/**
 * [whitehall_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'whitehall_set' ) ) {
	function whitehall_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) whitehall_add_editor_styles function

function whitehall_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'whitehall_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = whitehall_WSH()->option(); 
if( whitehall_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
/*---------- More functions ends ----------*/


// 4) whitehall_related_products_limit function 

function whitehall_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'whitehall_related_products_args', 20 );
function whitehall_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}

//Shop Product per page
function whitehall_shop_per_page( $cols ) {
  $cols = 12;
  return $cols;
}
add_filter( 'loop_shop_per_page', 'whitehall_shop_per_page', 20 );
/*---------- More functions ends ----------*/
