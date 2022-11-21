<?php

$conn = conn();
$db   = new Database($conn);

if(get_role(auth()->user->id)->name == 'administrator')
{
    $users = $db->all('users',['phone'=>['IS NOT','NULL']]);
    $workplan = $db->single('workplans',['id'=>$_GET['id']]);

    $message = "*Notifikasi Aplikasi Lintang - Program Kerja*
".$workplan->content;
    
    foreach($users as $user)
    {
        Wa::sendMessage($user->phone, $message);
    }
    
    set_flash_msg(['success'=>'Program Kerja berhasil di siarkan']);
}

header('location:'.routeTo('workplans/view',['id'=>$_GET['id']]));
die();