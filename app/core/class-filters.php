<?php
/**
 * Filter settings
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

class Filters {

	/**
	 * Filters constructor.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->set();
	}

	/**
	 * Set filters
	 *
	 * @return void
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function set() {
		add_filter( 'the_title', 'do_shortcode' );
		add_filter( 'widget_title', 'do_shortcode' );
		add_filter( 'get_the_title', 'do_shortcode' );
		add_filter( 'single_cat_title', 'do_shortcode' );
		add_filter( 'posts_search', array( $this, 'search_filter_by_title_only' ), 10, 2 );

		add_filter(
			'rank_math/replacements',
			function ( $replacements ) {
				if ( is_array( $replacements ) ) {
					foreach ( $replacements as $key => $replacement ) {
						$replacements[ $key ] = do_shortcode( $replacement );
					}
				}

				return $replacements;
			}
		);
	}

	public function search_filter_by_title_only( $search, $wp_query ) {
		global $wpdb;
		if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
			$q      = $wp_query->query_vars;
			$n      = ! empty( $q['exact'] ) ? '' : '%';
			$search = array();

			foreach ( (array) $q['search_terms'] as $term ) {
				$search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );
			}

			if ( ! is_user_logged_in() ) {
				$search[] = "$wpdb->posts.post_password = ''";
			}

			$search = ' AND ' . implode( ' AND ', $search );
		}

		return $search;
	}

}
