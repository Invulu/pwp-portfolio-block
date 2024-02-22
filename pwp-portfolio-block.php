<?php
/**
 * Plugin Name: Portfolio Block PWP
 * Plugin URI: https://portfoliowp.com
 * Description: A WordPress Portfolio Block for the Gutenberg and Full Site editor. The block displays a selected post type in a masonry style portfolio layout with filterable categories. Additionally, options are included for changing colors, font sizes, layouts, styles, columns, and more.
 * Version: 1.0
 * Author: PortfolioWP
 * Author URI: https://portfoliowp.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: pwp
 * Domain Path: /languages
 *
 * @package PortfolioWP Portfolio Block
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( ! class_exists( 'PortfolioWP_Portfolio_Block' ) ) {

	/**
	 * Load our plugin class.
	 */
	class PortfolioWP_Portfolio_Block {

		/**
		 * Load instance variable.
		 *
		 * @var $instance Set instance variable.
		 */
		private static $instance;

		/**
		 * Load instance of class.
		 */
		public static function get_instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->define_constants();
			$this->loader();

			add_action( 'init', array( $this, 'register_styles' ) );
			add_action( 'init', array( $this, 'register_block_types' ) );
			// add_action( 'enqueue_block_assets', array( $this, 'editor_scripts' ) );
			add_filter( 'block_categories_all', array( $this, 'pwp_block_category' ), 10, 2 );

		}

		/**
		 * Define constants for paths.
		 */
		public function define_constants() {
			define( 'PWP_PLUGIN_URL', plugins_url( 'pwp-portfolio-block' ) );
			define( 'PWP_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
		}

		/**
		 * Load block classes for server side blocks.
		 */
		public function loader() {
			require_once PWP_PLUGIN_DIR_PATH . 'classes/class-pwp-portfolio.php';
		}

		/**
		 * Load block category.
		 *
		 * @param array $categories // Get categories.
		 * @param int   $post  // Get the post.
		 */
		public function pwp_block_category( $categories, $post ) {
			return array_merge(
				$categories,
				array(
					array(
						'slug'  => 'pwp-blocks',
						'title' => __( 'PortfolioWP Blocks', 'pwp-portfolio-block' ),
					),
				)
			);
		}

		/**
		 * Register block styles & scripts.
		 */
		public function register_styles() {

			if ( ! function_exists( 'register_block_type' ) ) {
				// Gutenberg is not active.
				return;
			}

			// Block front end styles.
			wp_register_style(
				'pwp-blocks-front-end-styles',
				PWP_PLUGIN_URL . '/css/style.css',
				array(),
				filemtime( PWP_PLUGIN_DIR_PATH . 'css/style.css' )
			);

			// Block editor styles.
			wp_register_style(
				'pwp-blocks-editor-styles',
				PWP_PLUGIN_URL . '/css/editor.css',
				array( 'wp-edit-blocks' ),
				filemtime( PWP_PLUGIN_DIR_PATH . 'css/editor.css' )
			);

			// Portfolio Editor Script.
			wp_register_script(
				'pwp-portfolio-block-editor-js',
				PWP_PLUGIN_URL . '/blocks/portfolio-block.js',
				array( 'wp-data', 'wp-api-fetch', 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'pwp-masonry-initialize' ),
				filemtime( PWP_PLUGIN_DIR_PATH . 'blocks/portfolio-block.js' ),
				true
			);

			wp_register_script( 'pwp-isotope', PWP_PLUGIN_URL . '/js/jquery.isotope.js', array( 'jquery', 'masonry' ), filemtime( plugin_dir_path( __FILE__ ) . 'js/jquery.isotope.js' ), true );

			// Load scripts in FSE Template editor. Must also include dependency in block script. For example, 'pwp-flexslider-initialize'. May not be needed as FSE integration improves.
			global $pagenow;
			if ( is_admin() && 'post.php' === $pagenow ) {
				wp_enqueue_script( 'pwp-masonry-initialize', PWP_PLUGIN_URL . '/js/masonry-admin.js', array( 'pwp-isotope', 'imagesloaded' ), filemtime( plugin_dir_path( __FILE__ ) . 'js/masonry-admin.js' ), true );
			} else {
				wp_enqueue_script( 'pwp-masonry-initialize', PWP_PLUGIN_URL . '/js/masonry-setup.js', array( 'pwp-isotope', 'imagesloaded' ), filemtime( plugin_dir_path( __FILE__ ) . 'js/masonry-setup.js' ), true );
			}
		}

		/**
		 * Register Gutenberg Blocks.
		 */
		public function register_block_types() {

			register_block_type(
				'pwp/portfolio-block',
				array(
					'style'           => 'pwp-blocks-front-end-styles',
					'script'          => 'pwp-masonry-initialize',
					'editor_style'    => 'pwp-blocks-editor-styles',
					'editor_script'   => 'pwp-portfolio-block-editor-js',
					'attributes'      => PWP_Portfolio_Block::get_attributes(),
					'render_callback' => function ( $block ) {
						wp_enqueue_script( 'pwp-pinterest', '//assets.pinterest.com/js/pinit.js', array(), '1.0', true );
						$html = PWP_Portfolio_Block::render_block_html( $block );
						return $html;
					},
				)
			);
		}
	} // End of class.

	/**
	 * Include welcome screen content.
	 *
	 * @since    1.0.0
	 */
	function pwp_welcome_screen_content() {
		include_once plugin_dir_path( __FILE__ ) . '/admin/pwp-welcome-page.php';
	}

	/**
	 * Register PWP menu page.
	 *
	 * @since 1.0.0
	 */
	function pwp_welcome_screen() {

		$icon_svg = 'data:image/svg+xml;base64,' . base64_encode(
			'<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="120 10 40 40" xml:space="preserve">
			<g>
				<path fill="#a0a5aa" d="M144.128,11.221c-7.733,0-13.455,1.824-17.002,5.421c-8.137,8.252-5.41,17.112-4.38,19.634
					c0.906,2.217,2.021,3.613,2.875,4.35l2.957-2.609l-0.278-13.13l2.999,10.728l4.374-3.86l0.438-10.677l1.894,8.617l10.528-8.433
					l-8.292,10.76l8.57,1.933l-10.595,0.444l-3.776,4.422l10.614,3.049l-12.974-0.278l-2.522,2.956c0.092,0.11,0.194,0.228,0.315,0.344
					c1.9,1.938,5.897,3.889,10.54,3.889c3.257,0,8.112-0.991,12.775-5.72c8.079-8.19,4.882-25.648,3.841-30.338
					C154.816,12.222,149.721,11.221,144.128,11.221L144.128,11.221L144.128,11.221z"/>
			</g>
			</svg>'
		);

		// Add Menu Item.
		add_menu_page(
			esc_html__( 'Portfolio Block', 'pwp' ),
			esc_html__( 'Portfolio Block', 'pwp' ),
			'manage_options',
			'pwp-portfolio-block',
			'pwp_welcome_screen_content',
			$icon_svg,
			110
		);

		// Add Upgrade Link.
		add_submenu_page(
			'pwp-portfolio-block',
			'Upgrade',
			esc_html__( 'Upgrade', 'pwp' ),
			'manage_options',
			'https://portfoliowp.com'
		);
	}
	// add_action( 'admin_menu', 'pwp_welcome_screen' );

	PortfolioWP_Portfolio_Block::get_instance();
}
