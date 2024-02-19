<?php
/**
 * Shortcodes class
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     1.0.0
 */

namespace M3marketingroup\App\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

/**
 * Shortcodes class
 *
 * @package ContentVeggie
 *
 * @since 0.1.0
 */
class Shortcodes {
	use Trait_Tools;

	/**
	 * Constructor method for shortcodes class
	 *
	 * @since 0.1.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->set();
	}

	/**
	 * Set shortcodes
	 *
	 * @since 0.1.0
	 *
	 * @access public
	 * @return void
	 */
	public function set() {
		add_shortcode( 'day', [ $this, 'get_shortcode_day' ] );
		add_shortcode( 'month', [ $this, 'get_shortcode_month' ] );
		add_shortcode( 'year', [ $this, 'get_shortcode_year' ] );
		add_shortcode( 'month_year', [ $this, 'get_shortcode_month_year' ] );
		add_shortcode( 'site_name', [ $this, 'get_shortcode_site_name' ] );
	}

	/**
	 * Display Day - Shortcode Class
	 *
	 * @since  0.1.0
	 *
	 * @access public
	 * @return string
	 */
	public function get_shortcode_day(): string {
		return gmdate( 'l' );
	}

	/**
	 * Display Month  - Shortcode Class
	 *
	 * @since  0.1.0
	 *
	 * @access public
	 * @return string
	 */
	public function get_shortcode_month(): string {
		return gmdate( 'F' );
	}

	/**
	 * Display Year  - Shortcode Class
	 *
	 * @since  0.1.0
	 *
	 * @access public
	 * @return string
	 */
	public function get_shortcode_year(): string {
		return gmdate( 'Y' );
	}


	/**
	 * Display Month & Year Shortcode Function
	 *
	 * @since  0.1.0
	 *
	 * @access public
	 * @return string
	 */
	public function get_shortcode_month_year(): string {
		return gmdate( 'F Y' );
	}

	/**
	 * Display Site Name Shortcode Function
	 *
	 * @since 0.1.0
	 *
	 * @access public
	 * @return string
	 */
	public function get_shortcode_site_name(): string {
		return get_bloginfo( 'name' );
	}
}
