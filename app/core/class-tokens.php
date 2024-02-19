<?php
/**
 * Tokens class file.
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
 * Error class.
 *
 * @package ContentVeggie
 *
 * @since 0.1.0
 */
class Tokens {

	/**
	 * Tokens constructor.
	 *
	 * @return void
	 * @since 0.1.0
	 * @access public
	 */
	public function __construct() {
		add_filter( 'the_content', array( $this, 'replace' ) );
		add_filter( 'render_block', array( $this, 'modify' ), 10, 2 );
	}

	/**
	 * Block Render Modifications
	 *
	 * @param $block_content
	 * @param $block
	 *
	 * @return array|mixed|string|string[]
	 */
	public function modify( $block_content, $block ): mixed {
		if ( empty( $block_content ) ) {
			return $block_content;
		}

		return $this->replace( $block_content );
	}

	/**
	 * Replace tokens in content
	 *
	 * @param string $content Content.
	 *
	 * @return array|string|string[]
	 * @since 0.1.0
	 *
	 * @access public
	 */
	public function replace( string $content ) {

		$year       = gmdate( 'Y' );
		$month      = gmdate( 'F' );
		$month_year = gmdate( 'F Y' );
		$day        = gmdate( 'jS' );

		$site_name   = get_bloginfo( 'name' );
		$author_name = get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) );

		return str_replace(
			array(
				'{{year}}',
				'{{month}}',
				'{{month_year}}',
				'{{day}}',
				'{{site_name}}',
				'{{casino_name}}',
				'{{author_name}}',
			),
			array(
				$year,
				$month,
				$month_year,
				$day,
				$site_name,
				$author_name,
			),
			$content
		);
	}
}
