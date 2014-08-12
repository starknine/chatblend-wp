<?php
/*
 * Basic Section
 */
?>

<?php if ( 'cb_api-key' == $field['label_for'] ) : ?>

	<input id="<?php esc_attr_e( 'cb_settings[cb_api-key]' ); ?>" name="<?php esc_attr_e( 'cb_settings[cb_api-key]' ); ?>" class="regular-text" value="<?php esc_attr_e( $settings['cb_api-key'] ); ?>" />
	<span class="help"> The API Key that was provided to you when you signed up/created your account</span>

<h3> If you do not have an account yet. Please visit <a href="https://www.chatblend.com/signup_part1.php">ChatBlend - Live Chat</a> to sign up.</h3>
<?php endif; ?>


