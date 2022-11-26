<?php

return [
    'dashboard' => 'default/index',
    'Master'    => [
        'Kategori' => 'crud/index?table=categories',
        'Sektor Usaha' => 'crud/index?table=business_sectors',
        'Bidang Komunitas' => 'crud/index?table=community_sectors',
    ],
    'DPA Feature' => [
        'Program Kerja / Kegiatan' => 'crud/index?table=workplans',
        'LPJ' => 'crud/index?table=workplan_reports',
        'Angket / Polling' => 'crud/index?table=pollings',
        'Vote' => 'crud/index?table=votes',
        'Aspirasi' => 'crud/index?table=aspirations',
    ],
    'Optimasi' => [
        'Events' => 'events/index',
        'Bisnis / Usaha Teman' => 'crud/index?table=business',
        'Komunitas' => 'crud/index?table=communities',
        'Profesi' => 'crud/index?table=professions',
        'Cek Registrasi' => 'nra/index',
    ],
    'Statistik' => [
        'Alumni Verified' => 'statistics/index?name=alumni',
        'Usaha / Bisnis' => 'statistics/index?name=bisnis',
        'Komunitas' => 'statistics/index?name=komunitas',
        'Profesi' => 'statistics/index?name=profesi',
        'Event' => 'statistics/index?name=event',
    ],
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];