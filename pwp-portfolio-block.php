<?php
/**
 * Plugin Name: PortfolioWP Portfolio Block
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

	PortfolioWP_Portfolio_Block::get_instance();
}
