<?php

$id   = $_GET['id'];

Validation::run([
    'id' => [
        'required','exists:pollings,id,'.$id
    ]
],[
    'id' => $id
]);

$conn = conn();
$db   = new Database($conn);

$isDoPolling = $db->exists('polling_counters',['polling_id'=>$id,'user_id'=>auth()->user->id]);

if(request() == 'POST' && !$isDoPolling)
{
    $db->insert('polling_counters',[
        'polling_id'=>$id,
        'user_id'=>auth()->user->id,
        'polling_item_id'=>$_POST['options']
    ]);

    set_flash_msg(['success'=>'Polling berhasil di simpan']);
    header('location:'.routeTo('pollings/view',['id'=>$id]));
    die();
}

$data   = $db->single('pollings',['id'=>$id]);
$items = $db->all('polling_items',['polling_id'=>$data->id]);

$items = array_map(function($item) use ($db) {
    $item->counter = $db->exists('polling_counters',['polling_item_id'=>$item->id]);
    return $item;
}, $items);

$data->items = $items;
$data->counter = $db->exists('polling_counters',['polling_id'=>$id]);
$success_msg = get_flash_msg('success');

return compact('data','success_msg','isDoPolling');