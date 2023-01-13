<?php

$route = get_route();

if(startWith($route,'app/db-')) return true;

if(startWith($route,'public/'))
{
    if($route == 'public/nra-logout') return true;
    $session = Session::get('nra');
    if($route == 'public/nra-login')
    {
        return !$session;
    }

    if($session)
    {
        return true;
    }
    else
    {
        $domain = $_SERVER['HTTP_HOST'];
        $url = "http://" . $domain . $_SERVER['REQUEST_URI'];
        Session::set(['referer_url' => $url]);
        header("location:".routeTo('public/nra-login'));
        die();
    }
}

if(startWith($route,'api'))
{
    return require 'api.php';
}

// check if installation is exists
$conn  = conn();
$db    = new Database($conn);

$installation = $db->single('application');
if(!$installation)
{
    if($route != "installation")
    {
        header("location:".routeTo('installation'));
        die();
    }
    
    return $route == "installation";

}

return require 'default.php';