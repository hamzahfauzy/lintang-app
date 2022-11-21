<?php

$conn = conn();
$db   = new Database($conn);

if(get_role(auth()->user->id)->name == 'administrator')
{
    $users = $db->all('users',['phone'=>['IS NOT','NULL']]);
    $workplan_report = $db->single('workplan_reports',['id'=>$_GET['id']]);
    
    foreach($users as $user)
    {
        Wa::sendMessage($user->phone, $workplan_report->title);
    }
    
    set_flash_msg(['success'=>'LPJ berhasil di siarkan']);
}

header('location:'.routeTo('workplans/view',['id'=>$_GET['id']]));
die();