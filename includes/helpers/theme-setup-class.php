<?php
/**
 * Theme Setup Helper Class.
 *
 * @package snapdragon
 */



if ( ! class_exists( 'SnapdragonThemeSetup' ) ) {
    class SnapdragonThemeSetup {

        private static $instance = null;

        

        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        public function __construct() {    

            add_action( 'after_setup_theme' ,   [ $this , 'custom_logo' ] );        
            add_action( 'after_setup_theme' ,   [ $this , 'enable_theme_supports' ] );
            add_action( 'after_setup_theme' ,   [ $this , 'load_theme_textdomains' ] );
            add_action( 'after_setup_theme' ,   [ $this , 'register_nav_menus' ] );
            add_action( 'wp_enqueue_scripts' ,  [ $this , 'enqueue_styles' ] );        
            add_action( 'wp_enqueue_scripts' ,  [ $this , 'enqueue_scripts' ] );        

            return $this;
        }



        public function load_theme_textdomains() {
			// Loads wp-content/languages/themes/storefront-it_IT.mo.
			load_theme_textdomain( 'snapdragon', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'snapdragon', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/storefront/languages/it_IT.mo.
			load_theme_textdomain( 'snapdragon', get_template_directory() . '/languages' );

		}



        public function custom_logo() {    
            $default_logo = [
				'height'               => 100,
				'width'                => 400,
				'flex-height'          => true,
				'flex-width'           => true,
				'header-text'          => array( 'site-title', 'site-description' )
			];
			add_theme_support( 'custom-logo' , $default_logo );
        }



        public function enable_theme_supports() {
			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Add support for Block Styles.
			add_theme_support( 'wp-block-styles' );

			// Add support for full and wide align images.
			add_theme_support( 'align-wide' );

			// Add support for editor styles.
			add_theme_support( 'editor-styles' );

			// Add support for responsive embedded content.
			add_theme_support( 'responsive-embeds' );

			/**
			 * Add support for appearance tools.
			 *
			 * @link https://wordpress.org/documentation/wordpress-version/version-6-5/#add-appearance-tools-to-classic-themes
			 */
			add_theme_support( 'appearance-tools' );

			// Add support for theme.json
			add_theme_support( 'block-template-parts' );
			add_theme_support( 'block-template' );
        }



        public function enqueue_styles() { 

            $style_dir = untrailingslashit( get_template_directory() . '/assets/styles' );
            $style_uri = untrailingslashit( get_template_directory_uri() . '/assets/styles' );

            wp_enqueue_style('my_style', esc_url("$style_uri/style.css"), [], filemtime(esc_url("$style_dir/style.css")));
        }



        public function enqueue_scripts() {    
            
            $script_dir = untrailingslashit( get_template_directory() . '/assets/scripts' );
            $script_uri = untrailingslashit( get_template_directory_uri() . '/assets/scripts' );

			wp_enqueue_script( 'snapdragon-main-desktop-script' , "$script_uri/main-desktop.js" , [] , filemtime( "$script_dir/main-desktop.js" ));
        }



        public function register_nav_menus() {
			register_nav_menus(
				[
					'menu-1' => esc_html__('Main Menu' , 'snapdragon'),
					'menu-2' => esc_html__('Profile' , 'snapdragon'),
					'menu-3' => esc_html__('Footer navigation' , 'snapdragon'),
					'menu-4' => esc_html__('Informations' , 'snapdragon')
				]
			);
				
		}

    }
}

return SnapdragonThemeSetup::instance();