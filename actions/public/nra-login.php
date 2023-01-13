<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    
    $otp = Session::get('otp');
    $password = $_POST['password'];
    if($password == $otp->otp)
    {
        $referer_url = Session::get('referer_url');
        Session::clear('referer_url');
        Session::set(['nra'=>$otp->nra]);
        header('location:'.$referer_url);
        die();
    }

    set_flash_msg(['error'=>'OTP Tidak Valid','old' => $_POST]);
    header('location:'.routeTo('public/nra-login'));
    die();
}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
];