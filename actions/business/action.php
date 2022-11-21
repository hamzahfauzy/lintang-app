<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('business',[
    'status' => $_GET['status'],
    'admin_id' => $user->id
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Bisnis berhasil ditanggapi']);
header('location:'.routeTo('crud/index',['table'=>'business']));
die();