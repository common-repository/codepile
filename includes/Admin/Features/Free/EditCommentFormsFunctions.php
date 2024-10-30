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

class EditCommentFormsFunctions {

	/**
	 * Container save hook
	 *
	 * @param $user_data
	 * @param $container
	 */
	public static function carbon_fields_theme_options_container_saved( $user_data, $container ) {
		if ( $container->id == 'carbon_fields_container_codepile-comments' && carbon_get_theme_option( 'codepile-edit-comment-forms' ) == 'yes' ) {
			if ( carbon_get_theme_option( 'codepile-comments-author' ) != 'yes' || carbon_get_theme_option( 'codepile-comments-email' ) != 'yes' ) {
				if ( get_option( 'require_name_email' ) ) {
					update_option( 'require_name_email', 0 );
				}
			}
		}
	}
}