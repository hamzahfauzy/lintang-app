<?php

$table = 'statistics';
$name  = $_GET['name'];
Page::set_title('Edit '._ucwords(__($table)));
$conn = conn();
$db   = new Database($conn);
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = config('fields')[$table];

$data = $db->single($table,[
    'id' => $_GET['id'],
    'name' => $name
]);

if(request() == 'POST')
{
    $edit = $db->update($table,$_POST[$table],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>_ucwords(__($table).' '.$name).' berhasil diupdate']);
    header('location:'.routeTo('crud/index',['table'=>$table]));
}

return [
    'data' => $data,
    'error_msg' => $error_msg,
    'old' => $old,
    'table' => $table,
    'fields' => $fields
];