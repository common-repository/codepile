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

class FeaturesData
{
    /**
     * Features array. Can be filtered with codepile_features
     *
     * @return \array[][]
     */
    function get()
    {
        $features = [
            'free' => [
            'admin-bar'          => [
            'plan'   => 'free',
            'slug'   => 'admin-bar',
            'parent' => 'codepile',
            'append' => null,
            'class'  => 'AdminBar',
            'menu'   => __( 'Admin Bar', 'codepile' ),
            'title'  => __( 'Remove admin bar', 'codepile' ),
            'desc'   => __( 'Remove the top admin bar.', 'codepile' ),
            'load'   => true,
        ],
            'coming-soon'        => [
            'plan'   => 'free',
            'slug'   => 'coming-soon',
            'parent' => 'codepile',
            'append' => null,
            'class'  => 'ComingSoon',
            'menu'   => __( 'Coming Soon', 'codepile' ),
            'title'  => __( 'Coming Soon', 'codepile' ),
            'desc'   => __( 'Disallow access to the site with a message.', 'codepile' ),
            'load'   => true,
        ],
            'comments'           => [
            'plan'   => 'free',
            'slug'   => 'comments',
            'parent' => 'codepile',
            'append' => null,
            'class'  => null,
            'menu'   => __( 'Comments', 'codepile' ),
            'title'  => __( 'Comment related features', 'codepile' ),
            'desc'   => __( 'Features related to comments.', 'codepile' ),
            'load'   => true,
        ],
            'cpt-comments'       => [
            'plan'   => 'free',
            'slug'   => 'cpt-comments',
            'parent' => 'codepile',
            'append' => 'comments',
            'class'  => 'CptComments',
            'menu'   => __( 'Comments On Custom Post Types', 'codepile' ),
            'title'  => __( 'Comments - Enable comments on custom post types', 'codepile' ),
            'desc'   => __( 'Allows toggling comments for selected custom post types.', 'codepile' ),
            'load'   => true,
        ],
            'edit-comment-forms' => [
            'plan'   => 'free',
            'slug'   => 'edit-comment-forms',
            'parent' => 'codepile',
            'append' => 'comments',
            'class'  => 'EditCommentForms',
            'menu'   => __( 'Edit Comment Forms', 'codepile' ),
            'title'  => __( 'Comments - Edit comment forms', 'codepile' ),
            'desc'   => __( 'Allows toggling fields on comment forms.', 'codepile' ),
            'load'   => true,
        ],
            'shortcodes-dates'   => [
            'plan'   => 'free',
            'slug'   => 'shortcodes-dates',
            'parent' => 'codepile',
            'append' => null,
            'class'  => 'ShortcodesDates',
            'menu'   => __( 'Date Shortcodes', 'codepile' ),
            'title'  => __( 'Date Shortcodes', 'codepile' ),
            'desc'   => __( 'Shortcodes for Current Date, Current Year, Future Date.', 'codepile' ),
            'load'   => true,
        ],
            'icons'              => [
            'plan'   => 'free',
            'slug'   => 'icons',
            'parent' => 'codepile',
            'append' => null,
            'class'  => 'Icons',
            'menu'   => __( 'Icons', 'codepile' ),
            'title'  => __( 'Icons', 'codepile' ),
            'desc'   => __( 'FontAwesome, Fork Awesome, Friconix.', 'codepile' ),
            'load'   => true,
        ],
            'jqueryui-themes'    => [
            'plan'   => 'free',
            'slug'   => 'jqueryui-themes',
            'parent' => 'codepile',
            'append' => null,
            'class'  => 'JqueryuiThemes',
            'menu'   => __( 'jQuery UI Themes', 'codepile' ),
            'title'  => __( 'jQuery UI Themes', 'codepile' ),
            'desc'   => __( 'Load jQuery UI Themes styles in frontend or backend.', 'codepile' ),
            'load'   => true,
        ],
            'memory'             => [
            'plan'   => 'free',
            'slug'   => 'memory',
            'parent' => 'codepile',
            'append' => null,
            'class'  => 'Memory',
            'menu'   => __( 'Memory Limits', 'codepile' ),
            'title'  => __( 'Adjust memory limit', 'codepile' ),
            'desc'   => __( 'Options for Admin Memory Limit, Image Memory Limit, WP_MEMORY_LIMIT, WP_MAX_MEMORY_LIMIT.', 'codepile' ),
            'load'   => true,
        ],
        ],
        ];
        return apply_filters( 'codepile_features', $features );
    }

}