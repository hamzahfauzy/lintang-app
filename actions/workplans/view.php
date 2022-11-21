<?php

$id   = $_GET['id'];

Validation::run([
    'id' => [
        'required','exists:workplans,id,'.$id
    ]
],[
    'id' => $id
]);

$conn = conn();
$db   = new Database($conn);

$fields = config('fields')['workplans'];
$data   = $db->single('workplans',['id'=>$id]);

$comments = $db->all('workplan_responses',[
    'workplan_id' => $id,
    'response_type' => 'comments'
],[
    'id' => 'desc'
]);

$comments = array_map(function($comment) use ($db) {
    $comment->user = $db->single('users',['id'=>$comment->user_id]);
    $comment->date = tgl_indo($comment->created_at, true);
    return $comment;
}, $comments);

$data->comments = $comments;

$data->agree = $db->exists('workplan_responses',[
    'workplan_id' => $id,
    'response_type' => 'agree'
]);

$data->disagree = $db->exists('workplan_responses',[
    'workplan_id' => $id,
    'response_type' => 'disagree'
]);

$data->abstain = $db->exists('workplan_responses',[
    'workplan_id' => $id,
    'response_type' => 'abstain'
]);

$success_msg = get_flash_msg('success');

$fields['budget']['type'] = 'number';

return compact('data','success_msg','fields');