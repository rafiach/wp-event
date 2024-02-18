<?php

$logs = [

	'v.1.3.7' => [
		'date'        => '2024-01-14',
		'fix'         => [
			'Fixed media player not working issue.',
		],
	],

	'v.1.3.6' => [
		'date'        => '2023-12-27',
		'new'         => [
			'Added Media Library Integration.',
			'Added description to the slider carousel lightbox preview.',
			'Added option to enable/disable folder download.',
		],
		'fix'         => [
			'Fixed Ninja Forms Google Drive uploader extension filter not working properly.',
		],
		'enhancement' => [
			'Improved file import to the media library.',
		]
	],

	'v.1.3.4' => [
		'date' => '2023-12-03',
		'new'  => [
			'Added user role based private folder creation on user registration.',
			'Added sort option for slider module.',
			'Added random sort option for shortcode module files.',
		],
		'fix'  => [
			'Fixed uploader browse files button not working properly on IOS devices.',
			'Fixed search module not working properly.',
		],

	],
	'v.1.3.3' => [
		'date' => '2023-11-17',
		'fix'  => [
			'Fixed security issue',
			'Translations issue',
		],

	],

	'v.1.3.2' => [
		'date' => '2023-11-15',
		'fix'  => [
			'Fixed delete option always available in file browser shortcode module.',
			'Fixed uploader hidden issue in file browser shortcode module.',
			'Fixed security issue.',
		],

	],

	'v.1.3.1' => [
		'date' => '2023-11-08',
		'new'  => [
			'Added select all option for File Browser and Gallery module.',
			'Added folder selection option for Slider Carousel module.',
		],
		'fix'  => [
			'Fixed private folders displaying all selected folders issue.',
			'Fixed module builder crash issue in Divi theme.',
		],

	],

	'v.1.3.0' => [
		'date' => '2023-10-30',
		'fix'  => [
			'Fixed single and double quote not working in search query.',
			'Fixed File upload rename placeholder not working properly issue.',
			'Fixed folder structure for form uploader when folder upload is enabled.',
		],

	],

	'v.1.2.9' => [
		'date' => '2023-10-16',

		'new' => [
			'Added woocommerce download file redirection option to redirect to Google Drive instead of downloading.',
			'Added Allow Embed Player option for the Media Player module to play large video files using the Google Drive native Embed Player.',
			'Added Access Denied Message option in the Shortcode Builder to display a custom message when the user doesn\'t have access to the module.',
		],

		'fix' => [
			'Fixed Divi Theme Builder not working properly.',
			'Fixed minor issues with private folders.',
		],

		'remove' => [
			'Removed Access Denied Message setting from the Private Folders Settings page.',
		],

	],

	'v.1.2.8' => [
		'date' => '2023-10-08',

		'new' => [
			'Added option to allow users to access the private folders in backend file browser page.',
			'Added gallery photo proofing selection count and range.',
			'Added rewind and forward controls in media player.',
		],

		'fix' => [
			'Fixed Dokan File Upload.',
			'Fixed Divi module builder conflicts with Rank Math SEO plugin.',
			'File links sharing copy button not working in safari.',
		],

		'enhancement' => [
			'Improved media player UI and functionality.',
			'Improved keyboard shortcuts accessibility.',
		],

	],

	'v.1.2.7' => [
		'date' => '2023-08-31',

		'fix' => [
			'Fixed search not working properly issue.',
			'Fixed multistep form required uploader issue.',
			'Fixed WooCommerce uploader allowed file extension was working opposite issue.',
			'Fixed WPForms Entry folder naming issue.',
		],
	],

	'v.1.2.6' => [
		'date'        => '2023-08-29',
		'new'         => [
			'Added option to set thumbnail image size in the gallery module.',
			'Added option to set thumbnail image size in the slider module.',
			'Add slides per page settings per device for the slider module.',
			'Added option to set gap between slides items.',
			'Added sort by, sort direction, and items count in the shortcode listing page',
		],
		'fix'         => [
			'Fixed gallery images are not showing properly after few hours.',
			'Fixed download statistics not working.',
			'Fixed shortcode modules not working properly on Divi Builder.',
		],
		'enhancement' => [
			'Improve Slider Carousel module styles.',
		],
	],

	'v.1.2.5' => [
		'date' => '12 August, 2023',
		'new'  => [
			'Added Photo Proofing feature for the gallery module.',
		],
		'fix'  => [
			'Fixed private folders not creating on user registration.',
			'Fixed form uploader minimum file number validation.',
			'Fixed Elementor Text Editor Google Drive button not working properly.',
			'Fixed WooCommerce Uploader not working on iPhone 12.',
		],
	],

	'v.1.2.4' => [
		'date'        => '07 August, 2023',
		'new'         => [
			'Added Grid and Masonry layout for gallery module.',
			'Added new column, overlay, aspect ratio settings for gallery module.',
		],
		'fix'         => [
			'Fixed WooCommerce Downloads not working properly.',
			'Fixed File Browser module filters not working properly.',
		],
		'enhancement' => [
			'Improve Gallery Module.',
			'Added PHP 8.2 compatibility.',
		],
	],
	'v.1.2.3' => [
		'date' => '13 July, 2023',
		'fix'  => [
			'Fixed all files and folders not showing in Gutenberg Editor module configuration.',
			'Fixed folder upload not working properly.',
			'Fixed shortcode module visibility not working for specific users.',
		],
	],

	'v.1.2.2' => [
		'date'        => '09 July, 2023',
		'new'         => [
			'Added min/max upload files restrictions for woocommerce + dokan file upload.',
		],
		'fix'         => [
			'Fixed form uploader button text issue.',
			'Fixed entry folder not creating when the use private folder option is enabled.',
			'Fixed showing not allowed folders when copy/move files in the file browser module.',
		],
		'enhancement' => [
			'Updated the sweetalert2 to fix conflict with russian sites.',
			'Improved WooCommerce uploader.',
			'Improved Gallery module.',
			'Improved Form Uploader.',
		],
	],

	'v.1.2.1' => [
		'date' => '21 June, 2023',
		'fix'  => [
			'Fixed PHP undefined function error',
			'Fixed Elementor widgets are not displaying for non-login users',
		],
	],

	'v.1.2.0' => [
		'date'        => '20 June, 2023',
		'new'         => [
			'Added Google Drive upload field integration with Elementor PRO Form widget.',
			'Added Google Drive upload field integration with MetForm.',
			'Added ability to remove uploaded files for uploader module.',
			'Added file uploader overwrite settings.',
			'Added merge folders settings for form uploader entry folders.',
			'Added settings to allow specific folders to the roles and users in the admin dashboard.',
			'Added option to show confirmation message after uploading files in the uploader module.',
			'Added new option to display the gallery folders as title or thumbnail style.',
			'Added settings to customize the Private Folders module "Access Denied Message"',
		],
		'fix'         => [
			'Fixed Breadcrumbs issue.',
			'Fixed video is not added to tutor course.',
			'Fixed Google Drive button not working in the Elementor Text Editor widget.'
		],
		'enhancement' => [
			'Improved Search Results.',
			'Improved Media Player UI.',
			'Improved overall plugin performance.',
		],
	],

	'v.1.1.99' => [
		'date'        => '04 June, 2023',
		'new'         => [
			'Added Synchronization Type settings to synchronize all folders or specific selected folders with the cloud.',
			'Added option to form file uploads to upload files after clicking the submit button.',
			'Added preview permission settings for search box module.',
			'Add listing view switch permission settings for shortcode module.',
			'Added media player playlist item thumbnail and number prefix hide/ show options.',
		],
		'fix'         => [
			'Fix search results not showing properly issue.',
			'Fixed user access settings to access the plugin\'s pages in the admin dashboard.',
			'Fixed WooCommerce error while downloading files.',
		],
		'enhancement' => [
			'Improved the media player module.',
			'Improve overall performance.',
		],
	],

	'v.1.1.97' => [
		'date'        => '30 May, 2023',
		'new'         => [
			'Added multiple position settings (bottom, left, right) for the Media Player module.',
			'Added search option to the media player playlist.',
			'Added dynamic placeholder tags for initial search term in shortcode modules.',
			'Added minimum files settings for form upload fields.',
			'Added pagination & items per page settings for the shortcode builder listing.',
			'Added option to enable/disable lazy load for the gallery and file browser modules.',
			'Added "Remember Last Opened Folder" settings to load the last opened folder when a visitor revisit a File Browser or Gallery module.',
			'Added notifications settings for shortcode modules to receive email notifications for various user activities ( upload, download, delete, etc).',
		],
		'fix'         => [
			'Fixed issue with statistics email report.',
			'Fixed problem with classic editor modules save not working.',
			'Fixed conflicts with the Async Javascript plugin.',
			'Fixed user private template folder functionality.',
			'Fixed shortcut files not working in gallery module.',
			'Fixed search results not showing properly issue.',
			'Fixed file permission change issue.',
		],
		'enhancement' => [
			'Improved the look and features of the media player module.',
			'The overall performance of the plugin has been greatly improved.',
		],
		'remove'      => [
			'Removed notifications global settings from the Settings page.',
			'Removed Recent files tab menu from admin File Browser.',
		],
	],

	'v.1.1.96' => [
		'date' => '11 May, 2023',

		'new'         => [
			'Enabled lazy loading for file browsing and gallery, allowing smoother scrolling through files.',
			'Introduced support for multiple instructors\' Google accounts in Tutor LMS.',
			'Added an option in the embed module to directly display Audio, Video, and Images on webpages without embedding them in iframes.',
			'Included wildcard support for excluding specific names in the shortcode builder module.',
			'Provided the ability to rename entry folders in Form Uploader using form field values.',
			'Added a file removal option for WooCommerce and Dokan file uploads.',
			'Granted permissions to create documents (doc, sheet, slide) in the File Browser shortcode module.',
			'Added the ability to select folders when copying files.',
		],
		'fix'         => [
			'Resolved issues with Tutor LMS integration.',
			'Fixed the problem with connecting Google accounts.',
		],
		'enhancement' => [
			'Enhanced the Gallery shortcode module.',
			'Made significant improvements to overall plugin performance.',
		],
		'remove'      => [
			'Removed the Skeleton preloader style.',
		],
	],

	'v.1.1.94' => [
		'date' => '19 April, 2023',

		'new'         => [
			'Added Tutor LMS integration.',
			'Added Divi builder integration.',
			'Added Private Files support for embed module.',
			'Added file size field show/hide option for the file browser module.',
			'Added download support for search box module.',
			'Added Embed iFrame height and width customization options.',
		],
		'fix'         => [
			'Fixed scrolling to the search box issue.',
			'Fixed multiple ACF filed issue.',
			'Fixed embed documents popout issue.',
			'Fixed WooCommerce product edit page issue.',
			'Fixed Contact Form 7 email notification file list issue.'
		],
		'enhancement' => [
			'Improved plugin performance.',
		],
	],

	'v.1.1.93' => [
		'date' => '04 April, 2023',

		'new'         => [
			'Added access denied message for the shortcode module when user is not allowed to access the module',
			'Added shortcode usage locations in the shortcode builder list',
			'Added download enable/ disable option for the Gallery module',
			'Added Statistics export option',
			'Added WooCommerce and Dokan Upload box in the product, cart, checkout, order-received and my-account page',
			'Added download all option for Gallery',
			'Added Facebook and Disqus comment integration for the Gallery module.',
		],
		'fix'         => [
			'Fixed file rename not working',
			'Fixed file browser not working in mobile devices issue',
			'Fixed ACF thumbnail_link expire issue',
			'Fixed classic editor text editor issue',
			'Fixed Forms file uploader issue',
		],
		'enhancement' => [
			'Improve WooCommerce and Dokan Uploads',
		],
	],

	'v.1.1.91' => [
		'date' => '12 March, 2023',

		'new'         => [
			'Added New Slider Carousel Module',
		],
		'fix'         => [
			'Fixed Elementor Integration Fatal Error',
		],
		'enhancement' => [
			'Updated Multiple File Selection UI',
		],
	],

	'v.1.1.90' => [
		'date' => '12 March, 2023',

		'new'         => [
			'Added support for shortcut files.',
			'Added video files support to the gallery module.',
			'Add download, upload, delete, search, preview restrictions by specific users and roles.',
			'Added Manage Sharing Permissions settings.',
			'Added Google Workspace domain support.',
			'Added Maximum Number Files to Upload settings.',
			'Added Upload File Name Rename settings.',
			'Added RTL CSS supports.',
		],
		'fix'         => [
			'Fixed private folders issue.',
			'Fixed Gallery preview not full-size image issue.',
			'Fixed Media Player not playing issue.',
			'Fixed WooCommerce upload issue.',
			'Fixed File Uploader HTTP Error issue.',
		],
		'enhancement' => [
			'Unlocked the Gallery module for free.',
			'Improved the gallery module.',
			'Improved auto sync.',
			'Improve Search Functionality.',
		],
	],

	'v.1.1.87' => [
		'date' => '12 February 2023',

		'new' => [
			'Added WooCommerce File Uploads',
			'Added Dokan plugin integration',
			'Added Advanced Custom Fields (ACF) plugin integration.',
			'Add file redirect only/ read only method instead of download after purchase in WooCommerce.',
			'Added .mkv video file support for the media player.',
			'Unlock Contact Form 7 file upload integration in the free version.',
		],
		'fix' => [
			'Fixed folder download issue.',
			'Fixed email notification issue on file upload/download/delete.',
			'Fixed minor issue with file upload.',
		],
	],
	'v.1.1.85' => [
		'date' => '17 January 2023',

		'fix'         => [
			'Fixed preview permission issue.',
			'PHP Fatal error.',
			'Fixed uploader not showing error message.',
			'Fixed WPForms Google Drive file uploader.',
		],
		'enhancement' => [
			'Updated preview functionality.',
			'Added compatibility for Elementor - v3.5.0.',
		],
	],
	'v.1.1.84' => [
		'date' => '10 January 2023',
		'new'  => [
			'Added statistics summary email report in daily, weekly, and monthly frequency.',
			'Added export/ import option for Settings, Shortcode Modules, User Private Files, and Statistics Logs.',
			'Added shortcode builder bulk selection action to delete multiple modules at once.',
		],
		'fix'  => [
			'Fixed Block Editor Module Builder Issue.',
			'Fixed Classic Editor Media Player Module Builder.',
		],
	],
	'v1.1.83'  => [
		'date' => '08 January 2023',
		'new'  => [
			'Added Download button in the media player to download the audio/video file.',
			'Added audio visualizer in the media player.',
			'Added Multiple download option for documents files.',
			'Added the option to allow users access plugin admin pages by selecting specific user roles and users.',
		],
		'fix'  => [
			'Fixed The Divi Builder compatibility issue.',
			'Fixed documents files download internal server error.',
			'Fixed multiple account issue.',
		]
	],
	'v1.1.81'  => [
		'date' => '16 December 2022',
		'fix'  => [
			'Fixed folder download internal server error issue',
			'Fixed hyperlink not working in embed documents',
		]
	],

	'v1.1.80' => [
		'date'        => '7 December, 2022',
		'new'         => [
			'Added template folder supports for while creating user private folders',
			'Added option to create and rename folders for each Google Drive form upload entry (GravityForms, WPForms, FluentForms, NinjaForms, FormidableForms, ContactForm7)',
			'Added pause/resume upload option for file upload.',
			'Added File sharing channels show/hide option in settings',
			'Added new Elementor widgets File Browser, File Uploader, Photo Gallery, Media Player, File Search, Embed Documents, Insert Download Links, Insert View Links',
			'Added new Gutenberg blocks File Browser, File Uploader, Photo Gallery, Media Player, File Search, Embed Documents, Insert Download Links, Insert View Links',
			'Added direct link option to share your files and folders with a link in your website.',
			'Added option to create Google Docs, Sheets, Slides from the file browser.',
			'Added single file selection option for the file browser module.',
			'Added single file selection option for user private folders.',
		],
		'fix'         => [
			'Fixed Classic Editor integration issue',
			'Fixed Gravity Forms Uploads not working with Google Drive',
			'Fixed Own Google App redirect URI issue',
			'Fixed multiple files zip download issue',
		],
		'enhancement' => [
			'Updated Google oAuth authentication app from WPMilitary to SoftLab',
			'Improved private folders creation process',
			'Improved Classic Editor integrations',
			'Updated Freemius SDK to the latest version.',
			'Improved multiple file selection for the file browser module.',
		],
		'remove'      => [
			'Removed Module Builder Elementor widget.',
			'Removed Module Builder Gutenberg block.',
		],
	],

	'v1.1.73' => [
		'date'        => '15 October, 2022',
		'new'         => [
			'Added supports for shared drives',
			'Added minimum file size upload option',
			'Added file selection for the Media Player & Gallery module',
			'Added Export, Import and Reset settings feature',
			'Added Gallery row height option in the Gallery module.',
			'Added NinjaForms, FluentForms and Formidable Forms Google Drive upload integration',
			'Added file sharing option in the frontend file browser.',
		],
		'fix'         => [
			'Fixed spreadsheet and slide files preview not showing issue.',
			'Fixed file browser accounts list dropdown.',
			'Fixed private folder non-allowed files showing in the list.',
			'Fixed manual Google App authentication.',
			'Fixed show files/ folders settings for the file browser module.',
		],
		'enhancement' => [
			'Improved overall Performance & User Interface',
			'Updated the file uploader UI style.',
		],
		'remove'      => [
			'Removed file browser custom background color appearance settings option.',
			'Removed Simple uploader style from the file uploader module advanced settings.',
		]
	],

	'v1.1.72' => [
		'date'        => '15 August, 2022',
		'new'         => [
			'Added file sharing.',
			'Added unlimited file size upload support.',
		],
		'fix'         => [
			'Fixed PHP error.'
		],
		'enhancement' => [
			'Improved file uploader module performance.',
		],
	],


];


