<?php

function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}


//CHuyển hướng trang
function redirect ($url= ""){
    global $config;
    $path=$config['base_url'].$url;
    header("location: {$path}");
}

