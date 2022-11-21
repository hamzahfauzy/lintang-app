<?php

$table = 'statistics';
$name  = $_GET['name'];
Page::set_title('Tambah '._ucwords(__($table)));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = config('fields')[$table];

unset($fields['name']);

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $_POST[$table]['name'] = $name;

    $insert = $db->insert($table,$_POST[$table]);

    set_flash_msg(['success'=>_ucwords(__($table).' '.$name).' berhasil ditambahkan']);
    header('location:'.routeTo('statistics/index',['name'=>$name]));
}

return compact('table','error_msg','old','fields');