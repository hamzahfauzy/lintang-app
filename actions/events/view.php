<?php

$id = $_GET['id'];
Page::set_title('Edit Event');
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = [
    'name' => [
        'label' => 'Nama Event',
        'type'  => 'text'
    ],
    'category' => [
        'label' => 'Kategori',
        'type'  => 'options:General|Pengurus|Angkatan|Lintas Angkatan'
    ],
    'description' => [
        'label' => 'Deskripsi',
        'type'  => 'textarea'
    ],
    'start_time' => [
        'label' => 'Waktu Mulai',
        'type'  => 'datetime-local'
    ],
    'end_time' => [
        'label' => 'Waktu Selesai',
        'type'  => 'datetime-local'
    ],
    'place' => [
        'label' => 'Tempat',
        'type'  => 'text'
    ],
    'PIC' => [
        'label' => 'PIC',
        'type'  => 'text'
    ],
    'tag' => [
        'label' => 'Tag',
        'type'  => 'text'
    ],
    'image' => [
        'label' => 'Gambar',
        'type'  => 'file'
    ],
];

$url    = "https://gerai.ikarholaz.id/api/events/show/".$id;
$data   = simple_curl($url, 'GET');
$data   = json_decode($data['content'])->data;

return compact('error_msg','old','fields','data');