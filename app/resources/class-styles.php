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

namespace M3marketingroup\App\Resources;

use M3marketingroup\App\Core\Trait_Tools;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

/**
 * Styles class
 *
 * This class is used to load styles.
 *
 * @package ContentVeggie
 *
 * @since 0.1.0
 */
class Styles extends Assets {
	use Trait_Tools;

	/**
	 * Theme name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 */
	public string $name;

	/**
	 * Theme version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 */
	public string $version;

	/**
	 * Development mode.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var bool
	 */
	public bool $dev_mode;

	/**
	 * Styles constructor.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @param  string $name    Theme name.
	 * @param  string $version Theme version.
	 */
	public function __construct( string $name, string $version, bool $dev_mode = true ) {
		parent::__construct();

		$this->name     = $name;
		$this->version  = $version;
		$this->dev_mode = $dev_mode;

		add_action( 'wp_enqueue_scripts', array( $this, 'set_frontend' ) );
		add_action( 'init', array( $this, 'enqueue_custom_block_styles' ) );
	}


	/**
	 * Set frontend stylesheets.
	 *
	 * Method consists of registering style files with unique
	 * identifiers. Which is Followed by enqueuing them based on
	 * conditional logic.
	 *
	 * @return void
	 * @since  0.1.0
	 *
	 * @access public
	 */
	public function set_frontend(): void {

		wp_register_style(
			$this->name . '-ltr',
			get_theme_file_uri( 'style.css' ),
			array(),
			$this->version
		);

		wp_register_style(
			$this->name . '-rtl',
			get_theme_file_uri( 'style-rtl.css' ),
			array(),
			$this->version
		);

		wp_enqueue_style( is_rtl() ? $this->name . '-rtl' : $this->name . '-ltr' );
	}

	public function enqueue_custom_block_styles(): void {

		// Scan our styles folder to locate block styles.
		$files = glob( get_template_directory() . '/assets/styles/*.css' );

		foreach ( $files as $file ) {

			// Get the filename and core block name.
			$filename   = basename( $file, '.css' );
			$block_name = str_replace( 'core-', 'core/', $filename );

			wp_enqueue_block_style(
				$block_name,
				array(
					'handle' => "m3marketingroup-{$filename}",
					'src'    => get_theme_file_uri( "assets/styles/{$filename}.css" ),
					'path'   => get_theme_file_path( "assets/styles/{$filename}.css" ),
				)
			);
		}
	}
}
