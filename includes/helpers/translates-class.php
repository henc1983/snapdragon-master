<?php
/**
 * Snapdragon Translate Capability Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonTranslates' ) ) :



    class SnapdragonTranslates {



        private static $instance = null;
        public $capable;
        public $enabled;
        
        
        public const TRANSLATE_POST_NAME = 'snapdragon-language-option';
        public const TRANSLATE_FLAGS_DIR = '/assets/images/languages/';
        public const TRANSLATE_DEFAULT_SELECTED = 'hu_HU';
        public const TRANSLATE_COOKIE_NAME = 'snapdragon_language_selected';
        public const TRANSLATE_CODE_PAIRS = [
            'de_DE' => 'Deutsch',
            'en_US' => 'English (USA)',
            'en_GB' => 'English (UK)',
            'fr_FR' => 'Français',
            'hu_HU' => 'Magyar',
            'pl_PL' => 'Polski',
            'ro_RO' => 'Română',
            'es_ES' => 'Español',
            'it_IT' => 'Italiano',
            'nl_NL' => 'Nederlands',
            'pt_PT' => 'Português',
            'sv_SE' => 'Svenska',
            'fi_FI' => 'Suomi',
            'cs_CZ' => 'Čeština',
            'ja_JP' => '日本語',
            'zh_CN' => '中文 (简体)',
            'zh_TW' => '中文 (繁體)',
            'ru_RU' => 'Русский',
            'ar_AR' => 'العربية',
            'tr_TR' => 'Türkçe',
        ];



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        public function __construct() {
            $this->init_capabilities();
            $this->init_enabled();

            var_dump($GLOBALS['snapdragon']);

            return $this;
        }



        public function get_title( $lang ) {
            return in_array( $lang, array_keys( $this::TRANSLATE_CODE_PAIRS ) ) ? $this::TRANSLATE_CODE_PAIRS[$lang] : '';
        }



        private function init_capabilities() {
            $path = get_template_directory() .''. $this::TRANSLATE_FLAGS_DIR;
            if(is_dir($path)) {
                
                foreach(glob($path . '/*.svg') as $file) {
                    
                    $lang = basename($file, '.svg');

                    $this->capable[$lang] = (object)[
                        'code' => $lang,
                        'title' => $this->get_title($lang),
                        'attached_image' => get_template_directory_uri() .'/'. $this::TRANSLATE_FLAGS_DIR . basename($file)
                    ];
                }

            }


            return $this;
        }



        public function init_enabled() {
            $option = get_option( 'snapdragon_theme_settings' , [] );

            if( !empty( $option ) ) {

            }

            $this->enabled = $option['enabled_languages'];

            return $this;
        }
        // End of class
    }



endif;



return SnapdragonTranslates::instance();