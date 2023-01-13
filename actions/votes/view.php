<?php

$id   = $_GET['id'];
$user = auth()->user;

Validation::run([
    'id' => [
        'required','exists:votes,id,'.$id
    ]
],[
    'id' => $id
]);

$conn = conn();
$db   = new Database($conn);
$data = $db->single('votes',['id'=>$id]);

$isDoVoting = $db->exists('vote_counters',['vote_id'=>$id,'user_id'=>$user->id]);

if($data->types == 'Angkatan')
{
    $isDoVoting = $db->exists('vote_counters',['vote_id'=>$id,'user_id'=>$user->id,'user_info'=>$user->generation]);
}

if($data->types == 'NRA')
{
    $isDoVoting = $db->exists('vote_counters',['vote_id'=>$id,'user_id'=>$user->id,'user_info'=>$user->NRA]);
}

if(request() == 'POST' && !$isDoVoting)
{
    $db->insert('vote_counters',[
        'vote_id'=>$id,
        'user_id'=>auth()->user->id,
        'vote_item_id'=>$_POST['options']
    ]);

    set_flash_msg(['success'=>'Voting berhasil di simpan']);
    header('location:'.routeTo('votes/view',['id'=>$id]));
    die();
}

$items = $db->all('vote_items',['vote_id'=>$data->id]);

$items = array_map(function($item) use ($db) {
    $item->counter = $db->exists('vote_counters',['vote_item_id'=>$item->id]);
    return $item;
}, $items);

$data->items = $items;
$data->counter = $db->exists('vote_counters',['vote_id'=>$id]);
$success_msg = get_flash_msg('success');

return compact('data','success_msg','isDoVoting');