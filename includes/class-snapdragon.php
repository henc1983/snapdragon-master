<?php
/**
 * Snapdragon Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'Snapdragon' ) ) :



	/**
	 * The main Snapdragon class
	 */
	class Snapdragon {



		private static $instance = null;

		public $defaults;
		public $options;
		public $setup;
		
        public $cookies;
		public $translates;
		public $requests;
		public $customizer;
		public $woocommerce;
		
		public $version;
		public $author;



		public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



		public function __construct() {			
			$theme = wp_get_theme();
			$this->version 		= $theme->get( 'Version' );
			$this->author		= $theme->get( 'Author' );

            $this->init_defaults();
            $this->init_options();
            $this->init_translates();
            $this->init_cookies();
            $this->init_setup();
		}
		


        private function init_defaults() {
            $this->defaults = $this->check_file(THEME_DIR . '/includes/helpers/defaults-class.php');
			return $this;
        }
		


        private function init_options() {
            $this->options = $this->check_file(THEME_DIR . '/includes/helpers/options-class.php');
			return $this;
        }
		


        private function init_translates() {
            $this->translates = $this->check_file(THEME_DIR . '/includes/helpers/translates-class.php');
			return $this;
        }
		


        private function init_cookies() {
            $this->cookies = $this->check_file(THEME_DIR . '/includes/helpers/cookies-class.php');
			return $this;
        }
		


        private function init_setup() {
            $this->setup = $this->check_file(THEME_DIR . '/includes/helpers/theme-setup-class.php');
			return $this;
        }
        


		private function check_file($file) {
			if ( ! file_exists( $file ) ) {
				die( "Missing file: $file" );
			}

			return require_once $file;
		}
		// End of class
	}



endif;



return Snapdragon::instance();