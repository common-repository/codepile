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

class EditCommentForms {
	public function __construct( $feature ) {

		// Load functions
		add_action( 'carbon_fields_theme_options_container_saved', array( '\CodePile\Admin\Features\Free\EditCommentFormsFunctions', 'carbon_fields_theme_options_container_saved' ), 10, 2 );

		global $codepile_features;
		$container = $codepile_features->get_container( $feature['plan'], $feature['slug'], $feature['append'] );

		$container->add_fields( array(

			// Author Field
			Field::make( 'checkbox', 'codepile-comments-author', __( 'Author Field', 'coodepile' ) )
			     ->set_default_value( 'yes' )
			     ->set_help_text( __( 'If checked the Author field will be shown on comment forms. If unchecked Anonymous will be used for the author.<br />
                                       Unchecking this field will also uncheck the field "Comment author must fill out name and email" under <a href="https://codepile.ca/wp-admin/options-discussion.php">Settings > Discussion</a>. However, it will not enable that option if this field is checked.', 'coodepile' ) ),

			// Email Field
			Field::make( 'checkbox', 'codepile-comments-email', __( 'Email Field', 'coodepile' ) )
			     ->set_default_value( 'yes' )
			     ->set_help_text( __( 'If checked the Email field will be shown on comment forms.<br />
                                       Unchecking this field will also uncheck the field "Comment author must fill out name and email" under <a href="https://codepile.ca/wp-admin/options-discussion.php">Settings > Discussion</a>. However, it will not enable that option if this field is checked.', 'coodepile' ) ),

			// URL Field
			Field::make( 'checkbox', 'codepile-comments-url', __( 'URL Field', 'coodepile' ) )
			     ->set_default_value( 'yes' )
			     ->set_help_text( __( 'If checked the URL field will be shown on comment forms.', 'coodepile' ) ),

			// Cookies Field
			Field::make( 'checkbox', 'codepile-comments-cookies', __( 'Cookies Field', 'coodepile' ) )
			     ->set_default_value( 'yes' )
			     ->set_help_text( __( 'If checked the checkbox asking if they want to save their name, email and website for the next time they comment will be shown on comment forms.', 'coodepile' ) ),

		) );
	}
}