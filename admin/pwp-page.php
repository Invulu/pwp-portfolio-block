<?php
/**
 * The Settings Page Content
 *
 * @package PortfolioWP Portfolio Block
 * @since PortfolioWP Portfolio Block 1.0
 */

?>

<?php $license = get_option( 'pwp_license_key' ); ?>
<?php $license_status = get_option( 'pwp_license_status' ); ?>

<div class="wrap">
	<h2><?php esc_html_e( 'Plugin License Options', 'pwp-portfolio-block' ); ?></h2>
	<form method="post" action="options.php">

		<?php settings_fields( 'pwp_license' ); ?>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" valign="top">
						<?php esc_html_e( 'License Key', 'pwp-portfolio-block' ); ?>
					</th>
					<td>
						<input id="pwp_license_key" name="pwp_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
						<label class="description" for="pwp_license_key"><?php esc_html_e( 'Enter your license key', 'pwp-portfolio-block' ); ?></label>
					</td>
				</tr>
				<?php if ( $license ) { ?>
					<tr valign="middle">
						<th scope="row" valign="top">
							<?php esc_html_e( 'Activate License', 'pwp-portfolio-block' ); ?>
						</th>
						<td>
							<?php if ( false !== $license_status && 'valid' === $license_status ) { ?>
								<?php wp_nonce_field( 'pwp_nonce', 'pwp_nonce' ); ?>
								<input type="submit" class="button-secondary" name="pwp_license_deactivate" value="<?php esc_html_e( 'Deactivate License', 'pwp-portfolio-block' ); ?>"/>
								<span style="display:inline-block;color:green;margin:4px 0px 0px 6px;"><?php esc_html_e( 'Active', 'pwp-portfolio-block' ); ?></span>
								<?php
							} else {
								wp_nonce_field( 'pwp_nonce', 'pwp_nonce' );
								?>
								<input type="submit" class="button-secondary" name="pwp_license_activate" value="<?php esc_html_e( 'Activate License', 'pwp-portfolio-block' ); ?>"/>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php submit_button(); ?>

	</form>
</div>
