<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;
$response = $db->single('workplan_responses',[
    'workplan_id' => $_GET['id'],
    'response_type' => ['<>','comments'],
    'user_id' => $user->id
]);

if($response)
{
    $db->update('workplan_responses',[
        'response_type' => $_GET['response']
    ],[
        'id' => $response->id
    ]);
}
else
{
    $response = $db->insert('workplan_responses',[
        'workplan_id' => $_GET['id'],
        'response_type' => $_GET['response'],
        'user_id' => $user->id
    ]);
}

set_flash_msg(['success'=>'Program kerja berhasil ditanggapi']);
header('location:'.routeTo('workplans/view',['id'=>$response->workplan_id]));
die();