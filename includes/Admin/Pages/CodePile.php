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

use CodePile\Admin\Enqueues;

class CodePile {

	/**
	 * CodePile constructor.
	 */
	public function __construct() {
		new Enqueues();
	}

	public static function init() {
		?>
        <img src="<?php echo CODEPILE_BASE_URL . 'admin/assets/images/codepile-100x100.png'; ?>" class="codepile-logo" alt="CodePile logo"/><h1><?php _e( 'CodePile', 'coodepile' ); ?></h1>
        <h3><?php _e( 'A WordPress plugin providing a modular assortment of simple and useful features.', 'coodepile' ); ?></h3>

        <section class="codepile-admin-section">
            <h4><?php _e( 'Thank you for choosing CodePile!', 'coodepile' ); ?></h4>
            <p><?php _e( 'You will find various submenus on the WP admin menu under CodePile to allow you to enable and configure all the CodePile features.', 'coodepile' ); ?></p>
        </section>

        <section class="codepile-admin-section">
            <h4><?php _e( 'Credits', 'coodepile' ); ?></h4>
            <p><?php _e( 'CodePile wouldn\'t be possible without the projects listed below and all of the people who spend their time and energy working on them. Thank you to everyone who made this possible! If I\'ve missed anyone please know that you are useful and also very much appreciated!', 'coodepile' ); ?></p>
            <ul>
                <li><a href="https://carbonfields.net/" target="_blank">Carbon Fields</a></li>
                <li><a href="https://fontawesome.com/" target="_blank">Font Awesome</a></li>
                <li><a href="https://forkaweso.me/" target="_blank">Fork Awesome</a></li>
                <li><a href="https://freemius.com/" target="_blank">Freemius</a></li>
                <li><a href="https://friconix.com/" target="_blank">Friconix</a></li>
                <li><a href="https://jquery.com/" target="_blank">jQuery</a></li>
                <li><a href="https://jqueryui.com/" target="_blank">jQuery UI</a></li>
                <li><a href="https://wordpress.org/" target="_blank">WordPress</a></li>
                <li><a href="https://github.com/wp-cli/wp-config-transformer" target="_blank">WP Config Transformer</a></li>
            </ul>
        </section>
        <section class="codepile-admin-section">
            <h4><?php _e( 'License', 'coodepile' ); ?></h4>
            <p><?php
				$click_here = '<a href="' . CODEPILE_BASE_URL . 'license.txt" target="_blank">' . __( 'click here', 'codepile' ) . '</a>';
				echo wp_sprintf(
					__( 'CodePile is licensed under the GPLv2 or later.<br />
                        Copyright (C) 2021 Ryan Rhode.<br />
                        CodePile comes with ABSOLUTELY NO WARRANTY; for details %s.<br />
                        This is free software, and you are welcome to redistribute it under certain conditions; %s for details.', 'codepile' ),
					$click_here,
					$click_here
				);
				?>
        </section>
		<?php
	}
}