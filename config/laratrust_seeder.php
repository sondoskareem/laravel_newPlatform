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
            'banners' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'news' =>'c,r,u,d',
            'users' => 'c,r,u,d',
            'bills' =>'r,u,d',
            'sections' =>'c,r,u,d',
            'categories' =>'c,r,u,d',
            'complaints' =>'r,d',
            'points' =>'r,u',
            'license' =>'c,r,u,d',
            'shops' =>'c,r,u,d',
            'users' =>'c,r,u,d',
            'socials' =>'c,r,u,d',
            'numbers' =>'c,r,u,d',
            'news' =>'c,r,u,d',
            'sms' =>'s',

        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        's' => 'send',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ]
];
