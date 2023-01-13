<?php

$slug = $_GET['slug'];
$user = Session::get('nra');

Validation::run([
    'slug' => [
        'required','exists:pollings,slug,'.$slug
    ]
],[
    'slug' => $slug
]);

$conn = conn();
$db   = new Database($conn);
$data = $db->single('pollings',['slug'=>$slug]);

$isDoPolling = $db->exists('polling_counters',['polling_id'=>$data->id,'user_info'=>$user]);

if(request() == 'POST' && !$isDoPolling)
{
    $db->insert('polling_counters',[
        'polling_id'=>$data->id,
        'user_info'=>$user,
        'polling_item_id'=>$_POST['options']
    ]);

    set_flash_msg(['success'=>'Polling berhasil di simpan']);
    header('location:'.routeTo('public/pollings',['slug'=>$slug]));
    die();
}

$items = $db->all('polling_items',['polling_id'=>$data->id]);

$items = array_map(function($item) use ($db) {
    $item->counter = $db->exists('polling_counters',['polling_item_id'=>$item->id]);
    return $item;
}, $items);

$data->items = $items;
$data->counter = $db->exists('polling_counters',['polling_id'=>$data->id]);
$success_msg = get_flash_msg('success');

return compact('data','success_msg','isDoPolling');