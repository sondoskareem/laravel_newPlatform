<?php
return [
    'resources' => [


// user options
        'user' => [
            'allowedSorts' => [
                'id',
                'name',
                'email',
                'status',
                'updated_at',
                'type',
                'created_at',
            ],
            'allowedFilters' => [
                'id',
                'name',
                'email',
                'permissions',
                'apple_id',
                'type',
                'google_id',
              ],
            'allowedIncludes' => [
                'address',
                'client',
                'store',
            ],
        ],







// client options
        'client' => [
            'allowedSorts' => [
                'id',
                'name',
                'minutes',
                'following',
                'followers',
                'date',
                'time',
                'points',
                'user_id',
                'is_deleted',
            ],
            'allowedFilters' => [
                'name',
                'id',
                'phone',
                'social_media',
                'date',
                'user_id',
                'is_deleted',
            ],
            'allowedIncludes' => [
                'gallery',
                'course',
                'user'

            ],
        ],



// clienttype options
        // 'clienttype' => [
        //     'allowedSorts' => [
        //         'column',
        //         'column'
        //     ],
        //     'allowedFilters' => [
        //         'column',
        //         'column'
        //     ],
        //     'allowedIncludes' => [
        //         'relation',
        //         'relation'
        //     ],
        // ],



// address options
        'address' => [
            'allowedSorts' => [
                'country',
                'user_id',
                'id',
                'is_deleted',
            ],
            'allowedFilters' => [
                'id',
                'country',
                'address',
                'street',
                'building',
                'floor',
                'latitude',
                'longitude',
                'user_id',
                'is_deleted',
            ],
            'allowedIncludes' => [

            ],
        ],



// gallery options
        'gallery' => [
            'allowedSorts' => [
                'media_type',
                'id',
                'client_id',
                'is_deleted',
            ],
            'allowedFilters' => [
                'id',
                'media_type',
                'client_id',
                'is_deleted',
            ],
            'allowedIncludes' => [

            ],
        ],



// store options
        'store' => [
            'allowedSorts' => [
                'name',
                'id',
                'location',
                'user_id',
                'is_deleted',
            ],
            'allowedFilters' => [
                'name',
                'location',
                'user_id',
                'is_deleted',
            ],
            'allowedIncludes' => [
                'User.Client'
            ],
        ],



// category options
        'category' => [
            'allowedSorts' => [
                'name',
                'parent_id',
                'store_id'
            ],
            'allowedFilters' => [
                'name',
                'parent_id',
                'is_deleted',
                'status',
                'store_id'
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// product options
        'product' => [
            'allowedSorts' => [
                'name',
                'price',
                'store_id',
                'quantity',
                'category_id'
            ],
            'allowedFilters' => [
               'name',
                'discount',
                'is_deleted',
                'price',
                'store_id',
                'quantity',
                'category_id'
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// cart options
        'cart' => [
            'allowedSorts' => [
                'notes',
                'client_id',
                'product_id',
                'quantity',
                'store_id'
            ],
            'allowedFilters' => [
                'notes',
                'client_id',
                'product_id',
                'is_deleted',
                'quantity',
                'store_id'
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// order options
        'order' => [
            'allowedSorts' => [
                'total',
                'payment',
                'cart_id',
                'user_id'
            ],
            'allowedFilters' => [
                'total',
                'payment',
                'cart_id',
                'is_deleted',
                'status',
                'user_id'
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// orderdetail options
        'orderdetail' => [
            'allowedSorts' => [
                'column',
                'column'
            ],
            'allowedFilters' => [

            ],
            'allowedIncludes' => [

            ],
        ],



// coursetopic options
        'coursetopic' => [
            'allowedSorts' => [
                'name',
            ],
            'allowedFilters' => [
                'name',
                'is_deleted',
                'status',
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// coursecategory options
        'coursecategory' => [
            'allowedSorts' => [
                'name',
                'parent_id',
                'course_topic_id'
            ],
            'allowedFilters' => [
                'name',
                'parent_id',
                'is_deleted',
                'status',
                'course_topic_id'
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// course options
        'course' => [
            'allowedSorts' => [
                'name',
                'price',
                'course_category_id'
            ],
            'allowedFilters' => [
                'name',
                'discount',
                'is_deleted',
                'price',
                'course_category_id',
                'id'
            ],
            'allowedIncludes' => [
                'client',
                'coursedetail'
            ],
        ],



// coursedetail options
        'coursedetail' => [
            'allowedSorts' => [
                'title',
                'video',
                'duration',
                'is_deleted',
                'course_id',
            ],
            'allowedFilters' => [
                'title',
                'is_deleted',
                'course_id',
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// courseasset options
        'courseasset' => [
            'allowedSorts' => [
                'title',
                'is_deleted',
                'course_detail_id',
            ],
            'allowedFilters' => [
                'title',
                'is_deleted',
                'course_detail_id',
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// reservationtype options
        'reservationtype' => [
            'allowedSorts' => [
                'name',
            ],
            'allowedFilters' => [
                'name',
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// reservation options
        'reservation' => [
            'allowedSorts' => [
                'title',
                'duration',
                'noc',
                'pricing',
                'is_deleted',
                'status',
                'user_id',
                'reservation_type_id',
            ],
            'allowedFilters' => [
                'title',
                'noc',
                'pricing',
                'is_deleted',
                'status',
                'user_id',
                'reservation_type_id',
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],



// reservationlog options
        'reservationlog' => [
            'allowedSorts' => [
                'time',
                'start',
                'end',
                'duration',
                'is_deleted',
                'status',
                'user_id',
                'reservation_type_id',
            ],
            'allowedFilters' => [
                'time',
                'start',
                'end',
                'duration',
                'is_deleted',
                'status',
                'user_id',
                'reservation_type_id',
            ],
            'allowedIncludes' => [
                'relation',
                'relation'
            ],
        ],




//dont-remove-or-edit-this-line
    ]
];

?>
