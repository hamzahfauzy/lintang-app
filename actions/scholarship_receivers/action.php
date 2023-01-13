<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;
$table = 'scholarship_receivers';

$params = [
    'status' => $_GET['status'],
    'admin_id' => $user->id
];

if(isset($_GET['catatan']))
{
    $params['notes'] = $_GET['catatan'];
}

$db->update($table,$params,[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>__($table) . ' berhasil ditanggapi']);
header('location:'.routeTo('crud/index',['table'=>$table]));
die();