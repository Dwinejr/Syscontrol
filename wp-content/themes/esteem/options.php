<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$options = array();

	// Header Options Area
	$options[] = array(
		'name' => __( 'Header', 'esteem' ),
		'type' => 'heading'
	);

	// Header Logo upload option
	$options[] = array(
		'name' 	=> __( 'Header Logo', 'esteem' ),
		'desc' 	=> __( 'Upload logo for your header.', 'esteem' ),
		'id' 		=> 'esteem_header_logo_image',
		'type' 	=> 'upload'
	);

	// Header logo and text display type option
	$header_display_array = array(
		'logo_only' 	=> __( 'Header Logo Only', 'esteem' ),
		'text_only' 	=> __( 'Header Text Only', 'esteem' ),
		'both' 	=> __( 'Show Both', 'esteem' ),
		'none'		 	=> __( 'Disable', 'esteem' )
	);
	$options[] = array(
		'name' 		=> __( 'Show', 'esteem' ),
		'desc' 		=> __( 'Choose the option that you want.', 'esteem' ),
		'id' 			=> 'esteem_show_header_logo_text',
		'std' 		=> 'text_only',
		'type' 		=> 'radio',
		'options' 	=> $header_display_array 
	);

	//Promo bar
	$options[] = array(
		'name' => __('Promo box Primary Slogan', 'esteem'),
		'desc' => __('Enter the main Slogan', 'esteem'),
		'id' => 'esteem_slogan',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('Promo box secondary Slogan', 'esteem'),
		'desc' => __('Enter the sub slogan', 'esteem'),
		'id' => 'esteem_sub_slogan',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('Button Text', 'esteem'),
		'desc' => __('Button text', 'esteem'),
		'id' => 'esteem_button_text',
		'std' => '',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('Button redirect link', 'esteem'),
		'desc' => __('Enter redirect link', 'esteem'),
		'id' => 'esteem_button_redirect_link',
		'std' => '',
		'type' => 'text'
	);



	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Design', 'esteem' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' 		=> __( 'Site Layout', 'esteem' ),
		'desc' 		=> __( 'Choose your site layout. The change is reflected in whole site.', 'esteem' ),
		'id' 			=> 'esteem_site_layout',
		'std' 		=> 'box',
		'type' 		=> 'radio',
		'options' 	=> array(
							'box' 	=> __( 'Boxed layout', 'esteem' ),
							'wide' 	=> __( 'Wide layout', 'esteem' )
						)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout', 'esteem' ),
		'desc' 		=> __( 'Select default layout. This layout will be reflected in whole site archives, search etc. The layout for a single post and page can be controlled from below options.', 'esteem' ),
		'id' 			=> 'esteem_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> ESTEEM_ADMIN_IMAGES_URL . '/right-sidebar.png',
								'left_sidebar' 		=> ESTEEM_ADMIN_IMAGES_URL . '/left-sidebar.png',
								'no_sidebar_full_width'				=> ESTEEM_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
								'no_sidebar_content_centered'		=> ESTEEM_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout for pages only', 'esteem' ),
		'desc' 		=> __( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'esteem' ),
		'id' 			=> 'esteem_pages_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> ESTEEM_ADMIN_IMAGES_URL . '/right-sidebar.png',
								'left_sidebar' 		=> ESTEEM_ADMIN_IMAGES_URL . '/left-sidebar.png',
								'no_sidebar_full_width'				=> ESTEEM_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
								'no_sidebar_content_centered'		=> ESTEEM_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout for single posts only', 'esteem' ),
		'desc' 		=> __( 'Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'esteem' ),
		'id' 			=> 'esteem_single_posts_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> ESTEEM_ADMIN_IMAGES_URL . '/right-sidebar.png',
								'left_sidebar' 		=> ESTEEM_ADMIN_IMAGES_URL . '/left-sidebar.png',
								'no_sidebar_full_width'				=> ESTEEM_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
								'no_sidebar_content_centered'		=> ESTEEM_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Blog page display type', 'esteem' ),
		'desc' 		=> __( 'Choose the display type for the latests posts view or posts page view (static front page).', 'esteem' ),
		'id' 			=> 'esteem_posts_page_display_type',
		'std' 		=> 'full_content',
		'type' 		=> 'radio',
		'options' 	=> array(
							'large_image' 	=> __( 'Large featured image', 'esteem' ),
							'small_image' 	=> __( 'Small featured image', 'esteem' ),
							'full_content' 	=> __( 'Full Content', 'esteem' )
						)
	);

	// Site primary color option
	$options[] = array(
		'name' 		=> __( 'Primary color option', 'esteem' ),
		'desc' 		=> __( 'This will reflect in links, buttons and many others. Choose a color to match your site.', 'esteem' ),
		'id' 			=> 'esteem_primary_color',
		'std' 		=> '#ED564B',
		'type' 		=> 'color' 
	);

	$options[] = array(
		'name' 		=> __( 'Need to replace default background?', 'esteem' ),
		'desc' 		=> sprintf( __( '<a href="%1$s">Click Here</a>', 'esteem' ), admin_url('themes.php?page=custom-background') ).'&nbsp;&nbsp;&nbsp;'.__( 'Note: The background will only be seen if you choose any of the boxed layout option in site layout option.', 'esteem' ),
		'type' 		=> 'info'
	);

	$options[] = array(
		'name' 		=> __( 'Custom CSS', 'esteem' ),
		'desc' 		=> __( 'Write your custom css.', 'esteem' ),
		'id' 			=> 'esteem_custom_css',
		'std' 		=> '',
		'type' 		=> 'textarea'
	);

	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Additional', 'esteem' ),
		'type' => 'heading'
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'esteem' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'esteem' ),
		'id' 			=> 'esteem_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Fav icon upload option
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'esteem' ),
		'desc' 	=> __( 'Upload favicon for your site.', 'esteem' ),
		'id' 		=> 'esteem_favicon',
		'type' 	=> 'upload'
	);

	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Slider', 'esteem' ),
		'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'esteem' ),
		'desc' 		=> __( 'Check to activate slider.', 'esteem' ),
		'id' 			=> 'esteem_activate_slider',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Slide options
	for( $i=1; $i<=4; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'esteem' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'esteem' ),
			'id' 		=> 'esteem_slider_image'.$i,
			'type' 	=> 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter title for your slider.', 'esteem' ),
			'id' 		=> 'esteem_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter your slider description.', 'esteem' ),
			'id' 		=> 'esteem_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect slider when clicked', 'esteem' ),
			'id' 		=> 'esteem_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}	

	return $options;
}

