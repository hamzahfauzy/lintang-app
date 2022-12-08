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
        'workplan_id',
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
        'workplan_id' => [
            'label' => 'Program Kerja',
            'type'  => 'options-obj:workplans,id,title'
        ],
        'file_path' => [
            'label' => 'File',
            'type'  => 'file'
        ],
    ],
    
    'workplan_report_responses' => [
        'workplan_report_id',
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
        'types'=> [
            'label' => 'Jenis',
            'type'  => 'options:Angkatan|User|NRA'
        ],
        // 'created_at',

    ],
    
    'polling_items' => [
        'polling_id' => [
            'label' => 'Polling',
            'type'  => 'options-obj:pollings,id,title'
        ],
        'name' => [
            'label' => 'nama',
            'type'  => 'text'
        ],

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
        'types'=> [
            'label' => 'Jenis',
            'type'  => 'options:Angkatan|User|NRA'
        ],
        // 'created_at',

    ],
    
    'vote_items' => [
        'vote_id' => [
            'label' => 'vote',
            'type'  => 'options-obj:votes,id,title'
        ],
        'name' => [
            'label' => 'nama',
            'type'  => 'text'
        ],

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
            'type'  => 'options-obj:business_sectors,id,name'
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
            'type'  => 'options-obj:community_sectors,id,name'
        ],
        'coverage' => [
            'label' => 'Coverage',
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

    'statistics' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'counter' => [
            'label' => 'Counter',
            'type'  => 'tel'
        ],
    ],

    'alumni_deads' => [
        'name' => [
            'label' => 'Nama Alumni',
            'type'  => 'text'
        ],
        'generation' => [
            'label' => 'Angkatan',
            'type'  => 'number'
        ],
        'date' => [
            'label' => 'Tanggal Meninggal',
            'type'  => 'date'
        ],
        'address' => [
            'label' => 'Alamat rumah duka',
            'type'  => 'text'
        ],
        'reason' => [
            'label' => 'Penyebab Meninggal',
            'type'  => 'options:Sakit|Kecelakaan|Tidak disebutkan'
        ],
        'burial_location' => [
            'label' => 'Tempat di makamkan',
            'type'  => 'text'
        ],
        'colleague_phone' => [
            'label' => 'No Telp/WA Keluarga/Teman Dekat',
            'type'  => 'number'
        ],
        // 'status',
        // 'notes',
    ],
    
    'alumni_beneficiaries' => [
        'name' => [
            'label' => 'Nama Alumni',
            'type'  => 'text'
        ],
        'generation' => [
            'label' => 'Angkatan',
            'type'  => 'number'
        ],
        'receiver_name' => [
            'label' => 'Nama Penerima',
            'type'  => 'text'
        ],
        'receiver_status' => [
            'label' => 'Status Penerima',
            'type'  => 'options:Keluarga inti|Yang bersangkutan'
        ],
        'beneficiary_factor' => [
            'label' => 'Faktor Santunan',
            'type'  => 'options:Korban bencana alam|Kecelakaan|Yatim piatu|Ekonomi'
        ],
        'address' => [
            'label' => 'Alamat Alumni',
            'type'  => 'text'
        ],
        'colleague_phone' => [
            'label' => 'No Telp/WA Keluarga/Teman Dekat',
            'type'  => 'number'
        ],
        // 'status',
        // 'notes',
    ],
    
    'scholarship_receivers' => [
        'name' => [
            'label' => 'Nama Alumni',
            'type'  => 'text'
        ],
        'generation' => [
            'label' => 'Angkatan',
            'type'  => 'number'
        ],
        'receiver_name' => [
            'label' => 'Nama Penerima',
            'type'  => 'text'
        ],
        'receiver_status' => [
            'label' => 'Status Penerima',
            'type'  => 'options:Anak Alumni|Yang bersangkutan'
        ],
        'scholarship_factor' => [
            'label' => 'Alasan Pengajuan',
            'type'  => 'options:Prestasi|Ekonomi'
        ],
        'scholarship_factor' => [
            'label' => 'Pendidikan',
            'type'  => 'options:TK|SD|SMP|SMA/SMK|PT'
        ],
        'address' => [
            'label' => 'Alamat Alumni',
            'type'  => 'text'
        ],
        'colleague_phone' => [
            'label' => 'No Telp/WA Keluarga/Teman Dekat',
            'type'  => 'number'
        ],
        // 'status',
        // 'notes',
    ],
];