?>

<div id="what-new" class="getting-started-content content-what-new">
    <div class="content-heading">
        <h2><?php esc_html_e( 'Exploring the Latest Updates', 'integrate-google-drive' ); ?></h2>
        <p><?php esc_html_e( 'Dive Into the Recent Change Logs for Fresh Insights', 'integrate-google-drive' ); ?></p>
    </div>

	<?php
	$i = 0;
	foreach ( $logs as $v => $log ) { ?>
        <div class="log <?php echo esc_attr( $i == 0 ? 'active' : '' ); ?>">
            <div class="log-header">
                <span class="log-version"><?php echo esc_html( $v ); ?></span>
                <span class="log-date">(<?php echo esc_html( $log['date'] ); ?>)</span>

                <i class="<?php echo esc_attr( $i == 0 ? 'dashicons-arrow-up-alt2' : 'dashicons-arrow-down-alt2' ); ?> dashicons "></i>
            </div>

            <div class="log-body">
				<?php

				if ( ! empty( $log['new'] ) ) {
					printf( '<div class="log-section new"><h3>%s</h3>', __( 'New Features', 'integrate-google-drive' ) );
					foreach ( $log['new'] as $item ) {
						echo '<div class="log-item log-item-new"><i class="dashicons dashicons-plus-alt2"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}


				if ( ! empty( $log['fix'] ) ) {
					printf( '<div class="log-section fix"><h3>%s</h3>', __( 'Bug Fixes', 'integrate-google-drive' ) );
					foreach ( $log['fix'] as $item ) {
						echo '<div class="log-item log-item-fix"><i class="dashicons dashicons-saved"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}

				if ( ! empty( $log['enhancement'] ) ) {
					printf( '<div class="log-section enhancement"><h3>%s</h3>', __( 'Improvements', 'integrate-google-drive' ) );
					foreach ( $log['enhancement'] as $item ) {
						echo '<div class="log-item log-item-enhancement"><i class="dashicons dashicons-star-filled"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}

				if ( ! empty( $log['remove'] ) ) {
					printf( '<div class="log-section remove"><h3>%s</h3>', __( 'Removes', 'integrate-google-drive' ) );
					foreach ( $log['remove'] as $item ) {
						echo '<div class="log-item log-item-remove"><i class="dashicons dashicons-trash"></i> <span>' . $item . '</span></div>';
					}
					echo '</div>';
				}


				?>
            </div>

        </div>
		<?php
		$i ++;
	} ?>


</div>


<script>
    jQuery(document).ready(function ($) {
        $('.log-header').on('click', function () {
            $(this).next('.log-body').slideToggle();
            $(this).find('i').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
            $(this).parent().toggleClass('active');
        });
    });
</script>