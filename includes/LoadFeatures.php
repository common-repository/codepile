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
namespace CodePile;

/**
 * Frontend Load Features
 *
 * Class LoadFeatures
 * @package CodePile
 */
class LoadFeatures
{
    /**
     * LoadFeatures constructor.
     */
    public function __construct()
    {
        add_action( 'carbon_fields_register_fields', array( __CLASS__, 'carbon_fields_register_fields' ) );
        // Load features requiring earlier initialization
        add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
        add_action( 'init', array( __CLASS__, 'init' ) );
        // Hook codepile_front_load
        do_action( 'codepile_front_load' );
    }
    
    /**
     * Wait until fields are loaded.
     */
    public static function carbon_fields_register_fields()
    {
        /** @var Features $codepile_features */
        global  $codepile_features ;
        $codepile_features->load_feature( 'free', 'memory', true );
        $codepile_features->load_feature( 'free', 'cpt-comments', false );
        $codepile_features->load_feature( 'free', 'edit-comment-forms', false );
        $codepile_features->load_feature( 'free', 'coming-soon', false );
    }
    
    public static function after_setup_theme()
    {
        /** @var Features $codepile_features */
        global  $codepile_features ;
        $codepile_features->load_feature( 'free', 'admin-bar', false );
    }
    
    public static function init()
    {
        /** @var Features $codepile_features */
        global  $codepile_features ;
        $codepile_features->load_feature( 'free', 'shortcodes-dates', false );
        $codepile_features->load_feature( 'free', 'icons', false );
        $codepile_features->load_feature( 'free', 'jqueryui-themes', false );
    }

}