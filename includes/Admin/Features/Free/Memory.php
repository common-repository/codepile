<?php
/*
 * @package       codepile
 * @copyright     (C) Copyright 2022 Ryan Rhode, All rights reserved.
 * @author        Ryan Rhode, ryan@codepile.ca
 * @version       2022.03.18 17:14:50 EDT
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

namespace CodePile\Admin\Features\Free;

use Carbon_Fields\Field;

/**
 * Class Memory
 * @package CodePile\Admin\Features
 * @link https://developer.wordpress.org/reference/functions/wp_raise_memory_limit/
 */
class Memory {

	public function __construct( $feature ) {

		// Load functions
		add_action( 'carbon_fields_theme_options_container_saved', array( '\CodePile\Admin\Features\Free\MemoryFunctions', 'carbon_fields_theme_options_container_saved' ), 10, 2 );

		global $codepile_features;
		$container = $codepile_features->get_container( $feature['plan'], $feature['slug'], $feature['append'] );

		$container->add_fields( array(

			// Admin Memory Limit
			Field::make( 'text', 'codepile-admin-memory-limit', __( 'Admin Memory Limit', 'coodepile' ) )
			     ->set_default_value( WP_MAX_MEMORY_LIMIT )
			     ->set_help_text( __( 'Adjust the memory limit only in the admin. Uses the admin_memory_limit filter.', 'coodepile' ) ),

			// Image Memory Limit
			Field::make( 'text', 'codepile-image-memory-limit', __( 'Image Memory Limit', 'coodepile' ) )
			     ->set_default_value( WP_MEMORY_LIMIT )
			     ->set_help_text( __( 'Adjust the memory limit for image manipulation. Uses the image_memory_limit filter.', 'coodepile' ) ),

			// WP_MEMORY_LIMIT
			Field::make( 'text', 'codepile-wp-memory-limit', __( 'WP_MEMORY_LIMIT', 'coodepile' ) )
			     ->set_default_value( WP_MEMORY_LIMIT )
			     ->set_help_text( __( 'Adjust the WP_MEMORY_LIMIT setting in the wp-config.php file.', 'coodepile' ) ),

			// WP_MAX_MEMORY_LIMIT
			Field::make( 'text', 'codepile-wp-max-memory-limit', __( 'WP_MAX_MEMORY_LIMIT', 'coodepile' ) )
			     ->set_default_value( WP_MAX_MEMORY_LIMIT )
			     ->set_help_text( __( 'Adjust the WP_MAX_MEMORY_LIMIT setting in the wp-config.php file.', 'coodepile' ) ),

		) );
	}
}