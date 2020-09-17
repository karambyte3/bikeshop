<?php

function route($routeUrls, $requestLogin = false) {
    $pageFound = false;
    $reqUrl = substr($_SERVER['REQUEST_URI'], 1);
    $reqUrl = rtrim($reqUrl, 10);

    if($reqUrl == '') {
        home();
        include_once  './pages/home.html';
        return;
    }

    foreach($routeUrls as $url) {
        if($reqUrl == $url) {

            $funcName = str_replace('/', '_', $url);

            $vars = call_user_func($funcName);
            include_once  './pages/' . $url . '.html';

            $pageFound = true;
            return;
        }
    }

    if($pageFound == false){
        include './pages/error404.html';
    }
}

function home() {
    
}

route(
    array(
        'contact',
        'error'
        )
);

?>


