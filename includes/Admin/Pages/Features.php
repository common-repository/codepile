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
namespace CodePile\Admin\Pages;

use  Carbon_Fields\Container ;
use  Carbon_Fields\Field ;
use function  CodePile\codepile_fs ;
class Features
{
    public function __construct()
    {
        add_action( 'carbon_fields_register_fields', array( __CLASS__, 'codepile_features' ) );
    }
    
    /**
     * Register fields for features.
     */
    public static function codepile_features()
    {
        global  $codepile_features ;
        // Features container
        $features_container = self::get_container( 'free' );
        self::add_checkboxes( $features_container, $codepile_features->free );
        // Clear out memory
        unset( $features_container );
    }
    
    public static function get_container( $plan )
    {
        $title = __( ucfirst( $plan ) . ' Features', 'codepile' );
        return Container::make( 'theme_options', 'codepile-' . $plan . '-features', $title )->set_page_parent( 'codepile' )->add_fields( array( Field::make( 'separator', 'codepile-' . $plan . '-separator', $title ) ) );
    }
    
    public static function add_checkboxes( $container, $features )
    {
        foreach ( $features as $k => $v ) {
            // Check if class is set otherwise don't add a field for this feature.
            if ( $v['class'] == null ) {
                continue;
            }
            $container->add_fields( array( Field::make( 'checkbox', 'codepile-' . $k, $v['title'] )->set_default_value( 'no' )->set_help_text( $v['desc'] ) ) );
        }
    }

}