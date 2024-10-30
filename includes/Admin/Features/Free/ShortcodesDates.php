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

class ShortcodesDates {
	public function __construct( $feature ) {

		global $codepile_features;
		$container = $codepile_features->get_container( $feature['plan'], $feature['slug'], $feature['append'] );

		$container->add_fields( array(

			// Current Date
			Field::make( 'checkbox', 'codepile-current-date', __( 'Current Date', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_help_text( __( 'Adds a shortcode to display the current date. Parameter help: <a href="https://www.php.net/manual/en/function.date.php" target="_blank">format</a>. Usage: [codepile-date format="Y-m-d"]', 'coodepile' ) ),

			// Current Year
			Field::make( 'checkbox', 'codepile-current-year', __( 'Current Year', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_help_text( __( 'Adds a shortcode to display the current year. Usage: [codepile-year]', 'coodepile' ) ),

			// Future Date
			Field::make( 'checkbox', 'codepile-future-date', __( 'Future or Paste Date', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_help_text( __( 'Adds a shortcode to display a future or past time. Parameter help: <a href="https://www.php.net/manual/en/function.strtotime.php" target="_blank">time</a>, <a href="https://www.php.net/manual/en/function.date.php" target="_blank">format</a>. Usage: [codepile-future time="+2 weeks" format="Y-m-d H:i:s"]', 'coodepile' ) )

		) );
	}
}