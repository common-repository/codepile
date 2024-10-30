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

use Carbon_Fields\Carbon_Fields;
use function CodePile\codepile_fs;

class Actions {

	/**
	 * Actions constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( __CLASS__, 'crb_load' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );

		//codepile_fs()->add_action( 'after_uninstall', 'codepile_fs_uninstall_cleanup' );
	}

	public static function admin_menu() {
		add_menu_page( 'CodePile', 'CodePile', 'manage_options', 'codepile', array( '\CodePile\Admin\Pages\CodePile', 'init' ), CODEPILE_BASE_URL . 'admin/assets/images/codepile-20x20.png', 100 );
	}

	/**
	 * Load Carbon Fields
	 */
	public static function crb_load() {
		Carbon_Fields::boot();
	}
}