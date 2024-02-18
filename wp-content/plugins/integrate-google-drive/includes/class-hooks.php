<?php

namespace IGD;

defined( 'ABSPATH' ) || exit;
class Hooks
{
    /**
     * @var null
     */
    protected static  $instance = null ;
    public function __construct()
    {
        //Handle uninstall
        igd_fs()->add_action( 'after_uninstall', [ $this, 'uninstall' ] );
        // Set custom app credentials
        $clientID = igd_get_settings( 'clientID' );
        $clientSecret = igd_get_settings( 'clientSecret' );
        $ownApp = igd_get_settings( 'ownApp' );
        
        if ( !empty($ownApp) && !empty($clientID) && !empty($clientSecret) ) {
            add_filter( 'igd/client_id', function () use( $clientID ) {
                return $clientID;
            } );
            add_filter( 'igd/client_secret', function () use( $clientSecret ) {
                return $clientSecret;
            } );
            add_filter( 'igd/redirect_uri', function () {
                return admin_url( '?action=integrate-google-drive-authorization' );
            } );
        }
        
        // IGD render form upload field data
        add_filter(
            'igd_render_form_field_data',
            [ $this, 'render_form_field_data' ],
            10,
            2
        );
        add_action( 'template_redirect', [ $this, 'direct_content' ] );
        // Handle oAuth authorization
        add_action( 'init', [ $this, 'handle_authorization' ] );
    }
    
    public function handle_authorization()
    {
        
        if ( isset( $_GET['action'] ) && 'authorization' == sanitize_key( $_GET['action'] ) ) {
            $client = Client::instance();
            $client->create_access_token();
            echo  '<script type="text/javascript">window.opener.parent.location.reload(); window.close();</script>' ;
            die;
        }
    
    }
    
    public function create_user_folder( $user_id )
    {
        $allowed_user_roles = igd_get_settings( 'privateFolderRoles', [ 'editor', 'contributor', 'author' ] );
        // Check if user role is allowed
        $user = get_user_by( 'id', $user_id );
        if ( !in_array( $user->roles[0], $allowed_user_roles ) ) {
            return;
        }
        Private_Folders::instance()->create_user_folder( $user_id );
    }
    
    public function delete_user_folder( $user_id )
    {
        Private_Folders::instance()->delete_user_folder( $user_id );
    }
    
