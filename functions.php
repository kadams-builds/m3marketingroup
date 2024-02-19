<?php
/**
 * Theme functions file
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

$autoload = get_parent_theme_file_path( '/app/autoload.php' );

if ( file_exists( $autoload ) ) {
	require_once $autoload;
}
