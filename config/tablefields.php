<?php

return [
    'categories' => [
        'name',
    ],
    'business_sectors' => [
        'name',
    ],
    'community_sectors' => [
        'name',
    ],
    
    'workplans' => [
        // 'author_id',
        'supervision_id' => [
            'label' => 'Supervisi',
            'type'  => 'options-obj:users,id,name'
        ],
        'executor_id' => [
            'label' => 'Pelaksana',
            'type'  => 'options-obj:users,id,name'
        ],
        'category_id' => [
            'label' => 'Kategori',
            'type'  => 'options-obj:categories,id,name'
        ],
        'title' => [
            'label' => 'Judul',
            'type'  => 'text'
        ],
        'content' => [
            'label' => 'Deskripsi',
            'type'  => 'textarea'
        ],
        'file_path'  => [
            'label' => 'File',
            'type'  => 'file'
        ],
        'budget'  => [
            'label' => 'Anggaran',
            'type'  => 'tel'
        ],
        // 'created_at',
    ],
    
    'workplan_responses' => [
        'wokrplan_id',
        'response_type',
        'user_id',
        'content',
        'created_at',
    ],
    
    'workplan_reports' => [
        'title' => [
            'label' => 'Judul',
            'type'  => 'text'
        ],
        'wokrplan_id' => [
            'label' => 'Program Kerja',
            'type'  => 'options-obj:workplans,id,title'
        ],
        'file_path' => [
            'label' => 'File',
            'type'  => 'file'
        ],
    ],
    
    'workplan_report_responses' => [
        'wokrplan_report_id',
        'response_type',
        'user_id',
        'content',
        'created_at',

    ],
    
    'pollings' => [
        'title' => [
            'label' => 'Judul',
            'type'  => 'text'
        ],
        'description' => [
            'label' => 'Deskripsi',
            'type'  => 'textarea'
        ],
        'status'=> [
            'label' => 'Status',
            'type'  => 'options:Aktif|Tidak Aktif'
        ],
        // 'created_at',

    ],
    
    'polling_items' => [
        'polling_id',
        'name',

    ],
    
    'polling_counters' => [
        'polling_id',
        'polling_item_id',
        'user_id',
        'created_at',

    ],
    
    'votes' => [
        'title' => [
            'label' => 'Judul',
            'type'  => 'text'
        ],
        'description'=> [
            'label' => 'Deskripsi',
            'type'  => 'textarea'
        ],
        'status'=> [
            'label' => 'Status',
            'type'  => 'options:Aktif|Tidak Aktif'
        ],
        // 'created_at',

    ],
    
    'vote_items' => [
        'vote_id',
        'name',

    ],
    
    'vote_counters' => [
        'vote_id',
        'vote_item_id',
        'user_id',
        'created_at',

    ],
    
    'aspirations' => [
        // 'author_id',
        'title' => [
            'label' => 'Judul',
            'type'  => 'text'
        ],
        'description'=> [
            'label' => 'Deskripsi',
            'type'  => 'textarea'
        ],
        // 'created_at',

    ],
    
    'aspiration_comments' => [
        'aspiration_id',
        'author_id',
        'description',
        'created_at',

    ],
    
    'business' => [
        // 'user_id',
        'name' => [
            'label' => 'Nama Bisnis',
            'type'  => 'text'
        ],
        'sector' => [
            'label' => 'Sektor',
            'type'  => 'text'
        ],
        'owner' => [
            'label' => 'Pemilik',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'No HP',
            'type'  => 'tel'
        ],
        // 'status',
        // 'admin_id',
        // 'created_at',

    ],
    
    'communities' => [
        // 'user_id',
        'name' => [
            'label' => 'Nama Bisnis',
            'type'  => 'text'
        ],
        'sector' => [
            'label' => 'Bidang',
            'type'  => 'text'
        ],
        'coverage' => [
            'label' => 'Coverage',
            'type'  => 'tel'
        ],
        'phone' => [
            'label' => 'No HP',
            'type'  => 'tel'
        ],
        // 'status',
        // 'admin_id',
        // 'created_at',

    ],
    
    'professions' => [
        // 'user_id',
        'name' => [
            'label' => 'Nama Bisnis',
            'type'  => 'text'
        ],
        'sector' => [
            'label' => 'Bidang',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'No HP',
            'type'  => 'tel'
        ],
        // 'status',
        // 'admin_id',
        // 'created_at',

    ],
];