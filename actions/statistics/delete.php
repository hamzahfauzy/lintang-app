<?php

$table = 'statistics';
$conn = conn();
$db   = new Database($conn);
$name = $_GET['name'];

$db->delete($table,[
    'id' => $_GET['id'],
    'name' => $name
]);

set_flash_msg(['success'=>_ucwords(__($table).' '.$name).' berhasil dihapus']);
header('location:'.routeTo('crud/index',['table'=>$table]));
die();