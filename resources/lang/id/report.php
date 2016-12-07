<?php 

return [
    'admin' => [
        'title' => '',
        'page_title' => '',
        'page_title_desc' => '',
        'header' => [
            'user' => '',
            'role' => '',
            'store' => '',
            'unit' => '',
            'phone_provider' => '',
            'settings' => '',
            'purchase_order' => '',
            'sales_order' => '',
        ],
        'field' => [
            'user' => '',
            'email' => '',
            'role' => '',
            'profile' => '',
            'name' => '',
            'permission' => '',
            'tax_id' => '',
            'symbol' => '',
            'short_name' => '',
        ],
    ],
    'master' => [
        'title' => '',
        'page_title' => '',
        'page_title_desc' => '',
        'header' => [
            'customer' => '',
            'supplier' => '',
            'product' => '',
            'product_type' => '',
            'bank' => '',
            'warehouse' => '',
            'truck' => '',
            'truck_maintenance' => '',
            'vendor_trucking' => '',
        ],
        'field' => [
            'name' => '',
            'profile_name' => '',
            'bank_account' => '',
            'short_code' => '',
            'short_name' => '',
            'branch' => '',
            'branch_code' => '',
            'plate_number' => '',
        ],
    ],
    'monitoring' => [
        'title' => '',
        'page_title' => '',
        'page_title_desc' => '',
    ],
    'tax' => [
        'title' => '',
        'page_title' => '',
        'page_title_desc' => '',
    ],
    'transaction' => [
        'title' => '',
        'page_title' => '',
        'page_title_desc' => '',
        'header' => [
            'purchase_order' => '',
            'sales_order' => '',
        ],
        'field' => [
            'po_code' => '',
            'po_date' => '',
            'shipping_date' => '',
            'receipt_date' => '',
            'supplier' => '',
            'so_code' => '',
            'so_date' => '',
            'deliver_date' => '',
            'customer' => '',
        ],
    ],
    'template' => [
        'warehouse' => [
            'report_name' => 'Laporan Gudang',
            'parameter' => [
                'name' => 'Nama'
            ],
            'footer' => 'Dicetak oleh :user pada :date'
        ]
    ]
];