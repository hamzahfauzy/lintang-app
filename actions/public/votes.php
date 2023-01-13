<?php

$slug = $_GET['slug'];
$user = Session::get('nra');

Validation::run([
    'slug' => [
        'required','exists:votes,slug,'.$slug
    ]
],[
    'slug' => $slug
]);

$conn = conn();
$db   = new Database($conn);
$data = $db->single('votes',['slug'=>$slug]);

$isDoVoting = $db->exists('vote_counters',['vote_id'=>$data->id,'user_info'=>$user]);

if(request() == 'POST' && !$isDoVoting)
{
    $db->insert('vote_counters',[
        'vote_id'=>$data->id,
        'user_info'=>$user,
        'vote_item_id'=>$_POST['options']
    ]);

    set_flash_msg(['success'=>'Voting berhasil di simpan']);
    header('location:'.routeTo('public/votes',['slug'=>$slug]));
    die();
}

$items = $db->all('vote_items',['vote_id'=>$data->id]);

$items = array_map(function($item) use ($db) {
    $item->counter = $db->exists('vote_counters',['vote_item_id'=>$item->id]);
    return $item;
}, $items);

$data->items = $items;
$data->counter = $db->exists('vote_counters',['vote_id'=>$data->id]);
$success_msg = get_flash_msg('success');

return compact('data','success_msg','isDoVoting');