<?php
/**
 * Wordpress Option Helper Class.
 *
 * @package snapdragon
 */



if ( ! class_exists( 'SnapdragonOptions' ) ) {
    class SnapdragonOptions {

        private $options;
        
        private const IMPORTANT_OPTIONS_PAIRS = [
            'enabled_languages'                             => [ 'hu_HU', 'en_US' ] ,
            'google_verification'                           => [ 'meta' => 'D2qQKJUQ9kPwNYZI5PFhqoXEXd1hap1WrBz_Vv51tjk' , 'script' => 'ca-pub-4690077027254207' ],
            'barion_id'                                     => 'BP-Vavl0GoVec-9D',
            'owner_informations'                            => [
                'bank'                                          => [
                    'name'                                          => '',
                    'address'                                       => '',
                    'phone'                                         => '',
                    'openingtime'                                   => '',
                    'account'                                       => '',
                    'owner'                                         => '',
                    'notice'                                        => '',
                    'swift'                                         => ''
                ],
                'company'                                       => [
                    'name'                                          => '',   
                    'contact'                                       => '',       
                    'phone'                                         => '',   
                    'email'                                         => '',   
                    'headquarters'                                  => '',           
                    'location'                                      => '',       
                    'mailaddress'                                   => '',           
                    'taxnumber'                                     => '',       
                    'registernumber'                                => '',               
                    'accountant'                                    => '',           
                    'accountant_address'                            => '',                   
                    'accountant_phone'                              => '',               
                ],
                'webhost'                                       => [
                    'name'                                          => '',   
                    'email'                                         => '',       
                    'phone'                                         => '',   
                    'address'                                       => '',   
                    'openingtime'                                   => '',           
                    'domain'                                        => '',                     
                ],
                'user'                                          => [
                    'name'                                          => '',   
                    'email'                                         => '',       
                    'phone'                                         => '',   
                    'address'                                       => '',      
                ],
            ],
        ];

        public function __construct() {
            $this->options = get_option( 'snapdragon_theme_settings' , []);

            if ( empty( $this->options ) ) {
                update_option( 'snapdragon_theme_settings' , $this::IMPORTANT_OPTIONS_PAIRS );
            }
            
        }
    }
}

return new SnapdragonOptions();