add_action( 'optionsframework_after','esteem_options_display_sidebar' );

/**
 * Esteem admin sidebar
 */
function esteem_options_display_sidebar() { ?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="postbox">
	    		<h3><?php esc_attr_e( 'About Esteem', 'esteem' ); ?></h3>
      			<div class="inside">
      				<div class="option-btn"><a class="btn upgrade" target="_blank" href="<?php echo esc_url( 'http://themegrill.com/themes/esteem-pro/' ); ?>"><?php esc_attr_e( 'Upgrade to Pro' , 'esteem' ); ?></a></div> 
					<div class="option-btn"><a class="btn support" target="_blank" href="<?php echo esc_url( 'http://themegrill.com/support-forum/' ); ?>"><?php esc_attr_e( 'Free Support' , 'esteem' ); ?></a></div>
					<div class="option-btn"><a class="btn doc" target="_blank" href="<?php echo esc_url( 'http://themegrill.com/theme-instruction/esteem/' ); ?>"><?php esc_attr_e( 'Documentation' , 'esteem' ); ?></a></div>
					<div class="option-btn"><a class="btn demo" target="_blank" href="<?php echo esc_url( 'http://demo.themegrill.com/esteem/' ); ?>"><?php esc_attr_e( 'View Demo' , 'esteem' ); ?></a></div>

	      			<div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
	      				<strong><?php esc_attr_e( 'If you like our work. Buy us a beer.', 'esteem' ); ?></strong>
	      				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="8AHDCA8CDGAJG">
							<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
						</form>
					</div>
      			</div><!-- inside -->
	    	</div><!-- .postbox -->
	  	</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
<?php
}
?>