<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;
$table = 'alumni_deads';

$db->update($table,[
    'status' => $_GET['status'],
    'admin_id' => $user->id
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>__($table) . ' berhasil ditanggapi']);
header('location:'.routeTo('crud/index',['table'=>$table]));
die();