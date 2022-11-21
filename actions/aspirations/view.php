<?php

$id   = $_GET['id'];

Validation::run([
    'id' => [
        'required','exists:aspirations,id,'.$id
    ]
],[
    'id' => $id
]);

$conn = conn();
$db   = new Database($conn);

$fields = config('fields')['aspirations'];
$data   = $db->single('aspirations',['id'=>$id]);

$comments = $db->all('aspiration_comments',[
    'aspiration_id' => $id,
],[
    'id' => 'desc'
]);

$comments = array_map(function($comment) use ($db) {
    $comment->user = $db->single('users',['id'=>$comment->author_id]);
    $comment->date = tgl_indo($comment->created_at, true);
    return $comment;
}, $comments);

$data->comments = $comments;

$success_msg = get_flash_msg('success');

return compact('data','success_msg','fields');