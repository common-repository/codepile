<?php

/*
 * @package       codepile
 * @copyright     (C) Copyright 2022 Ryan Rhode, All rights reserved.
 * @author        Ryan Rhode, ryan@codepile.ca
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
 * @wordpress-plugin
 * Plugin Name:       CodePile
 * Plugin URI:        https://codepile.ca/
 * Description:       A WordPress plugin providing a modular assortment of simple and useful features.
 * Version:           1.0.6
 * Requires at least: 5.9.2
 * Requires PHP:      7.4
 * Author:            Ryan Rhode
 * Author URI:        https://codepile.ca/
 * Text Domain:       codepile
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 *
 *
 */
namespace CodePile;

defined( 'ABSPATH' ) or exit;

if ( function_exists( 'codepile_fs' ) ) {
    codepile_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'codepile_fs' ) ) {
        function codepile_fs()
        {
            global  $codepile_fs ;
            
            if ( !isset( $codepile_fs ) ) {
                require_once dirname( __FILE__ ) . '/vendor/freemius/wordpress-sdk/start.php';
                $codepile_fs = fs_dynamic_init( array(
                    'id'             => '6229',
                    'slug'           => 'codepile',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_fccec08c6751b5d87dd68d3fdfc62',
                    'is_premium'     => false,
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug' => 'codepile',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $codepile_fs;
        }
        
        codepile_fs();
        do_action( 'codepile_fs_loaded' );
    }
    
    define( 'CODEPILE_BASE_FILE', __FILE__ );
    define( 'CODEPILE_BASE_PATH', plugin_dir_path( __FILE__ ) );
    define( 'CODEPILE_BASE_URL', plugin_dir_url( __FILE__ ) );
    define( 'CODEPILE_VENDOR_PATH', CODEPILE_BASE_PATH . 'vendor/' );
    define( 'CODEPILE_VENDOR_URL', CODEPILE_BASE_URL . 'vendor/' );
    require_once ABSPATH . 'wp-includes/pluggable.php';
    require_once CODEPILE_BASE_PATH . 'vendor/autoload.php';
    
    if ( is_admin() ) {
        new Admin\Bootstrap();
    } else {
        new Bootstrap();
    }

}
