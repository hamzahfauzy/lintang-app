<?php

Page::set_title('List Events');
$num_rows   = isset($_GET['num_rows']) && !empty($_GET['num_rows']) ? $_GET['num_rows'] : 10;
$page   = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 1;
$status = isset($_GET['status']) && !empty($_GET['status']) ? '&status='.$_GET['status'] : '';
$created_user_id = get_role(auth()->user->id)->name != 'administrator' ? '&clauses[created_user_id]='.auth()->user->id : '';
$url    = "https://gerai.ikarholaz.id/api/events?token=lintangapptoken&clauses[created_from]=lintang&pageRows=".$num_rows."&page=".$page.$status.$created_user_id;
$events = simple_curl($url, 'GET');
$datas = json_decode($events['content'])->data;
$success_msg = get_flash_msg('success');
$first_counter = ($page-1)*$num_rows;

return compact('datas','success_msg','first_counter');