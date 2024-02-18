<?php

namespace IGD;

defined( 'ABSPATH' ) || exit;


class Dokan {
	/**
	 * @var null
	 */
	protected static $instance = null;

	public function __construct() {
		$is_dokan_download = igd_get_settings( 'dokanDownload', true );
		$is_dokan_upload   = igd_get_settings( 'dokanUpload', false );

		if ( $is_dokan_download || $is_dokan_upload ) {
			//add vendor dashboard settings menu for Google Drive
			add_filter( 'dokan_get_dashboard_settings_nav', [ $this, 'add_vendor_dashboard_menu' ] );

			//add vendor dashboard settings content for Google Drive
			add_action( 'dokan_render_settings_content', [ $this, 'render_vendor_dashboard_content' ] );

			//settings help text
			add_filter( 'dokan_dashboard_settings_helper_text', [ $this, 'settings_help_text' ], 10, 2 );

			// Enqueue scripts on vendor dashboard
			add_action( 'dokan_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

			add_filter( 'igd_localize_data', [ $this, 'localize_data' ], 10, 2 );

			//auth state
			add_filter( 'igd_auth_state', [ $this, 'auth_state' ] );

			//check if authorization action is set
			add_action( 'template_redirect', [ $this, 'handle_authorization' ] );
		}

		if ( $is_dokan_upload ) {
			//add uploadable type to dokan product type
			add_filter( 'dokan_product_edit_after_title', [ $this, 'add_uploadable_type' ], 20, 2 );

			//add upload options
			add_action( 'dokan_product_edit_after_main', [ $this, 'render_uploadable_settings' ], 20, 2 );

			//save upload options
			add_action( 'dokan_process_product_meta', [ $this, 'save_settings' ] );

			//save upload settings
			add_action( 'wp_ajax_igd_save_dokan_upload_settings', [ $this, 'save_upload_settings' ] );
			add_action( 'wp_ajax_nopriv_igd_save_dokan_upload_settings', [ $this, 'save_upload_settings' ] );
		}

	}

	public function save_upload_settings() {
		parse_str( $_POST['data'], $data );

		$upload_locations = isset( $data['upload_locations'] ) ? $data['upload_locations'] : [];
		$upload_locations = array_map( 'sanitize_text_field', $upload_locations );

		$upload_order_statuses = isset( $data['upload_order_status'] ) ? $data['upload_order_status'] : [];
		$upload_order_statuses = array_map( 'sanitize_text_field', $upload_order_statuses );

		$naming_template = isset( $data['_igd_upload_folder_name'] ) ? sanitize_text_field( $data['_igd_upload_folder_name'] ) : '';

		$active_account = Account::instance( dokan_get_current_user_id() )->get_active_account();

		if ( $active_account ) {
			$parent_folder = ! empty( $data['igd_upload_parent_folder'] ) ? json_decode( $data['igd_upload_parent_folder'], true ) : [];

			update_user_meta( dokan_get_current_user_id(), '_igd_dokan_upload_parent_folder', $parent_folder );
		}

		$can_delete = ! empty( $data['igd_dokan_can_delete'] ) ? sanitize_text_field( $data['igd_dokan_can_delete'] ) : 'no';

		update_user_meta( dokan_get_current_user_id(), '_igd_dokan_upload_locations', $upload_locations );
		update_user_meta( dokan_get_current_user_id(), '_igd_dokan_upload_order_statuses', $upload_order_statuses );
		update_user_meta( dokan_get_current_user_id(), '_igd_dokan_upload_folder_name', $naming_template );
		update_user_meta( dokan_get_current_user_id(), '_igd_dokan_can_delete', $can_delete );

		wp_send_json_success( [
			'success' => true,
		] );

	}

	public function add_uploadable_type( $post, $post_id ) {
		$uploadable = get_post_meta( $post_id, '_uploadable', true );

		?>
        <div class="dokan-form-group dokan-product-type-container show_if_subscription show_if_simple">
            <div class="content-half-part uploadable-checkbox">
                <label>
                    <input type="checkbox" <?php checked( $uploadable, 'yes' ); ?> class="_is_uploadable"
                           name="_uploadable"
                           id="_uploadable"> <?php esc_html_e( 'Uploadable', 'integrate-google-drive' ); ?>
                    <i class="fas fa-question-circle tips" aria-hidden="true"
                       data-title="<?php esc_attr_e( 'Let your customers upload files on purchase.', 'integrate-google-drive' ); ?>"></i>
                </label>
            </div>
            <div class="dokan-clearfix"></div>
        </div>
		<?php
	}

	public function render_uploadable_settings( $post, $post_id ) {

		//Upload Button Text
		$upload_btn_text = get_post_meta( $post->ID, '_igd_upload_button_text', true );
		$upload_btn_text = ! empty( $upload_btn_text ) ? $upload_btn_text : __( 'Upload Documents', 'integrate-google-drive' );


		?>
        <div class="igd-dokan-upload-options dokan-edit-row dokan-clearfix show_if_uploadable">

            <div class="dokan-section-heading" data-togglehandler="dokan_uploadable_options">
                <h2><i class="fas fa-upload"
                       aria-hidden="true"></i> <?php esc_html_e( 'Uploadable Options', 'integrate-google-drive' ); ?>
                </h2>
                <p><?php esc_html_e( 'Configure your uploadable product settings', 'integrate-google-drive' ); ?></p>
                <a href="#" class="dokan-section-toggle">
                    <i class="fas fa-sort-down fa-flip-vertical" aria-hidden="true"></i>
                </a>
                <div class="dokan-clearfix"></div>
            </div>

            <div class="dokan-section-content">
                <div class="dokan-divider-top dokan-clearfix">

					<?php do_action( 'dokan_product_edit_before_sidebar' ); ?>

                    <!-- Upload to Google Drive checkbox -->
                    <div class="dokan-form-group">
						<?php dokan_post_input_box( $post_id, '_igd_upload', array( 'label' => __( 'Upload to Google Drive', 'integrate-google-drive' ) ), 'checkbox' ); ?>
                    </div>

                    <div class="show_if_igd_upload upload-box-settings  dokan-form-group dokan-clearfix">
                        <h4><?php _e( 'Google Drive Upload Settings', 'integrate-google-drive' ); ?></h4>

                        <div class="dokan-clearfix">
                            <!-- Upload Button Text -->
                            <div class="content-half-part dokan-form-group">
                                <label for="_igd_upload_button_text"
                                       class="form-label"><?php esc_html_e( 'Upload Button Text', 'integrate-google-drive' ); ?> </label>
								<?php dokan_post_input_box( $post_id, '_igd_upload_button_text', [ 'value' => $upload_btn_text ] ); ?>
                            </div>

                            <!-- Upload Description -->
                            <div class="content-half-part dokan-form-group">
                                <label for="_igd_upload_description"
                                       class="form-label"><?php esc_html_e( 'Upload Description', 'integrate-google-drive' ); ?> </label>
								<?php dokan_post_input_box( $post_id, '_igd_upload_description' ); ?>
                            </div>

                        </div>

                        <div class="dokan-clearfix">

                            <!-- Min Upload Files -->
                            <div class="content-half-part dokan-form-group">
                                <label for="_igd_upload_min_files"
                                       class="form-label"><?php esc_html_e( 'Min Upload Files', 'integrate-google-drive' ); ?> </label>

								<?php
								dokan_post_input_box( $post_id, '_igd_upload_min_files', array(
									'placeholder' => __( 'Minimum number of files', 'integrate-google-drive' ),
								) );
								?>

                                <p class="description">
									<?php esc_html_e( 'Minimum number of files required to upload. Leave blank for no limit.', 'integrate-google-drive' ); ?>
                                </p>
                            </div>

                            <!-- Max Upload Files -->
                            <div class="content-half-part dokan-form-group">
                                <label for="_igd_upload_max_files"
                                       class="form-label"><?php esc_html_e( 'Max Upload Files', 'integrate-google-drive' ); ?> </label>

								<?php
								dokan_post_input_box( $post_id, '_igd_upload_max_files', array(
									'placeholder' => __( 'Maximum number of files', 'integrate-google-drive' ),
								) );
								?>

                                <p class="description">
									<?php esc_html_e( 'Maximum number of files allowed to upload. Leave blank for no limit.', 'integrate-google-drive' ); ?>
                                </p>
                            </div>

                        </div>

                        <div class="dokan-clearfix">

                            <!-- Min File Size -->
                            <div class="content-half-part dokan-form-group">
                                <label for="_igd_upload_min_file_size"
                                       class="form-label"><?php esc_html_e( 'Min File Size', 'integrate-google-drive' ); ?> </label>

								<?php
								dokan_post_input_box( $post_id, '_igd_upload_min_file_size', array(
									'placeholder' => __( 'Min file size in MB', 'integrate-google-drive' ),
								) );
								?>

                                <p class="description">
									<?php esc_html_e( 'Minimum file size in MB. Leave blank to allow all file sizes.', 'integrate-google-drive' ); ?>
                                </p>
                            </div>

                            <!-- Max File Size -->
                            <div class="content-half-part dokan-form-group">
                                <label for="_igd_upload_max_file_size"
                                       class="form-label"><?php esc_html_e( 'Max File Size', 'integrate-google-drive' ); ?> </label>

								<?php
								dokan_post_input_box( $post_id, '_igd_upload_max_file_size', array(
									'placeholder' => __( 'Max file size in MB', 'integrate-google-drive' ),
								) );
								?>

                                <p class="description">
									<?php esc_html_e( 'Maximum file size in MB. Leave blank to allow all file sizes.', 'integrate-google-drive' ); ?>
                                </p>
                            </div>

                        </div>

                        <!-- Allowed File Types -->
                        <div class="content-half-part dokan-form-group">
                            <label for="_igd_upload_file_types"
                                   class="form-label"><?php esc_html_e( 'Allowed File Types', 'integrate-google-drive' ); ?> </label>

							<?php
							dokan_post_input_box( $post_id, '_igd_upload_file_types', array(
								'placeholder' => 'jpg, png, pdf, docx, doc, zip, rar',
							) );
							?>

                            <p class="description">
								<?php esc_html_e( 'Comma separated file extensions (e.g: png, jpg, zip). Leave blank to allow all file types.', 'integrate-google-drive' ); ?>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
		<?php
	}

	/**
	 * Save settings
	 *
	 * @param $post_id
	 */
	public function save_settings( $post_id ) {

		$uploadable = ! empty( $_POST['_uploadable'] ) ? 'yes' : 'no';

		$upload_button_text = ! empty( $_POST['_igd_upload_button_text'] ) ? sanitize_text_field( $_POST['_igd_upload_button_text'] ) : 'Upload Documents';

		$description = ! empty( $_POST['_igd_upload_description'] ) ? sanitize_text_field( $_POST['_igd_upload_description'] ) : '';

		$upload_to_google_drive = ! empty( $_POST['_igd_upload'] ) ? sanitize_text_field( $_POST['_igd_upload'] ) : 'no';

		//allowed file types
		$allowed_file_types = ! empty( $_POST['_igd_upload_file_types'] ) ? sanitize_text_field( $_POST['_igd_upload_file_types'] ) : '';

		// max file size
		$max_file_size = ! empty( $_POST['_igd_upload_max_file_size'] ) ? sanitize_text_field( $_POST['_igd_upload_max_file_size'] ) : '';
		$min_file_size = ! empty( $_POST['_igd_upload_min_file_size'] ) ? sanitize_text_field( $_POST['_igd_upload_min_file_size'] ) : '';

		// max upload files
		$max_upload_files = ! empty( $_POST['_igd_upload_max_files'] ) ? sanitize_text_field( $_POST['_igd_upload_max_files'] ) : '';
		$min_upload_files = ! empty( $_POST['_igd_upload_min_files'] ) ? sanitize_text_field( $_POST['_igd_upload_min_files'] ) : '';

		update_post_meta( $post_id, '_igd_upload_button_text', $upload_button_text );
		update_post_meta( $post_id, '_igd_upload_description', $description );
		update_post_meta( $post_id, '_igd_upload', $upload_to_google_drive );
		update_post_meta( $post_id, '_uploadable', $uploadable );
		update_post_meta( $post_id, '_igd_upload_file_types', $allowed_file_types );
		update_post_meta( $post_id, '_igd_upload_max_file_size', $max_file_size );
		update_post_meta( $post_id, '_igd_upload_min_file_size', $min_file_size );
		update_post_meta( $post_id, '_igd_upload_max_files', $max_upload_files );
		update_post_meta( $post_id, '_igd_upload_min_files', $min_upload_files );
	}

	/**
	 * Check if authorization action is set
	 */
	public function handle_authorization() {
		global $wp;

		if ( empty( $wp->query_vars['settings'] ) || 'google-drive' !== $wp->query_vars['settings'] ) {
			return;
		}

		if ( empty( $_GET['action'] ) || 'igd-dokan-authorization' !== $_GET['action'] ) {
			return;
		}

		//check if vendor is logged in
		if ( ! is_user_logged_in() ) {
			return;
		}

		$client = Client::instance();

		$client->create_access_token();

		$redirect = dokan_get_navigation_url( 'settings/google-drive' );

		echo '<script type="text/javascript">window.opener.parent.location.href = "' . $redirect . '"; window.close();</script>';
		die();

	}

	/**
	 * Auth state
	 *
	 * @param $state
	 *
	 * @return string
	 */

	public function auth_state( $state ) {

		if ( dokan_is_seller_dashboard() || dokan_is_product_edit_page() ) {
			$state = dokan_get_navigation_url() . 'settings/google-drive?action=igd-dokan-authorization&user_id=' . dokan_get_current_user_id();
		}

		return $state;
	}

	/**
	 * Enqueue scripts on vendor dashboard
	 */

	public function enqueue_scripts() {
		// Check if dokan vendor dashboard
		if ( ! dokan_is_seller_dashboard() ) {
			return;
		}

		if ( ! wp_script_is( 'igd-admin', 'registered' ) ) {
			Enqueue::instance()->admin_scripts( '', false );
		}

		wp_enqueue_script( 'igd-woocommerce', IGD_ASSETS . '/js/woocommerce.js', array( 'igd-admin' ), IGD_VERSION, true );
		wp_enqueue_script( 'igd-dokan', IGD_ASSETS . '/js/dokan.js', [ 'igd-woocommerce', 'igd-admin' ], IGD_VERSION, true );

	}

	/**
	 * Localize data
	 *
	 * @param $data
	 *
	 * @return mixed
	 */

	public function localize_data( $data, $script_handle ) {

		if ( 'frontend' == $script_handle ) {
			return $data;
		}

		if ( dokan_is_seller_dashboard() || dokan_is_product_edit_page() ) {
			$data['authUrl']       = Client::instance()->get_auth_url();
			$data['accounts']      = Account::instance( dokan_get_current_user_id() )->get_accounts();
			$data['activeAccount'] = Account::instance( dokan_get_current_user_id() )->get_active_account();
		}

		return $data;
	}


	/**
	 * Enqueue scripts on vendor dashboard
	 */

	/**
	 * Add vendor dashboard menu for Google Drive
	 *
	 * @param $urls
	 *
	 * @return mixed
	 */
	public function add_vendor_dashboard_menu( $urls ) {
		$urls['google-drive'] = array(
			'title' => __( 'Google Drive', 'integrate-google-drive' ),
			'icon'  => '<i class="fab fa-google-drive"></i>',
			'url'   => dokan_get_navigation_url( 'settings/google-drive' ),
			'pos'   => 100,
		);

		return $urls;
	}

	/**
	 * Render vendor dashboard content for Google Drive
	 *
	 * @param $current_section
	 */

	public function render_vendor_dashboard_content( $query_vars ) {
		$current_section = isset( $query_vars['settings'] ) ? $query_vars['settings'] : '';

		if ( 'google-drive' === $current_section ) {
			$current_user = dokan_get_current_user_id();
			$profile_info = dokan_get_store_info( dokan_get_current_user_id() );

			include_once IGD_INCLUDES . '/integrations/templates/dokan-settings.php';

		}
	}

	/**
	 * Settings help text
	 *
	 * @param $help_text
	 * @param $section
	 *
	 * @return string
	 */
	public function settings_help_text( $help_text, $section ) {

		if ( 'google-drive' === $section ) {
			$is_dokan_download = igd_get_settings( 'dokanDownload', true );
			$is_dokan_upload   = igd_get_settings( 'dokanUpload', false );

			if ( $is_dokan_download && ! $is_dokan_upload ) {
				$help_text = __( 'You can connect your Google Drive account with your store to select download able files from your Google Drive account.', 'integrate-google-drive' );
			} elseif ( $is_dokan_upload && ! $is_dokan_download ) {
				$help_text = __( 'You can connect your Google Drive account with your store to let customers upload files to your Google Drive account on purchase.', 'integrate-google-drive' );
			} elseif ( $is_dokan_upload && $is_dokan_download ) {
				$help_text = __( 'You can connect your Google Drive account with your store to select download able files from your Google Drive account and let customers upload files to your Google Drive account on product purchase.', 'integrate-google-drive' );
			}

		}

		return $help_text;
	}


	/**
	 * @return Dokan|null
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}

Dokan::instance();