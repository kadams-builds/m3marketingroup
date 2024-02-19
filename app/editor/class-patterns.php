<?php
/**
 * Patterns class
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     0.1.0
 */

namespace M3marketingroup\App\Editor;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

/**
 * Patterns class.
 *
 * @package ContentVeggie
 * @since   0.1.0
 */
class Patterns {

	/**
	 * Theme name
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string $name Theme name.
	 */
	public string $name;

	/**
	 * Class constructor
	 *
	 * @param string $name Theme name.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function __construct( string $name ) {

		$this->name = $name;

		add_filter( 'init', array( $this, 'unregister_category' ) );
		add_filter( 'init', array( $this, 'unregister' ) );
	}

	/**
	 * Unregister block pattern categories.
	 *
	 * @since  1.0.0
	 *
	 * @access public
	 * @return bool
	 */
	public function unregister_category(): bool {
		unregister_block_pattern_category( 'posts' );
		unregister_block_pattern_category( 'buttons' );
		unregister_block_pattern_category( 'columns' );
		unregister_block_pattern_category( 'gallery' );
		unregister_block_pattern_category( 'query' );
		unregister_block_pattern_category( 'call-to-action' );

		return true;
	}

	/**
	 * Unregister
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return bool
	 */
	public function unregister(): bool {
		remove_theme_support( 'core-block-patterns' );
		return true;
	}
}
