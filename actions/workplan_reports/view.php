<?php

$id   = $_GET['id'];

Validation::run([
    'id' => [
        'required','exists:workplan_reports,id,'.$id
    ]
],[
    'id' => $id
]);

$conn = conn();
$db   = new Database($conn);

$fields = config('fields')['workplan_reports'];
$data   = $db->single('workplan_reports',['id'=>$id]);

$comments = $db->all('workplan_report_responses',[
    'workplan_report_id' => $id,
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

$data->agree = $db->exists('workplan_report_responses',[
    'workplan_report_id' => $id,
    'response_type' => 'agree'
]);

$data->disagree = $db->exists('workplan_report_responses',[
    'workplan_report_id' => $id,
    'response_type' => 'disagree'
]);

$data->abstain = $db->exists('workplan_report_responses',[
    'workplan_report_id' => $id,
    'response_type' => 'abstain'
]);

$success_msg = get_flash_msg('success');

return compact('data','success_msg','fields');