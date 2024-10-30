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

class Enqueues {

	/**
	 * Enqueues constructor.
	 */
	public function __construct() {
		add_action( 'load-toplevel_page_codepile', array( __CLASS__, 'codepile_admin_css' ) );
		add_action( 'admin_init', array( __CLASS__, 'codepile_admin_css' ) );
	}

	public static function codepile_admin_css() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'styles' ) );
	}

	public static function styles() {
		wp_enqueue_style( 'codepile-admin-css', CODEPILE_BASE_URL . 'admin/assets/css/codepile.css', null, filemtime( CODEPILE_BASE_PATH . 'admin/assets/css/codepile.css' ) );
	}

}