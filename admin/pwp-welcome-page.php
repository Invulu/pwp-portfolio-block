<?php
/**
 * The Welcom Page Content
 *
 * @package PortfolioWP Portfolio Block
 * @since PortfolioWP Portfolio Block 1.0
 */

?>

<?php $current_user = wp_get_current_user(); ?>

<div class="wrap welcome-screen">

	<div class="intro clearfix">

		<div class="logo-wrap">

			<div class="portfoliowp-logo">

			</div>

		</div>

		<h2 class="admin-headline"><?php _e( 'PortfolioWP Portfolio Block', 'pwp' ); ?></h2>

		<p class="admin-tagline"><?php _e( 'Howdy ' ) ?><b><?php global $userdata, $current_user, $user_identity; echo $user_identity ?></b><?php printf( __( ', you\'re moments away from creating awesome portfolios on any page of your website!', 'pwp' ) ); ?></p>

		<p><?php printf( __( 'Enter your email to receive important updates and information from <a href="%1$s" target="_blank">PortfolioWP</a>.', 'pwp' ), 'https://portfoliowp.com' ); ?></p>

		<div id="mc_embed_signup" class="clear" style="overflow: hidden; margin-bottom: 12px;">
			<form action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>
					<div class="mc-field-group" style="float: left;">
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
					</div>
					<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
				</div>
			</form>
		</div>

		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

		<!-- BEGIN .feature-links -->
		<div class="feature-links">

			<a href="<?php echo esc_url('https://portfoliowp.com/') ?>" target="_blank">
				<span class="icon">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
					<path d="M16.5 20h-14c-0.827 0-1.5-0.673-1.5-1.5v-14c0-0.827 0.673-1.5 1.5-1.5h1c0.276 0 0.5 0.224 0.5 0.5s-0.224 0.5-0.5 0.5h-1c-0.276 0-0.5 0.224-0.5 0.5v14c0 0.276 0.224 0.5 0.5 0.5h14c0.276 0 0.5-0.224 0.5-0.5v-14c0-0.276-0.224-0.5-0.5-0.5h-1c-0.276 0-0.5-0.224-0.5-0.5s0.224-0.5 0.5-0.5h1c0.827 0 1.5 0.673 1.5 1.5v14c0 0.827-0.673 1.5-1.5 1.5z"></path>
					<path d="M13.501 5c-0 0-0 0-0.001 0h-8c-0.276 0-0.5-0.224-0.5-0.5 0-1.005 0.453-1.786 1.276-2.197 0.275-0.138 0.547-0.213 0.764-0.254 0.213-1.164 1.235-2.049 2.459-2.049s2.246 0.885 2.459 2.049c0.218 0.041 0.489 0.116 0.764 0.254 0.816 0.408 1.268 1.178 1.276 2.17 0.001 0.009 0.001 0.018 0.001 0.027 0 0.276-0.224 0.5-0.5 0.5zM6.060 4h6.88c-0.096-0.356-0.307-0.617-0.638-0.79-0.389-0.203-0.8-0.21-0.805-0.21-0.276 0-0.497-0.224-0.497-0.5 0-0.827-0.673-1.5-1.5-1.5s-1.5 0.673-1.5 1.5c0 0.276-0.224 0.5-0.5 0.5-0.001 0-0.413 0.007-0.802 0.21-0.331 0.173-0.542 0.433-0.638 0.79z"></path>
					<path d="M9.5 3c-0.132 0-0.261-0.053-0.353-0.147s-0.147-0.222-0.147-0.353 0.053-0.261 0.147-0.353c0.093-0.093 0.222-0.147 0.353-0.147s0.261 0.053 0.353 0.147c0.093 0.093 0.147 0.222 0.147 0.353s-0.053 0.26-0.147 0.353c-0.093 0.093-0.222 0.147-0.353 0.147z"></path>
					<path d="M8 14c-0.128 0-0.256-0.049-0.354-0.146l-1.5-1.5c-0.195-0.195-0.195-0.512 0-0.707s0.512-0.195 0.707 0l1.146 1.146 4.146-4.146c0.195-0.195 0.512-0.195 0.707 0s0.195 0.512 0 0.707l-4.5 4.5c-0.098 0.098-0.226 0.146-0.354 0.146z"></path>
					</svg>
				</span>
				<span class="info">
					<h4><?php esc_html_e( 'Getting Started', 'pwp' ); ?></h4>
					<p><?php esc_html_e( 'Review our guide to using the simple PortfolioWP Portfolio Block plugin.', 'pwp' ); ?></p>
				</span>
			</a>

			<a href="<?php echo esc_url('https://wordpress.org/support/plugin/pwp-portfolio-block/') ?>" target="_blank">
				<span class="icon">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
					<path d="M17.071 2.929c-1.889-1.889-4.4-2.929-7.071-2.929s-5.182 1.040-7.071 2.929c-1.889 1.889-2.929 4.4-2.929 7.071s1.040 5.182 2.929 7.071c1.889 1.889 4.4 2.929 7.071 2.929s5.182-1.040 7.071-2.929c1.889-1.889 2.929-4.4 2.929-7.071s-1.040-5.182-2.929-7.071zM10 15c-2.757 0-5-2.243-5-5s2.243-5 5-5c2.757 0 5 2.243 5 5s-2.243 5-5 5zM1 10c0-0.338 0.019-0.672 0.056-1h3.028c-0.055 0.325-0.084 0.659-0.084 1s0.029 0.675 0.084 1l-3.028-0c-0.036-0.328-0.056-0.662-0.056-1zM15.916 9h3.028c0.036 0.328 0.056 0.662 0.056 1s-0.019 0.672-0.056 1h-3.028c0.055-0.325 0.084-0.659 0.084-1s-0.029-0.675-0.084-1zM18.776 8h-3.119c-0.604-1.702-1.955-3.053-3.657-3.657l0-3.119c3.36 0.765 6.010 3.416 6.776 6.776zM11 1.056l-0 3.028c-0.325-0.055-0.659-0.084-1-0.084s-0.675 0.029-1 0.084v-3.028c0.328-0.036 0.662-0.056 1-0.056s0.672 0.019 1 0.056zM8 1.224v3.119c-1.702 0.604-3.053 1.955-3.657 3.657h-3.119c0.765-3.36 3.416-6.010 6.776-6.776zM1.224 12l3.119 0c0.604 1.702 1.955 3.053 3.657 3.657v3.119c-3.36-0.765-6.010-3.416-6.776-6.776zM9 18.944v-3.028c0.325 0.055 0.659 0.084 1 0.084s0.675-0.029 1-0.084v3.028c-0.328 0.037-0.662 0.056-1 0.056s-0.672-0.019-1-0.056zM12 18.776v-3.119c1.702-0.604 3.053-1.955 3.657-3.657h3.119c-0.765 3.36-3.416 6.010-6.776 6.776z"></path>
					</svg>
				</span>
				<span class="info">
					<h4><?php esc_html_e( 'Support Forums', 'pwp' ); ?></h4>
					<p><?php esc_html_e( 'Have a question or found a bug? Let us know in the support forum.', 'pwp' ); ?></p>
				</span>
			</a>

			<a href="<?php echo esc_url('https://portfoliowp.com/') ?>" target="_blank">
				<span class="icon">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
					<path d="M3.5 14h13c0.827 0 1.5-0.673 1.5-1.5v-8c0-0.827-0.673-1.5-1.5-1.5h-13c-0.827 0-1.5 0.673-1.5 1.5v8c0 0.827 0.673 1.5 1.5 1.5zM3 4.5c0-0.276 0.224-0.5 0.5-0.5h13c0.276 0 0.5 0.224 0.5 0.5v8c0 0.276-0.224 0.5-0.5 0.5h-13c-0.276 0-0.5-0.224-0.5-0.5v-8z"></path>
					<path d="M19.5 15h-19c-0.276 0-0.5 0.224-0.5 0.5v1c0 0.827 0.673 1.5 1.5 1.5h17c0.827 0 1.5-0.673 1.5-1.5v-1c0-0.276-0.224-0.5-0.5-0.5zM18.5 17h-17c-0.276 0-0.5-0.224-0.5-0.5v-0.5h18v0.5c0 0.276-0.224 0.5-0.5 0.5z"></path>
					</svg>
				</span>
				<span class="info">
					<h4><?php esc_html_e( 'Premium Patterns', 'pwp' ); ?></h4>
					<p><?php esc_html_e( 'Go pro to get the awesome PortfolioWP Pro Theme with premium patterns for creating dynamic portfolios.', 'pwp' ); ?></p>
				</span>
			</a>

		<!-- END .feature-links -->
		</div>

	</div>

</div>
