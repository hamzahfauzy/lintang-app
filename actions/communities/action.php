<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('communities',[
    'status' => $_GET['status'],
    'admin_id' => $user->id
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Komunitas berhasil ditanggapi']);
header('location:'.routeTo('crud/index',['table'=>'communities']));
die();