    public function direct_content()
    {
        
        if ( !empty($_GET['direct_file']) ) {
            $file = json_decode( base64_decode( sanitize_text_field( $_GET['direct_file'] ) ), true );
            if ( empty($file['permissions']) ) {
                $file['permissions'] = [];
            }
            $is_dir = igd_is_dir( $file );
            add_filter( 'show_admin_bar', '__return_false' );
            // Remove all WordPress actions
            remove_all_actions( 'wp_head' );
            remove_all_actions( 'wp_print_styles' );
            remove_all_actions( 'wp_print_head_scripts' );
            remove_all_actions( 'wp_footer' );
            // Handle `wp_head`
            add_action( 'wp_head', 'wp_enqueue_scripts', 1 );
            add_action( 'wp_head', 'wp_print_styles', 8 );
            add_action( 'wp_head', 'wp_print_head_scripts', 9 );
            add_action( 'wp_head', 'wp_site_icon' );
            // Handle `wp_footer`
            add_action( 'wp_footer', 'wp_print_footer_scripts', 20 );
            // Handle `wp_enqueue_scripts`
            remove_all_actions( 'wp_enqueue_scripts' );
            // Also remove all scripts hooked into after_wp_tiny_mce.
            remove_all_actions( 'after_wp_tiny_mce' );
            if ( $is_dir ) {
                Enqueue::instance()->frontend_scripts();
            }
            $type = ( $is_dir ? 'browser' : 'embed' );
            ?>

            <!doctype html>
            <html lang="<?php 
            language_attributes();
            ?>">
            <head>
                <meta charset="<?php 
            bloginfo( 'charset' );
            ?>">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title><?php 
            echo  esc_html( $file['name'] ) ;
            ?></title>

				<?php 
            wp_enqueue_style( 'google-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap' );
            ?>

				<?php 
            do_action( 'wp_head' );
            ?>

				<?php 
            if ( 'embed' == $type ) {
                ?>
                    <style>
                        html, body {
                            margin: 0;
                            padding: 0;
                            width: 100%;
                            height: 100%;
                        }

                        #igd-direct-content {
                            width: 100%;
                            height: 100vh;
                            overflow: hidden;
                            position: relative;
                        }

                        #igd-direct-content:after {
                            content: '';
                            width: 60px;
                            height: 55px;
                            position: absolute;
                            opacity: 1;
                            right: 12px;
                            top: 0;
                            z-index: 10000000;
                            background-color: #d1d1d1;
                            cursor: default !important;
                        }

                        #igd-direct-content .igd-embed {
                            width: 100%;
                            height: 100%;
                            border: none;
                        }
                    </style>
				<?php 
            }
            ?>

            </head>
            <body>

            <div id="igd-direct-content">
				<?php 
            $data = [
                'folders'            => [ $file ],
                'type'               => $type,
                'allowPreviewPopout' => false,
            ];
            echo  Shortcode::instance()->render_shortcode( [], $data ) ;
            ?>
            </div>

			<?php 
            do_action( 'wp_footer' );
            ?>

            </body>
            </html>

			<?php 
            exit;
        }
    
    }
    
    public function render_form_field_data( $data, $as_html )
    {
        $uploaded_files = json_decode( $data, 1 );
        if ( empty($uploaded_files) ) {
            return $data;
        }
        $file_count = count( $uploaded_files );
        // Render TEXT only
        
        if ( !$as_html ) {
            $formatted_value = sprintf( _n(
                '%d file uploaded to Google Drive',
                '%d files uploaded to Google Drive',
                $file_count,
                'integrate-google-drive'
            ), $file_count );
            $formatted_value .= "\r\n";
            foreach ( $uploaded_files as $file ) {
                $view_link = sprintf( 'https://drive.google.com/file/d/%1$s/view', $file['id'] );
                $formatted_value .= $file['name'] . " - (" . $view_link . "), \r\n";
            }
            return $formatted_value;
        }
        
        $heading = sprintf( '<h3 style="margin-bottom: 15px;">%s</h3>', sprintf(
            // translators: %d: number of files
            _n(
                '%d file uploaded to Google Drive',
                '%d files uploaded to Google Drive',
                $file_count,
                'integrate-google-drive'
            ),
            $file_count
        ) );
        // Render HTML
        ob_start();
        echo  $heading ;
        foreach ( $uploaded_files as $file ) {
            $file_url = sprintf( 'https://drive.google.com/file/d/%1$s/view', $file['id'] );
            ?>
            <div style="display: block; margin-bottom: 5px;font-weight: 600;">
				<?php 
            echo  esc_html( $file['name'] ) ;
            ?> -
                <a style="text-decoration: none;font-weight: 400;"
                   href="<?php 
            echo  esc_url_raw( $file_url ) ;
            ?>"
                   target="_blank"><?php 
            echo  esc_url_raw( $file_url ) ;
            ?></a>
            </div>
		<?php 
        }
        //Remove any newlines
        return trim( preg_replace( '/\\s+/', ' ', ob_get_clean() ) );
    }
    
    public function uninstall()
    {
        // Remove cron
        $timestamp = wp_next_scheduled( 'igd_sync_interval' );
        if ( $timestamp ) {
            wp_unschedule_event( $timestamp, 'igd_sync_interval' );
        }
        //Delete data
        
        if ( igd_get_settings( 'deleteData', false ) ) {
            delete_option( 'igd_tokens' );
            delete_option( 'igd_accounts' );
            delete_option( 'igd_settings' );
            delete_option( 'igd_cached_folders' );
            igd_delete_cache();
            igd_delete_thumbnail_cache();
            // Clear Attachments
            Ajax::instance()->clear_attachments();
        }
    
    }
    
    /**
     * @return Hooks|null
     */
    public static function instance()
    {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
Hooks::instance();