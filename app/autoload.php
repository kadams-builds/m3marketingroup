<?php
/**
 * Autoloader
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     0.1.0
 */

namespace M3marketingroup\App;

spl_autoload_register(
	function ( $file ) {

		$file_path = explode( '\\', $file );
		$file_name = '';

		if ( isset( $file_path[ count( $file_path ) - 1 ] ) ) {
			$file_name       = strtolower( $file_path[ count( $file_path ) - 1 ] );
			$file_path       = str_replace( '_', '-', $file_path );
			$file_name       = str_ireplace( '_', '-', $file_name );
			$file_name_parts = explode( '-', $file_name );

			$index = $file_name_parts[0];

			if ( 'interface' === $index || 'trait' === $index ) {
				$file_name = implode( '-', $file_name_parts );
				$file_name = $file_name . '.php';
			} else {
				$file_name = 'class-' . $file_name . '.php';
			}
		}

		$fully_qualified_path = trailingslashit( dirname( __FILE__, 2 ) );

		for ( $i = 1; $i < count( $file_path ) - 1; $i ++ ) {
			$dir                   = strtolower( $file_path[ $i ] );
			$fully_qualified_path .= trailingslashit( $dir );
		}

		$fully_qualified_path .= $file_name;

		if ( stream_resolve_include_path( $fully_qualified_path ) ) {
			include_once $fully_qualified_path;
		}
	}
);

/**
 * List of whitelisted php files.
 *
 * @return string[]
 * @since 1.0.0
 */
function whitelisted_files(): array {
	return array(
		'bootstrap',
	);
}

/**
 * Autoload function files.
 *
 * Load required functions files.
 *
 * @since 1.0.0
 */
array_map(
	static function( $file ) {
		require_once dirname( __FILE__, 2 ) . '/app/' . $file . '.php';
	},
	whitelisted_files()
);
