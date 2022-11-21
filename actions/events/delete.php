<?php
$id = $_GET['id'];
$url    = "https://gerai.ikarholaz.id/api/events/delete/".$id;
$request = simple_curl($url, 'POST', ['_method'=>'delete']);
if($request['status'] == 200)
{
    set_flash_msg(['success'=>'Event berhasil di hapus']);
    header('location:'.routeTo('events/index'));
}
else
{
    $content = json_decode($request['content']);
    set_flash_msg(['error'=>$content]);
    header('location:'.routeTo('events/index'));
}