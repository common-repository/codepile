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

namespace CodePile\Features\Free;

/**
 * A separate function class to prevent issues. Alternatively refactor to not use constructor in main class.
 *
 * @package CodePile\Features\Free
 */
class CptCommentsFunctions {

	public static function enable_comments( $args, $post_type ) {
		global $codepile_cpt;
		$codepile_cpt[ $post_type ] = $args;

		add_action( 'registered_post_type', array( __CLASS__, 'registered_post_type' ), 10, 2 );

		return $args;
	}

	public static function registered_post_type( $post_type, $post_object ) {
		$post_types = carbon_get_theme_option( 'codepile-cpt-comments-post-types' );
		if ( ! empty( $post_types ) && in_array( $post_type, $post_types ) ) {
			global $codepile_cpt;
			add_post_type_support( $post_type, 'comments', $codepile_cpt[ $post_type ] );
		}
	}
}