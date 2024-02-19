<?php
/**
 * Theme defaults
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     1.0.0
 */

namespace M3marketingroup\App\Core;

use M3marketingroup\App\Editor;
use M3marketingroup\App\Resources;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

class Defaults {
	use Trait_Tools;

	public function __construct() {
		$name = $this->get_theme_value( 'name' );

		if ( 1 !== get_transient( $name . '_setup' ) ) {
			$this->run();
		}

		set_transient( $name . '_setup', true, 12 * HOUR_IN_SECONDS );

		add_action( 'after_setup_theme', array( $this, 'set_supports' ) );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	public function set_supports(): void {

		/**
		 * Add block editor support.
		 *
		 * @since 1.0.0
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Add support for editor style.
		 *
		 * @since 1.0.0
		 */
		add_editor_style( 'style.css' );
	}

	/**
	 * Run method for theme defaults.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function run(): void {
		$text_domain = $this->get_theme_value( 'text-domain' );
		$version     = $this->get_theme_value( 'version' );

		new Filters();
		new Shortcodes();
		new Tokens();

		new Editor\Patterns( $text_domain );
		new Editor\Styles( $text_domain );
		new Editor\Template_Parts();

		( new Resources\Assets() )->init(
			$text_domain,
			$version
		);

		add_action(
			'init',
			function() {
				if ( class_exists( 'WooCommerce' ) ) {
					new Setup();
				}
			}
		);
	}
}
