<?php

namespace IGD;

defined( 'ABSPATH' ) || exit;
class Integration
{
    private static  $instance = null ;
    public function __construct()
    {
        // Classic editor
        if ( $this->is_active( 'classic-editor' ) ) {
            require_once IGD_INCLUDES . '/class-tinymce.php';
        }
        // Block editor
        if ( $this->is_active( 'gutenberg-editor' ) ) {
            require_once IGD_INCLUDES . '/blocks/class-blocks.php';
        }
        // Divi
        if ( $this->is_active( 'divi' ) ) {
            require_once IGD_INCLUDES . '/divi/divi.php';
        }
        add_action( 'plugins_loaded', function () {
            // Elementor
            if ( $this->is_active( 'elementor' ) || $this->is_active( 'elementor-form' ) || $this->is_active( 'metform' ) ) {
                require_once IGD_INCLUDES . '/elementor/class-elementor.php';
            }
            // Load CF7 integration
            if ( $this->is_active( 'cf7' ) && defined( 'WPCF7_VERSION' ) && version_compare( WPCF7_VERSION, '5.0', '>=' ) ) {
                require_once IGD_INCLUDES . '/integrations/class-cf7.php';
            }
        } );
    }
    
    /**
     * Check if integration is active
     *
     * @param $key
     *
     * @return bool
     */
    public function is_active( $key )
    {
        $integrations = igd_get_settings( 'integrations', [
            'classic-editor',
            'gutenberg-editor',
            'elementor',
            'divi',
            'cf7'
        ] );
        return in_array( $key, $integrations );
    }
    
    public static function instance()
    {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
Integration::instance();