<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<img src="/wp-content/plugins/chatblend/images/chat.png" />

	<form method="post" action="options.php">
		<?php settings_fields( 'cb_settings' ); ?>
		<?php do_settings_sections( 'cb_settings' ); ?>

		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
		</p>
	</form>
</div> <!-- .wrap -->
