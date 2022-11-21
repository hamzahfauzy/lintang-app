<?php

$conn = conn();
$db   = new Database($conn);

// get all admin
$administrator = $db->single('roles',['name'=>'administrator']);
$db->query = "SELECT * FROM users WHERE id IN (SELECT user_id FROM user_roles WHERE role_id='$administrator->id') AND phone IS NOT NULL";
$users = $db->exec('all');

$message = "*Rekomendasi Update*
NRA : *".$_POST['NRA']."*
Rekomendasi : *".$_POST['recommendation']."*
Keterangan : ".$_POST['description'];

foreach($users as $user)
{
    Wa::sendMessage($user->phone, $message);
}

set_flash_msg(['success'=>'Notifikasi berhasil dikirim ke admin']);
header('location:'.routeTo('nra/index'));
die();