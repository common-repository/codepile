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

class JqueryuiThemes {
	public function __construct( $feature ) {
		if ( get_option( '_codepile-' . $feature['slug'] ) == 'yes' ) {
			global $wp_scripts;
			$theme = get_option( '_codepile-jqueryui-theme', 'base' );
			$ui    = $wp_scripts->query( 'jquery-ui-core' );
			wp_enqueue_style( 'codepile-jqueryui-' . $theme, esc_url( 'https://code.jquery.com/ui/' . $ui->ver . '/themes/' . $theme . '/jquery-ui.min.css' ) );
		}
	}
}