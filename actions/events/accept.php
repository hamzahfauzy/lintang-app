<?php
$id = $_GET['id'];
$url    = "https://gerai.ikarholaz.id/api/events/status/".$id;
$request = simple_curl($url, 'POST', ['_method'=>'patch','status'=>'disetujui','status_update_by'=>auth()->user->name]);
if($request['status'] == 200)
{
    set_flash_msg(['success'=>'Event berhasil di setujui']);
    header('location:'.routeTo('events/index'));
}
else
{
    $content = json_decode($request['content']);
    set_flash_msg(['error'=>$content]);
    header('location:'.routeTo('events/index'));
}