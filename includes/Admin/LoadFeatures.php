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
namespace CodePile\Admin;

use  CodePile\Admin\Pages\Features ;
use function  CodePile\codepile_fs ;
class LoadFeatures
{
    public function __construct()
    {
        new Features();
        // Register fields
        add_action( 'carbon_fields_register_fields', array( __CLASS__, 'carbon_fields_register_fields' ) );
        // Hook codepile_admin_load
        do_action( 'codepile_admin_load' );
    }
    
    public static function carbon_fields_register_fields()
    {
        global  $codepile_features ;
        $all = $codepile_features->all();
        foreach ( $all as $plan => $features ) {
            foreach ( $features as $feature ) {
                if ( $feature['class'] == null ) {
                    continue;
                }
                
                if ( carbon_get_theme_option( 'codepile-' . $feature['slug'] ) == 'yes' ) {
                    $class = '\\CodePile\\Admin\\Features\\' . ucfirst( $plan ) . '\\' . $feature['class'];
                    new $class( $feature );
                }
            
            }
        }
        $codepile_features->load_feature( 'free', 'cpt-comments', false );
        $codepile_features->load_feature( 'free', 'coming-soon', false );
    }

}