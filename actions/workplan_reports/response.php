<?php

$conn = conn();
$db   = new Database($conn);
$user = auth()->user;
$response = $db->single('workplan_report_responses',[
    'workplan_report_id' => $_GET['id'],
    'response_type' => ['<>','comments'],
    'user_id' => $user->id
]);

if($response)
{
    $db->update('workplan_report_responses',[
        'response_type' => $_GET['response']
    ],[
        'id' => $response->id
    ]);
}
else
{
    $response = $db->insert('workplan_report_responses',[
        'workplan_report_id' => $_GET['id'],
        'response_type' => $_GET['response'],
        'user_id' => $user->id
    ]);
}

set_flash_msg(['success'=>'LPJ berhasil ditanggapi']);
header('location:'.routeTo('workplan_reports/view',['id'=>$response->workplan_report_id]));
die();