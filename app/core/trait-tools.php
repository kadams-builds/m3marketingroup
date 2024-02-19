<?php
/**
 * Trait Tools
 *
 * @author    Karl Adams <karladams@getmediawise.com>
 * @copyright Copyright (c) 2024, GetMediaWise Ltd
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package   m3marketingroup
 * @since     0.1.0
 */

namespace M3marketingroup\App\Core;

use WP_Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Restricted Access' );
}

/**
 * Trait tools
 *
 * @since 1.0.0
 */
trait Trait_Tools {

	/**
	 * Fetches theme data.
	 *
	 * @param WP_Theme $theme Requires theme object.
	 *
	 * @return array<string, string> Theme data.
	 * @since  1.0.0
	 *
	 * @access public
	 */
	public function get_theme_data( WP_Theme $theme ): array {
		return array(
			'name'         => $theme->get( 'Name' ) ?: '',
			'uri'          => $theme->get( 'ThemeURI' ) ?: '',
			'description'  => $theme->get( 'Description' ) ?: '',
			'version'      => $theme->get( 'Version' ) ?: '',
			'text-domain'  => $theme->get( 'TextDomain' ) ?: '',
			'requires_wp'  => $theme->get( 'RequiresWP' ) ?: '',
			'requires_php' => $theme->get( 'RequiresPHP' ) ?: '',
			'domain_path'  => $theme->get( 'DomainPath' ) ?: '',
			'template'     => $theme->get( 'Template' ) ?: '',
		);
	}

	/**
	 * Retrieves theme value
	 *
	 * @param string $request Type of theme item to return value of.
	 *
	 * @since  1.0.0
	 *
	 * @access public
	 */
	public function get_theme_value( string $request ): string {

		$data = $this->get_theme_data( wp_get_theme() );

		if ( 'name' === $request && is_child_theme() ) {
			return strtolower( $data['template'] );
		} else {
			return $data[ $request ];
		}
	}

	/**
	 *  Retrieve theme url.
	 *
	 * @return string Theme URL value.
	 * @since  1.0.0
	 *
	 * @access public
	 */
	public function get_theme_url(): string {
		return get_template_directory_uri();
	}

	/**
	 * Retrieve theme path.
	 *
	 * @return  string plugin path.
	 * @since  1.0.0
	 *
	 * @access  public
	 */
	public function get_theme_path(): string {
		return get_template_directory();
	}

	/**
	 * Retrieve requested path.
	 *
	 * @param string   $request Type of item.
	 * @param bool     $screen If the request is public or admin.
	 * @param string[] $path Array of values.
	 *
	 * @return string       Related path.
	 * @since  1.0.0
	 *
	 * @access public
	 */
	public function get_path( string $request, bool $screen = false, array $path = array() ): string {
		$path['url']     = trailingslashit( $this->get_theme_url() );
		$path['dir']     = true === $screen ? trailingslashit( 'admin' ) : false;
		$path['request'] = trailingslashit( $request );

		return esc_url_raw( implode( '', $path ) );
	}
}
