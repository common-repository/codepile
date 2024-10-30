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

class JqueryuiThemes {

	public function __construct( $feature ) {

		global $codepile_features;
		$container = $codepile_features->get_container( $feature['plan'], $feature['slug'], $feature['append'] );

		$container->add_fields( array(

			// Theme
			Field::make( 'select', 'codepile-jqueryui-theme', __( 'Theme', 'coodepile' ) )
			     ->set_default_value( 'base' )
			     ->set_options( array(
				     'base'           => 'base',
				     'black-tie'      => 'black-tie',
				     'blitzer'        => 'blitzer',
				     'cupertino'      => 'cupertino',
				     'dark-hive'      => 'dark-hive',
				     'dot-luv'        => 'dot-luv',
				     'eggplant'       => 'eggplant',
				     'excite-bike'    => 'excite-bike',
				     'flick'          => 'flick',
				     'hot-sneaks'     => 'hot-sneaks',
				     'humanity'       => 'humanity',
				     'le-frog'        => 'le-frog',
				     'mint-choc'      => 'mint-choc',
				     'overcast'       => 'overcast',
				     'pepper-grinder' => 'pepper-grinder',
				     'redmond'        => 'redmond',
				     'smoothness'     => 'smoothness',
				     'south-street'   => 'south-street',
				     'start'          => 'start',
				     'sunny'          => 'sunny',
				     'swanky-purse'   => 'swanky-purse',
				     'trontastic'     => 'trontastic',
				     'ui-darkness'    => 'ui-darkness',
				     'ui-lightness'   => 'ui-lightness',
				     'vader'          => 'vader',
			     ) )
			     ->set_help_text( __( 'Select a jQuery UI theme to load.' ) ),

		) );
	}
}