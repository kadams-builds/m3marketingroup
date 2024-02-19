<?php
/**
 * Theme template parts
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     1.0.0
 */

namespace M3marketingroup\App\Editor;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

/**
 * Template parts class
 *
 * @since 1.0.0
 * @package ContentVeggie
 */
class Template_Parts {

	/**
	 * Template parts construct
	 *
	 * @since 0.1.0
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		add_filter( 'default_wp_template_part_areas', array( $this, 'register' ) );
	}

	/**
	 * Register areas
	 *
	 * @since 0.1.0
	 *
	 * @access public
	 * @param array<array<string>> $areas Areas.
	 * @return array<array<string>>
	 */
	public function register( array $areas ): array {
		$areas[] = array(
			'area'        => 'sidebar',
			'area_tag'    => 'section',
			'label'       => esc_html__( 'Sidebar', 'm3marketingroup' ),
			'description' => esc_html__( 'Custom description', 'm3marketingroup' ),
			'icon'        => 'sidebar',
		);

		return $areas;
	}
}
