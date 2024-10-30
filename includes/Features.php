<?php
/*
 * @package       codepile
 * @copyright     (C) Copyright 2022 Ryan Rhode, All rights reserved.
 * @author        Ryan Rhode, ryan@codepile.ca
 * @version       2022.03.18 17:14:51 EDT
 * @license       This program is free software; you can redistribute it and/or modify
 *        it under the terms of the GNU General Public License as published by
 *        the Free Software Foundation; either version 2 of the License, or
 *        (at your option) any later version.
 *
 *        This program is distributed in the hope that it will be useful,
 *        but WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *        GNU General Public License for more details.
 *
 *        You should have received a copy of the GNU General Public License along
 *        with this program;  If not, see http://www.gnu.org/licenses/gpl-2.0.html.
 *
 */

namespace CodePile;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * @method all()
 */
class Features {

	// Track containers in order to append fields to them.
	private $containers = [];

	/**
	 * Magic method that returns the requested feature info.
	 * Examples:
	 * new Features->all() - All features
	 * new Features->free() - All free features.
	 * new Features->free('memory') - Memory feature
	 * new Features->free('memory', 'title') - Memory title
	 *
	 * @param $name string The plan or all.
	 * @param $arguments array string feature id [, string 'title'|'desc'|'slug']
	 *
	 * @return array|bool|FeaturesData
	 */
	public function __call( $name = '', $arguments = [] ) {
		$features_data = new FeaturesData();
		$features      = $features_data->get();

		if ( $name == 'all' ) {
			return $features;
		}

		if ( array_key_exists( $name, $features ) ) {

			$feature = $features[ $name ];
			if ( count( $arguments ) == 0 ) {
				return $feature;
			} else if ( count( $arguments ) == 1 ) {
				if ( isset( $feature[ $arguments[0] ] ) ) {
					return $feature[ $arguments[0] ];
				}
			} else if ( count( $arguments ) == 2 ) {
				if ( isset( $feature[ $arguments[0] ] ) ) {
					if ( isset( $feature[ $arguments[0] ][ $arguments[1] ] ) ) {
						return $feature[ $arguments[0][ $arguments[1] ] ];
					}
				}
			}
		}

		return false;
	}

	/**
	 * Magic method that returns the requested feature array.
	 * Example:
	 * new Features->free
	 *
	 * @param $name string The feature id.
	 *
	 * @return array[]|bool Returns the matching feature array.
	 */
	public function __get( $name ) {
		$features_data = new FeaturesData();
		$features      = $features_data->get();

		if ( array_key_exists( $name, $features ) ) {
			return $features[ $name ];
		}

		return false;
	}

	/**
	 * Load a feature class.
	 *
	 * @param $plan string The plan name.
	 * @param $slug string The feature slug.
	 * @param $carbon boolean Whether to use carbon_get_theme_option or get_option.
	 *
	 * @return bool Returns false if feature wasn't loaded.
	 */
	public function load_feature( $plan, $slug, $carbon = false ) {

		/**
		 * Filters the feature before loading it.
		 *
		 * @since 1.0.1
		 *
		 * @param string $feature The feature entry from 'FeaturesData'.
		 */
		$feature = apply_filters( 'codepile_load_feature', $this->$plan( $slug ) );

		// If feature shouldn't load then return false instead.
		if ( $feature['load'] === false ) {
			return false;
		}

		if ( $carbon ) {
			$option = carbon_get_theme_option( 'codepile-' . $feature['slug'] );
		} else {
			// Note: not all Carbon Fields options will work like this
			$option = get_option( '_codepile-' . $feature['slug'] );
		}

		if ( $option == 'yes' ) {
			$class = '\CodePile\Features\\' . ucfirst( $plan ) . '\\' . $feature['class'];
			new $class( $feature );
		}

		return true;
	}

	/**
	 * Get a container for a new feature. Includes adding a new menu item and page title. Optionally append to an existing container.
	 *
	 * @param $plan string The plan name.
	 * @param $slug string The feature slug.
	 * @param $append string Feature slug to use for appending fields to (optional).
	 *
	 * @return mixed Returns a new CarbonFields container.
	 */
	public function get_container( $plan, $slug, $append = null ) {
		if ( $append != null ) {
			$feature = $this->$plan( $append );

			if ( isset( $this->containers[ $feature['slug'] ] ) ) {
				return $this->containers[ $feature['slug'] ];
			}
		} else {
			$feature = $this->$plan( $slug );
		}

		// Make container
		$container = Container::make( 'theme_options', 'codepile-' . $feature['slug'], __( $feature['menu'], 'codepile' ) )
		                      ->set_page_parent( $feature['parent'] )
		                      ->set_page_file( 'codepile-' . $feature['slug'] )
		                      ->set_page_menu_title( $feature['menu'] )
		                      ->add_fields( array(

			                      Field::make( 'html', 'codepile-' . $feature['slug'] . '-title', $feature['title'] )
			                           ->set_html( '<h1>' . $feature['title'] . '</h1>' )

		                      ) );

		$this->containers[ $feature['slug'] ] = $container;

		return $container;
	}
}