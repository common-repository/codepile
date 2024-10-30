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

class Icons {
	public function __construct( $feature ) {

		global $codepile_features;
		$container = $codepile_features->get_container( $feature['plan'], $feature['slug'], $feature['append'] );

		$container->add_fields( array(

			// FontAwesome
			Field::make( 'separator', 'fontawesome-separator', __( 'FontAwesome' ) ),

			// FontAwesome
			Field::make( 'checkbox', 'codepile-fontawesome', __( 'FontAwesome', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_option_value( 'yes' )
			     ->set_help_text( __( 'Enable FontAwesome.com icons. Enqueued with handle: codepile-fontawesome', 'coodepile' ) ),

			// FontAwesome Kit Name
			Field::make( 'text', 'codepile-fontawesome-kit', __( 'FontAwesome Kit', 'coodepile' ) )
			     ->set_default_value( '' )
			     ->set_attribute( 'placeholder', '0123456789' )
			     ->set_conditional_logic( array(
				     //'relation' => 'AND',
				     array(
					     'field'   => 'codepile-fontawesome',
					     'value'   => true,
					     'compare' => '=',
				     )
			     ) )
			     ->set_help_text( __( 'Enter the default kit name. You can find this in your <a href="https://fontawesome.com/" target="_blank">fontawesome.com</a> account. If you\'ve changed the name this is the javascript filename without extension. Enter only the red part of the kit code as shown below.', 'coodepile' ) . '<br />' . esc_html( '<script src="https://kit.fontawesome.com/' ) . '<span style="color:red;">0123456789</span>' . esc_html( '.js" crossorigin="anonymous"></script>' ) ),

			// Fork Awesome
			Field::make( 'separator', 'forkawesome-separator', __( 'Fork Awesome' ) ),

			// Fork Awesome
			Field::make( 'checkbox', 'codepile-forkawesome', __( 'Fork Awesome', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_option_value( 'yes' )
			     ->set_help_text( __( 'Enable <a href="https://forkaweso.me/" target="_blank">forkaweso.me</a> icons. Enqueued with handle: codepile-forkawesome', 'coodepile' ) ),

			// Fork Awesome Version
			Field::make( 'text', 'codepile-forkawesome-version', __( 'Fork Awesome Version', 'coodepile' ) )
			     ->set_default_value( '1.2.0' )
			     ->set_conditional_logic( array(
				     //'relation' => 'AND',
				     array(
					     'field'   => 'codepile-forkawesome',
					     'value'   => true,
					     'compare' => '=',
				     )
			     ) )
			     ->set_help_text( __( 'Enter the Fork Awesome version number.' ) ),

			// Fork Awesome Integrity Hash
			Field::make( 'text', 'codepile-forkawesome-hash', __( 'Fork Awesome Integrity Hash', 'coodepile' ) )
			     ->set_default_value( 'sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=' )
			     ->set_conditional_logic( array(
				     //'relation' => 'AND',
				     array(
					     'field'   => 'codepile-forkawesome',
					     'value'   => true,
					     'compare' => '=',
				     )
			     ) )
			     ->set_help_text( __( 'Enter the Fork Awesome integrity hash.' ) ),

			// Friconix
			Field::make( 'separator', 'friconix-separator', __( 'Friconix' ) ),

			// Fork Awesome
			Field::make( 'checkbox', 'codepile-friconix', __( 'Friconix', 'coodepile' ) )
			     ->set_default_value( 'no' )
			     ->set_option_value( 'yes' )
			     ->set_help_text( __( 'Enable <a href="https://friconix.com/" target="_blank">Friconix.com</a> icons. Enqueued with handle: codepile-friconix', 'coodepile' ) ),

			// Friconix Version
			Field::make( 'text', 'codepile-friconix-version', __( 'Friconix Version', 'coodepile' ) )
			     ->set_default_value( '' )
			     ->set_attribute( 'placeholder', 'LATEST' )
			     ->set_conditional_logic( array(
				     //'relation' => 'AND',
				     array(
					     'field'   => 'codepile-friconix',
					     'value'   => true,
					     'compare' => '=',
				     )
			     ) )
			     ->set_help_text( __( 'Enter the Friconix version number (i.e. 0.1600). Leave blank to use the latest version. You can find the latest version number here: ', 'codepile' ) . '<a href="https://friconix.com/cdn/version.txt" target="_blank">https://friconix.com/cdn/version.txt</a>' ),

		) );
	}
}