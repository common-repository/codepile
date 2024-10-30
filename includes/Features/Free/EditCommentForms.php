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

class EditCommentForms {
	public function __construct( $feature ) {
		add_filter( 'comment_form_default_fields', array( __CLASS__, 'comment_form_default_fields' ) );
	}

	public static function comment_form_default_fields( $fields ) {
		if ( get_option( '_codepile-comments-author' ) === '' ) {
			unset( $fields['author'] );
		}
		if ( get_option( '_codepile-comments-email' ) === '' ) {
			unset( $fields['email'] );
		}
		if ( get_option( '_codepile-comments-url' ) === '' ) {
			unset( $fields['url'] );
		}
		if ( get_option( '_codepile-comments-cookies' ) === '' ) {
			unset( $fields['cookies'] );
		}

		return $fields;
	}
}