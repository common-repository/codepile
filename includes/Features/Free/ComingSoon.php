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

class ComingSoon {
	public function __construct( $feature ) {
		// If the coming soon option is enabled and user isn't an admin add the coming_soon template_include filter.
		if ( get_option( '_codepile-coming-soon-enable' ) == 'yes' && ! current_user_can( 'administrator' ) ) {
			add_filter( 'template_include', array( __CLASS__, 'coming_soon' ), 99 );
		}
	}

	/**
	 * Include the coming-soon.php template from the theme or from CodePile's templates folder.
	 *
	 * @param $template
	 *
	 * @return string
	 */
	public static function coming_soon( $template ) {
		// from theme
		$coming_soon_template = locate_template( array( 'coming-soon.php' ) );
		if ( '' != $coming_soon_template ) {
			return $coming_soon_template;
		}

		// from codepile
		if ( file_exists( CODEPILE_BASE_PATH . 'templates/coming-soon.php' ) ) {
			return CODEPILE_BASE_PATH . 'templates/coming-soon.php';
		} else {
			return $template;
		}
	}
}