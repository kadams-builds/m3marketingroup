<?php
/**
 * Styles class
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
 * Styles class.
 *
 * @package ContentVeggie
 * @since   0.1.0
 */
class Styles {

	/**
	 * Theme name, used for registering styles
	 *
	 * @since 0.1.0
	 *
	 * @access public
	 * @var string
	 */
	public string $name;

	/**
	 * Styles construct
	 *
	 * @param string $name Theme name, used for registering styles.
	 *
	 * @access public
	 * @since 0.1.0
	 */
	public function __construct( string $name ) {
		$this->name = $name;
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Register block styles
	 *
	 * Method that registers the block styles within the gutenberg editor.
	 *
	 * @return void
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register(): void {

		$block_styles = array(
			'core/code'         => array(
				'dark-code' => __( 'Dark', 'm3marketingroup' ),
			),
			'core/cover'        => array(
				'blur-image-less' => __( 'Blur Image Less', 'm3marketingroup' ),
				'blur-image-more' => __( 'Blur Image More', 'm3marketingroup' ),
				'rounded-cover'   => __( 'Rounded', 'm3marketingroup' ),
			),
			'core/group'        => array(
				'box-shadow'    => __( 'Box Shadow', 'm3marketingroup' )
			),
			'core/image'        => array(
				'rounded-full' => __( 'Rounded Full', 'm3marketingroup' ),
			),
			'core/list'         => array(
				'list-arrow'        => __( 'Arrow', 'm3marketingroup' ),
				'list-check'        => __( 'Check', 'm3marketingroup' ),
				'list-none'         => __( 'None', 'm3marketingroup' ),
				'list-numeric'      => __( 'Numberic', 'm3marketingroup' ),
			),
			'core/details'      => array(
				'accordion' => __( 'Accordion', 'm3marketingroup' ),
			),
			'core/post-excerpt' => array(
				'excerpt-truncate-2' => __( 'Truncate 2 Lines', 'm3marketingroup' ),
				'excerpt-truncate-3' => __( 'Truncate 3 Lines', 'm3marketingroup' ),
				'excerpt-truncate-4' => __( 'Truncate 4 Lines', 'm3marketingroup' ),
			),
			'core/preformatted' => array(
				'preformatted-dark' => __( 'Dark Style', 'm3marketingroup' ),
			),
			'core/post-terms'   => array(
				'term-badges' => __( 'Badges', 'm3marketingroup' ),
			),
			'core/read-more'    => array(
				'button' => __( 'Button', 'm3marketingroup' ),
			),
			'core/separator'    => array(
				'separator-dotted' => __( 'Dotted', 'm3marketingroup' ),
			),
			'core/table'        => array(
				'bordered' => __( 'Bordered', 'm3marketingroup' ),
			)
		);

		foreach ( $block_styles as $block => $styles ) {
			foreach ( $styles as $style_name => $style_label ) {
				register_block_style(
					$block,
					array(
						'name'  => $style_name,
						'label' => $style_label,
					)
				);
			}
		}
	}
}
