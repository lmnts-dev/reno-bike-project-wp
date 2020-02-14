<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_menu' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'rbp_options', 'rbp_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_menu() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'theme_options', 'theme_options_do_menu' );
}


/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'rbp_options' ); ?>
			<?php $options = get_option( 'rbp_theme_options' ); ?>

			<table class="form-table">


				<?php
				/**
				 * Title 
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Some text' ); ?></th>
					<td>
						<input id="rbp_theme_options[title]" class="regular-text" type="text" name="rbp_theme_options[title]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
						<label class="description" for="rbp_theme_options[sometext]"><?php _e( 'Homepage Blurb Title' ); ?></label>
					</td>
				</tr>


				<?php
				/**
				 * Blurb
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Homepage Blurb' ); ?></th>
					<td>
						<textarea id="rbp_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="rbp_theme_options[sometextarea]"><?php echo stripslashes( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="rbp_theme_options[sometextarea]"><?php _e( 'rbp text box' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit" style="text-align: center">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" style="padding: 10px; font-size: 14px;!important"/>
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
		$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/