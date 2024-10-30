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

class ComingSoon {
	public function __construct( $feature ) {

		global $codepile_features;
		$container = $codepile_features->get_container( $feature['plan'], $feature['slug'], $feature['append'] );

		$container->add_fields( array(

			// Coming Soon
			Field::make( 'checkbox', 'codepile-coming-soon-enable', __( 'Coming Soon', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_option_value( 'yes' )
			     ->set_help_text( __( 'Disallow access to the site with a message.', 'coodepile' ) ),

			// Message
			Field::make( 'rich_text', 'codepile-coming-soon-message', __( 'Message', 'coodepile' ) )
			     ->set_default_value( '' )
			     ->set_attribute( 'placeholder', 'Enter your coming soon message here...' )
			     ->set_conditional_logic( array(
				     array(
					     'field'   => 'codepile-coming-soon-enable',
					     'value'   => true,
					     'compare' => '=',
				     )
			     ) )
			     ->set_help_text( __( 'A message to display instead of the site for non-admin users. You must be logged in as an admin to view the site.', 'codepile' ) ),

		) );
	}
}