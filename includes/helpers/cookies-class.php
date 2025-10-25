<?php
/**
 * Theme Cookies Helper Class.
 *
 * @package snapdragon
 */



if ( ! class_exists( 'SnapdragonCookies' ) ) {
    class SnapdragonCookies {



        private static $instance = null;



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        public function __construct() {
			return $this;
		}



        public function set_cookie($name, $value) {
            global $snapdragon;

            if(is_array($value)) {
                $value = json_encode($value);
            }

            setcookie($name, $value, strtotime($snapdragon->defaults::COOKIE_EXP_TIME), COOKIEPATH, COOKIE_DOMAIN);
            return $this;
        }



        public function get_cookie($name) {
            return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
        }



        public function remove_cookie($name) {
            if($this->get_cookie($name) !== null) {
                setcookie($name, false);
            }
            return $this;
        }

    }
}

return SnapdragonCookies::instance();