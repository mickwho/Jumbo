<?php
/**
 * Cover functions and definitions
 *
 * @file 	functions.php
 * @package Jumbo
 * @author 	Mick Dupont
 */

require_once('wp_bootstrap_navwalker.php');

// create custom plugin settings menu
add_action('admin_menu', 'theme_create_menu');

function theme_create_menu() {

	//create new top-level menu

	add_menu_page( 'Theme Settings Page', 'Theme Settings', 'manage_options', 'theme_settings_page', 'theme_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_settings' );
}


function register_settings() {
	//register our settings
	register_setting( 'front-feature', 'logo' );
	register_setting( 'front-feature', 'feature_title' );
	register_setting( 'front-feature', 'feature_description' );
	register_setting( 'front-feature', 'link_cta' );
	register_setting('front-feature', 'link_url');
	register_setting('front-feature', 'featured_article_first');
	register_setting('front-feature', 'featured_article_second');
	register_setting('front-feature', 'featured_article_third');
	register_setting('front-feature', 'feat1_reg_title');
	register_setting('front-feature', 'feat1_muted_title');
	register_setting('front-feature', 'feat1_desc');
	register_setting('front-feature', 'feat1_img');
	register_setting('front-feature', 'feat2_reg_title');
	register_setting('front-feature', 'feat2_muted_title');
	register_setting('front-feature', 'feat2_desc');
	register_setting('front-feature', 'feat2_img');
}
function theme_settings_page() {

	if ($_GET['settings-updated'] == 'true') {
		echo '<div id="message" class="updated">Settings saved</div>';
	}
?>
<div class="wrap">
<h2>Theme Settings</h2>

<form method="post" action="options.php">
    <?php 
    	
    settings_fields( 'front-feature' ); ?>
    <?php do_settings_sections( 'front-feature' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Feature Title</th>
        <td><input type="text" name="feature_title" value="<?php echo get_option('feature_title'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Feature Description</th>
        <td><textarea name="feature_description" cols="80" rows="4"/><?php echo get_option('feature_description'); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Link Text</th>
        <td><input type="text" name="link_cta" value="<?php echo get_option('link_cta'); ?>" /></td>
        </tr>
         <tr valign="top">
        <th scope="row">Link Url</th>
        <td><input type="text" name="link_url" value="<?php echo get_option('link_url'); ?>" /></td>
        </tr>
     </table>
	<p><h3>Home Featured Articles</h3>Enter the ID of the page.</p>
     <table class="form-table">
        <tr valign="top">
        <th scope="row">Featured Article #1</th>
        <td><input type="text" name="featured_article_first" value="<?php echo get_option('featured_article_first'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Featured Article #2</th>
        <td><input type="text" name="featured_article_second" value="<?php echo get_option('featured_article_second'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Featured Article #3</th>
        <td><input type="text" name="featured_article_third" value="<?php echo get_option('featured_article_third'); ?>" /></td>
        </tr>
        <hr/>
        </table>
		
        <table class="form-table">
        <tr valign="top">
        <th scope="row">Title</th>
        <td><input type="text" name="feat1_reg_title" value="<?php echo get_option('feat1_reg_title'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Gray Text in title</th>
        <td><input type="text" name="feat1_muted_title" value="<?php echo get_option('feat1_muted_title'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Description</th>
        <td><input type="text" name="feat1_desc" value="<?php echo get_option('feat1_desc'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Image URL</th>
        <td><input type="text" name="feat1_img" value="<?php echo get_option('feat1_img'); ?>" /></td>
        </tr>
        <hr/>
        <p><h3>Home Featurette</h3>Enter the title, description and image.</p>
        <table class="form-table">
        <tr valign="top">
        <th scope="row">Title</th>
        <td><input type="text" name="feat2_reg_title" value="<?php echo get_option('feat2_reg_title'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Gray Text in title</th>
        <td><input type="text" name="feat2_muted_title" value="<?php echo get_option('feat2_muted_title'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Description</th>
        <td><input type="text" name="feat2_desc" value="<?php echo get_option('feat2_desc'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Image URL</th>
        <td><input type="text" name="feat2_img" value="<?php echo get_option('feat2_img'); ?>" /></td>
        </tr>
        <hr/>
    </table>
    
    <?php submit_button(); ?>
<input type="hidden" name="update_settings" value="Y" />
</form>
</div>
<?php }

function themeslug_theme_customizer( $wp_customize ) {
  $wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
  ) );
  $wp_customize->add_setting( 'themeslug_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'cover' ),
) );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'cover_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cover_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cover, use a find and replace
	 * to change 'cover' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cover', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cover' ),
	) );

	register_nav_menus( array(
		'footer' => __( 'Footer Menu', 'cover' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cover_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // cover_setup
add_action( 'after_setup_theme', 'cover_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cover_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cover' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'cover_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cover_scripts() {
	wp_enqueue_style( 'cover-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cover-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'cover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cover_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

