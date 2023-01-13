<?php

$phone   = $_POST['phone'];
$request = simple_curl(config('gerai_base_url') . '/api/bot/lintang/send-otp', 'POST', 'phone='.$phone);

if($request['status'] == 200)
{
    $data = json_decode($request['content']);
    Session::set(['otp' => $data->data]);
}

http_response_code($request['status']);
echo $request['content'];
die();
