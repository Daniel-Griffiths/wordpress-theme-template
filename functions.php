<?php
/*
|-------------------------------------------------------
| Initialise custom theme code
|-------------------------------------------------------
*/

require __DIR__.'/includes/init.php';

/*
|-------------------------------------------------------
| Declare woocommerce support
|-------------------------------------------------------
*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*
|-------------------------------------------------------
| Clean up the WordPress head
|-------------------------------------------------------
|
| Removes unnecessary files from the wordpress header
| function. This gives the theme a small speed boost
|
|*/

/* remove header links */
add_action('init', 'tjnz_head_cleanup');
function tjnz_head_cleanup() {
    remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );			// Emoji
    remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
    remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
    remove_action( 'wp_head', 'index_rel_link' );                           // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
    remove_action( 'wp_head', 'wp_generator' );                             // WP version
    if (!is_admin()) {
        wp_deregister_script('jquery');                                     // De-Register jQuery
        wp_register_script('jquery', '', '', '', true);                     // Register as 'empty', because we manually insert our script in header.php
    }
}

/* remove WP version from RSS */
add_filter('the_generator', 'tjnz_rss_version');
function tjnz_rss_version() { return ''; }

/*
|-------------------------------------------------------
| Remove theme editor
|-------------------------------------------------------
| 
| Stops people being able to edit core theme files
| from within Wordpress
|
|*/

function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

/*
|-------------------------------------------------------
| Automatically remove "Hello Dolly" plugin
|-------------------------------------------------------
|
| The "Hello Dolly" plugin is a useless plugin that
| comes pre-installed with wordpress. Lets save
| some time and just remove it automatically
|
*/

function goodbye_dolly() {
    if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('hello.php'));
    }
}

add_action('admin_init','goodbye_dolly');

/*
|-------------------------------------------------------
| Change the login form styles
|-------------------------------------------------------
*/

function my_login_logo() { ?>
    <style type="text/css">
        body {
            font-family: 'Open Sans',sans-serif;
            padding: 0;
            margin: 0;
            background: #1C1F26;
            font-size: 12px !important;
            -webkit-font-smoothing: antialiased;
        }

        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/site-login-logo.png);
            padding-bottom: 30px;
            display:none;
            background-size: 100%;
            width:100%;
        }

        .login form{
            min-width: 280px !important;
            background: #fff;
            margin: auto;
            margin-top: 12%;
            padding: 15px;
            border-radius: 5px;
            border: 5px solid #3D4454;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .login form, #backtoblog, #nav, .login h1 {
            -webkit-animation: fadein 1s;
            -moz-animation: fadein 1s;
            -ms-animation: fadein 1s;
            -o-animation: fadein 1s;
            animation: fadein 1s;
        }

        .wp-core-ui .button-primary{
            padding: 7px 15px 7px 15px !important;
            border-radius: 3px;
            font-size: 12px !important;
            border: 0;
            height:auto !important;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 0;
            width: 100%;
            color: #ffffff;
            background: #777C9B;
            outline-style: none;
            transition: 0.3s all;
            outline:0;
        }

        .wp-core-ui .button-primary:hover{
            background: #8489AD;
        }

        .login .input{
            width: 100%;
            color: #555555 !important;
            font-size: 12px !important;
            padding: 10px 12px !important;
            margin-bottom: 10px;
            margin-top: 7px;
            border: solid 1px lightgray !important;
            -webkit-box-shadow: none; 
            box-shadow: none; 
        }

        /* animations */
        @keyframes fadein {
            from { opacity: 0;   transform: translateY(20px);}
            to   { opacity: 1;   transform: translateY(0);}
        }

        @-moz-keyframes fadein {
            from { opacity: 0;   transform: translateY(20px);}
            to   { opacity: 1;   transform: translateY(0);}
        }

        @-webkit-keyframes fadein {
            from { opacity: 0;   transform: translateY(20px);}
            to   { opacity: 1;   transform: translateY(0);}
        }

        @-ms-keyframes fadein {
            from { opacity: 0;   transform: translateY(20px);}
            to   { opacity: 1;   transform: translateY(0);}
        }
    </style>

<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/*
|-------------------------------------------------------
| Default Theme Functions
|-------------------------------------------------------
*/

add_action( 'after_setup_theme', 'wordpresstheme_setup' );

function wordpresstheme_setup(){
    load_theme_textdomain( 'wordpresstheme', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'wordpresstheme' ) )
    );
}

add_action( 'wp_enqueue_scripts', 'wordpresstheme_load_scripts' );

function wordpresstheme_load_scripts(){
    wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'wordpresstheme_enqueue_comment_reply_script' );

function wordpresstheme_enqueue_comment_reply_script(){
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'wordpresstheme_title' );

function wordpresstheme_title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}

add_filter( 'wp_title', 'wordpresstheme_filter_wp_title' );

function wordpresstheme_filter_wp_title( $title ){
    return $title . esc_attr( get_bloginfo( 'name' ) );
}

/*
|-------------------------------------------------------
| Create Theme Widget Areas
|-------------------------------------------------------
*/

add_action( 'widgets_init', 'wordpresstheme_widgets_init' );

function wordpresstheme_widgets_init(){
    
	/* main sidebar widget */
	register_sidebar(array(
        'name' => __( 'Sidebar Widget Area', 'wordpresstheme' ),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
	
	/* footer widgets */
    register_sidebar(array(
        'name' => __( 'Footer Widget 1', 'wordpresstheme' ),
        'id' => 'footer-widget-area-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
    register_sidebar(array(
        'name' => __( 'Footer Widget 2', 'wordpresstheme' ),
        'id' => 'footer-widget-area-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
    register_sidebar(array(
        'name' => __( 'Footer Widget 3', 'wordpresstheme' ),
        'id' => 'footer-widget-area-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
}

function wordpresstheme_custom_pings( $comment ){
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php 
}

add_filter( 'get_comments_number', 'wordpresstheme_comments_number' );

function wordpresstheme_comments_number( $count ){
    if ( !is_admin() ) {
        global $id;
        $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}
