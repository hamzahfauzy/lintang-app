<?php

// check is phone have nra
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

if(empty($data))
{
    Wa::sendMessage($phone,'Tidak ada voting yang aktif');
    die();
}

$data->counter = $db->exists('vote_counters',['vote_id'=>$data->id]);
$isDoVoting = $db->exists('vote_counters',['vote_id'=>$data->id,'user_info'=>$response->data]);
$message = '*'.$data->title.'*
';
$items = $db->all('vote_items',['vote_id'=>$data->id]);

if($isDoVoting)
{
    // send stats
    foreach($items as $no => $item)
    {
        $counter = $db->exists('vote_counters',['vote_item_id'=>$item->id]);
        $message .= ($no+1).'. '.$item->name.' ('.number_format($counter/$data->counter*100,2).')
';
    }
}
else
{
    // send items
    foreach($items as $no => $item)
    {
        $message .= ($no+1).'. '.$item->name.'
'; 
    }

    $message .= '_Silahkan ketik nomor urut untuk memilih_';
}

Wa::sendMessage($phone,$message);
die();




// $data->items = $items;
// $data->counter = $db->exists('vote_counters',['vote_id'=>$data->id]);