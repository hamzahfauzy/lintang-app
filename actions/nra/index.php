<?php

Page::set_title('Cek Registrasi');
$num_rows   = isset($_GET['num_rows']) && !empty($_GET['num_rows']) ? $_GET['num_rows'] : 10;
$page   = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 1;
$status = isset($_GET['status']) && !empty($_GET['status']) ? '&status='.$_GET['status'] : '';
$generation = get_role(auth()->user->id)->name != 'administrator' ? '&graduation_year='.auth()->user->generation : '';
$url    = "https://gerai.ikarholaz.id/api/get-alumnis?token=lintangapptoken&pageRows=".$num_rows."&page=".$page.$status.$generation;
$alumnis = simple_curl($url, 'POST');
$datas = json_decode($alumnis['content']);
$success_msg = get_flash_msg('success');
$first_counter = ($page-1)*$num_rows;

return compact('datas','success_msg','first_counter');