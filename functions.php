<?php

/* enqueue the parent theme's stylesheet */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

if ( ! function_exists( 'flat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function flat_setup() {
		# Localization
		load_theme_textdomain( 'flat', get_template_directory() . '/languages' );

		# Enable WordPress theme features
		add_theme_support( 'automatic-feed-links' ); # @link http://codex.wordpress.org/Automatic_Feed_Links
		
		/* tgm-plugin-activation */
        require_once get_template_directory() . '/class-tgm-plugin-activation.php';
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) ); # @link http://codex.wordpress.org/Post%20Formats
		add_theme_support( 'post-thumbnails' ); # @link http://codex.wordpress.org/Post%20Thumbnails
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'title-tag' ); # @link http://codex.wordpress.org/Title_Tag
		add_theme_support( 'tha-hooks', array( 'all' ) ); # @link https://github.com/zamoose/themehookalliance

		# Add style to the post editor for a more WYSIWYG experience
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		# Flat has one navigation menu; register it with WordPress
		register_nav_menu( 'primary', __( 'Navigation Menu', 'flat' ) );

		# Add filters
		add_filter( 'comments_popup_link_attributes', function() { return ' itemprop="discussionUrl"'; } ); # schema.org property on comments links
		add_filter( 'current_theme_supports-tha_hooks', '__return_true' ); # Enables checking for THA hooks
		add_filter( 'style_loader_tag', 'flat_filter_styles', 10, 2 ); # Filters style tags as needed
		add_filter( 'the_content_more_link', 'modify_read_more_link' ); # Enhances appearance of "Read more..." link
		add_filter( 'use_default_gallery_style', '__return_false' ); # Disable default WordPress gallery styling
		remove_filter( 'the_content','cwp_pac_before_content');

		# Add actions
		add_action( 'flat_html_before', 'flat_doctype' ); # Outputs HTML doctype
		add_action( 'flat_404_content', 'flat_output_404_content' ); # Outputs a helpful message on 404 pages
		add_action( 'widgets_init', 'flat_widgets_init' ); # Registers Flat's sidebar
		add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' ); # Enqueue's Flat's scripts & styles
	}
endif;
add_action( 'after_setup_theme', 'flat_setup' );

?>
