<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'subcategories' => 'c,r,u,d',
            'items' => 'c,r,u,d',
            'roles' => 'c,r,u,d'
        ],
        'dataEntry' => [
            'users' => 'r',
            'categories' => 'c,r,u,d',
            'subcategories' => 'c,r,u,d',
            'items' => 'c,r,u,d',
        ],
        'readOnly' => [
            'categories' => 'r',
            'subcategories' => 'r',
            'items' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
