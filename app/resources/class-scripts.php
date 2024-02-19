<?php
/**
 * Scripts class
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
 * Scripts class
 *
 * This class is used to load scripts.
 *
 * @package ContentVeggie
 *
 * @since 0.1.0
 */
class Scripts extends Assets {
	use Trait_Tools;

	/**
	 * Theme name.
	 *
	 * @since  1.0.0
	 *
	 * @access public
	 * @var    string Theme name.
	 */
	public string $name;

	/**
	 * Theme version.
	 *
	 * @since  1.0.0
	 *
	 * @access public
	 * @var    string Theme version.
	 */
	public string $version;

	/**
	 * Actions
	 *
	 * @since  1.0.0
	 *
	 * @access protected
	 * @var    array<string> Set class actions.
	 */
	protected array $actions;

	/**
	 * Styles constructor.
	 *
	 * @since  1.0.0
	 *
	 * @access public
	 * @param  string $name    Theme name.
	 * @param  string $version Theme version.
	 */
	public function __construct( string $name, string $version ) {
		parent::__construct();

		$this->name    = $name;
		$this->version = $version;
		//add_action( 'wp_enqueue_scripts', array( $this, 'set_frontend' ) );
	}

	/**
	 * Set Frontend Scripts
	 *
	 * @since  1.0.0
	 *
	 * @access public
	 */
	public function set_frontend(): void {

		wp_register_script(
			$this->name,
			$this->dir( 'js' ) . $this->name . '.js',
			array(),
			$this->version,
			true
		);

		wp_enqueue_script( $this->name );
	}
}
