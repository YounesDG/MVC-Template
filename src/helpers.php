<?php

use DGRSDT_CANDIDAT\Config;


/**
* Show or hide error messages on screen
* @var boolean
*/
function showHideErrors()
{
    if (Config::SHOW_ERRORS) {
        
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    } else {
        error_reporting(0);
    }
}


function ip_in_range()
{
    # Get the numeric representation of the IP Address with IP2long
    $min = ip2long(Config::START_LOCAL_IP);
    $max = ip2long(Config::END_LOCAL_IP);
    $needle = ip2long(getUserIP());
    
    # Then it's as simple as checking whether the needle falls between the lower and upper ranges
    return (($needle >= $min) and ($needle <= $max));
}

function show_in_Public_Local()
{
    if (!Config::IS_PUBLIC) {
        $user_ip = getUserIP();
        $is_range = ip_in_range(Config::START_LOCAL_IP, Config::END_LOCAL_IP, $user_ip);
        if (!$is_range) {
            header('Location: http://193.194.93.244/projet-brevet/');
            exit();
        }
    }
}
