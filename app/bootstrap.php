<?php
/**
 * Bootstrap file
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     0.1.0
 */

namespace M3marketingroup\App;

use M3marketingroup\App\Core\Defaults;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

/**
 * Initialise setup.
 *
 * @package m3marketingroup
 * @since   1.0.0
 */
new Defaults();
