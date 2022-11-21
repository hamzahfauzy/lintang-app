<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$db->update('professions',[
    'status' => $_GET['status'],
    'admin_id' => $user->id
],[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Profesi berhasil ditanggapi']);
header('location:'.routeTo('crud/index',['table'=>'professions']));
die();