<?php
$phone   = $_POST['phone'];
$request = simple_curl(config('gerai_base_url') . '/api/bot/lintang/get-nra', 'POST', 'phone='.$phone);

if($request['status'] == 400)
{
    Wa::sendMessage($phone,'Maaf! Nomor WA anda tidak terdaftar.');
    die();
}

$response = json_decode($request['content']);

$conn = conn();
$db   = new Database($conn);
$data = $db->single('votes',['status'=>'Aktif']);
$phone   = $_POST['phone'];
$pilihan = $_POST['pilihan'];
$items   = $db->all('vote_items',['vote_id'=>$data->id]);

$isDoVoting = $db->exists('vote_counters',['vote_id'=>$data->id,'user_info'=>$response->data]);
if($isDoVoting)
{
    Wa::sendMessage($phone,'Maaf! Anda sudah pernah melakukan voting.');
    die();
}

if(isset($items[$pilihan-1]))
{
    $item = $items[$pilihan-1];
    $db->insert('vote_counters',[
        'vote_id'=>$data->id,
        'user_info'=>$response->data,
        'vote_item_id'=>$item->id
    ]);

    Wa::sendMessage($phone,'Terima kasih telah melakukan voting');
    die();
}

Wa::sendMessage($phone,'Pilihan yang anda pilih tidak valid. Silahkan ulang dari awal.');
die();