<?php
/**
 * Assets class
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2023, GetMediaWise Ltd
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
 * Assets class
 *
 * This class is used to load styles and scripts.
 *
 * @package ContentVeggie
 *
 * @since 0.1.0
 */
class Assets {
	use Trait_Tools;

	public function __construct() {}

	/**
	 * Initialise styles and scripts.
	 *
	 * @param string $name Theme name.
	 * @param string $version Theme version.
	 *
	 * @return void
	 * @since 0.1.0
	 *
	 * @access public
	 */
	public function init( string $name, string $version ): void {
		new Styles( $name, $version );
		new Scripts( $name, $version );
	}

	/**
	 * Directory
	 *
	 * @param string $type Request type.
	 *
	 * @return string Return directory.
	 * @since  0.1.0
	 *
	 * @access public
	 */
	protected function dir( string $type ): string {
		switch ( $type ) {
			case 'css':
				$directory = $this->get_path( 'assets/css' );
				break;
			case 'js':
				$directory = $this->get_path( 'assets/js' );
				break;
			case 'media':
				$directory = $this->get_path( 'assets/media' );
				break;
			default:
				$directory = $this->get_path( 'assets' );
				break;
		}

		return $directory;
	}
}
