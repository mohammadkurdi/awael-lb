<?php

namespace App\Main;

use Illuminate\Support\Facades\Auth;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {

        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard.index',
                'title' => 'Dashboard',
                'params' => [
                    'layout' => 'side-menu',
                ],
            ],

            'categories' => [
                'icon' => 'hard-drive',
                'route_name' => 'category.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Categories'
            ],
            'sub_categories' => [
                'icon' => 'credit-card',
                'route_name' => 'subcategory.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Sub categories'
            ],
            'devider',

            'products' => [
                'icon' => 'trello',
                'route_name' => 'item.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Products'
            ],
            'devider',

            'users' => [
                'icon' => 'users',
                'title' => 'Users',
                'route_name' => 'user.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],

            'roles' => [
                'icon' => 'star',
                'title' => 'Roles & permissions',
                'route_name' => 'laratrust',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],
            'devider',


        ];
    }
}
